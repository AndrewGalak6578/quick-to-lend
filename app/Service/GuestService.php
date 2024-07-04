<?php

namespace App\Service;

use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Models\Guest;
use App\Models\BankData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GuestService
{
    public function store($guestData, $bankData, StoreRequest $request)
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


            $bankData['guest_id'] = $guest->id;
            $bank = BankData::firstOrCreate(["guest_id" => $guest->id], $bankData);

            $guest->update(['bank_id' => $bank->id]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error creating guest or bank data: ' . $e->getMessage());

            // Redirect back with the error message

        }
    }

    public function update(Guest $guest, $guestData, $bankData, UpdateRequest $request)
    {
        // Разделяем данные для гостя и для банка

        DB::beginTransaction();
        try {

            $guest->update($guestData);

            $bankData['guest_id'] = $guest->id;
            $bankDataModel = BankData::where('guest_id', $guest->id)->first();
            if ($bankDataModel) {
                $bankDataModel->update($bankData);
            } else {
                BankData::create($bankData);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating bank data: ' . $e->getMessage());
        }
    }
}
