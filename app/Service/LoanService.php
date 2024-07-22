<?php

namespace App\Service;

use App\Http\Requests\Loan\StoreRequest;
use App\Http\Requests\Loan\UpdateRequest;
use App\Models\Document;
use App\Models\Guest;
use App\Models\BankData;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LoanService
{
    /**
     * @throws \Throwable
     */
    public function store($guestData, $bankData, $documentData, $jobData, StoreRequest $request)
    {

        DB::beginTransaction();

        try {
            if (!isset($guestData['unique_token']) || is_null($guestData['unique_token'])) {
                if (!$request->session()->has('unique_token')) {
                    $uniqueToken = Str::random(32);
                    $request->session()->put('unique_token', $uniqueToken);
                } else {
                    $uniqueToken = $request->session()->get('unique_token');
                }

                $guestData['unique_token'] = $uniqueToken;
            } else {
                $uniqueToken = $guestData['unique_token'];
            }

            $guestData['unique_token'] = $uniqueToken;

//            $guest = Guest::firstOrCreate(["unique_token" => $uniqueToken], $guestData);
            $guest = Guest::where('unique_token', $uniqueToken)->first();

            if ($guest) {
                foreach ($guestData as $key => $value) {
                    if ($value !== null) {

                        $guest->update([$key => $value]);
                    }
                }
            } else {
                $guest = Guest::create($guestData);
            }

            // Проверка наличия данных для BankData и DocumentData перед созданием записи
            $hasBankData = $this->hasData($bankData);


            if ($hasBankData) {
                $bankData['guest_id'] = $guest->id;
                if ($guest->bank_id) {
                    $bank = BankData::where('guest_id', $guest->id)->first();
                    foreach ($bankData as $key => $value) {
                        if ($value !== null) {
                            $bank->{$key} = $value;
                        }
                    }
                    $bank->save();
                } else {
                    $bank = BankData::create($bankData);
                }

                $guest->update(['bank_id' => $bank->id]);
            }

            if ($this->hasData($documentData)) {
                // Получаем существующую запись документа, если она есть
                $existingDocument = Document::where('guest_id', $guest->id)->first();

                foreach ($documentData as $key => $file) {
                    if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                        // Сохраняем файл и обновляем путь в $documentData
                        $path = Storage::disk('public')->put('/documents', $file);
                        $documentData[$key] = $path;
                    } elseif ($existingDocument) {
                        // Если файл не загружен, оставляем старое значение, если оно есть
                        $documentData[$key] = $existingDocument->{$key};
                    }
                }

                // Заполняем идентификатор гостя
                $documentData['guest_id'] = $guest->id;

                if ($existingDocument) {
                    // Обновляем существующую запись документа
                    $existingDocument->update($documentData);
                    $documents = $existingDocument;
                } else {
                    // Создаем новую запись документа
                    $documents = Document::create($documentData);
                }

                // Обновляем идентификатор документов в записи гостя
                $guest->update(['documents_id' => $documents->id]);
            }

            if ($this->hasData($jobData)) {
                $jobData['guest_id'] = $guest->id;
                if ($guest->job_info_id) {
                    $jobInfo = JobInfo::where('guest_id', $guest->id)->first();
                    foreach ($jobData as $key => $value) {
                        if ($value !== null) {
                            $jobInfo->{$key} = $value;
                        }
                    }
                    $jobInfo->save();
                } else {
                    $jobInfo = JobInfo::create($jobData);
                }

                $guest->update(['job_info_id' => $jobInfo->id]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            dump('Error creating guest or bank data: ' . $e->getMessage());
            throw $e;
            // Redirect back with the error message

        }
    }

    /**
     * @throws \Throwable
     */
    public function update(Guest $guest, $guestData, $bankData, $documentData, $jobData, UpdateRequest $request)
    {
        // Разделяем данные для гостя и для банка

        DB::beginTransaction();
        try {
            if (!isset($guestData['unique_token'])) {
                $guestData['unique_token'] = $guest->unique_token;
            }
            $guest->update($guestData);

            // Проверка наличия данных для BankData перед созданием или обновлением записи
            $hasBankData = $this->hasData($bankData);

            if ($hasBankData) {
                $bankData['guest_id'] = $guest->id;
                $bankDataModel = $guest->bank;
                if ($bankDataModel) {
                    $bankDataModel->update($bankData);
                } else {
                    BankData::create($bankData);
                }
            }
            if ($this->hasData($documentData)) {
                $documentData['guest_id'] = $guest->id;
                $documentDataModel = Document::where('guest_id', $guest->id)->first();

                foreach ($documentData as $key => $file) {
                    if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                        // Удаление старого файла
                        if ($documentDataModel && $documentDataModel->$key) {
                            Storage::disk('public')->delete($documentDataModel->$key);
                        }
                        // Сохранение нового файла
                        $path = Storage::disk('public')->put('/documents', $file);
                        $documentData[$key] = $path;
                    } elseif ($documentDataModel) {
                        // Если файл не загружен, оставляем старое значение
                        unset($documentData[$key]);
                    }
                }

                if ($documentDataModel) {
                    $documentDataModel->update($documentData);
                } else {
                    Document::create($documentData);
                }
            }

            if ($this->hasData($jobData)) {
                $jobData['guest_id'] = $guest->id;
                $jobInfo = $guest->jobInfo;

                if ($jobInfo) {
                    $jobInfo->update($jobData);
                } else {
                    JobInfo::create($jobData);
                }

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating bank data: ' . $e->getMessage());
            throw $e;
        }
    }

    private function hasData($bankData)
    {
        foreach ($bankData as $key => $value) {
            if (!is_null($value)) {
                return true;
            }
        }
        return false;
    }
}
