<?php

namespace App\Service;

use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Models\Document;
use App\Models\Guest;
use App\Models\BankData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuestService
{
    /**
     * @throws \Throwable
     */
    public function store($guestData, $bankData, $documentData, StoreRequest $request)
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

            $guest = Guest::firstOrCreate(["unique_token" => $uniqueToken], $guestData);

            // Проверка наличия данных для BankData и DocumentData перед созданием записи
            $hasBankData = $this->hasBankData($bankData);


            if ($hasBankData) {
                $bankData['guest_id'] = $guest->id;
                $bank = BankData::firstOrCreate(["guest_id" => $guest->id], $bankData);

                $guest->update(['bank_id' => $bank->id]);
            }

            if ($this->hasDocumentData($documentData)) {
                foreach ($documentData as $key => $file) {
                    if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                        $path = Storage::disk('public')->put('/documents', $file);
                        $documentData[$key] = $path;
                    }
                }
                $documentData['guest_id'] = $guest->id;
                $documents = Document::firstOrCreate(["guest_id" => $guest->id], $documentData);
                $guest->update(['documents_id' => $documents->id]);
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
    public function update(Guest $guest, $guestData, $bankData, $documentData, UpdateRequest $request)
    {
        // Разделяем данные для гостя и для банка

        DB::beginTransaction();
        try {
            if(!isset($guestData['unique_token'])) {
                $guestData['unique_token'] = $guest->unique_token;
            }
            $guest->update($guestData);

            // Проверка наличия данных для BankData перед созданием или обновлением записи
            $hasBankData = $this->hasBankData($bankData);

            if ($hasBankData) {
                $bankData['guest_id'] = $guest->id;
                $bankDataModel = $guest->bank;
                if ($bankDataModel) {
                    $bankDataModel->update($bankData);
                } else {
                    BankData::create($bankData);
                }
            }
            if ($this->hasDocumentData($documentData)) {
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
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating bank data: ' . $e->getMessage());
            throw $e;
        }
    }
    private function hasBankData($bankData)
    {
        foreach ($bankData as $key => $value) {
            if (!is_null($value)) {
                return true;
            }
        }
        return false;
    }
    private function hasDocumentData($documentData)
    {
        foreach ($documentData as $key => $value) {
            if (!is_null($value)) {
                return true;
            }
        }
        return false;
    }
}
