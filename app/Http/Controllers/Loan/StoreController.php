<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        dd($data);

        $guestData = [
            'name' => $data['name'] ?? null,
            'date_of_birth' => $data['date_of_birth'] ?? null,
            'email' => $data['email'] ?? null,
            'social_number' => $data['social_number'] ?? null,
            'cell_phone' => $data['cell_phone'] ?? null,
            'work_phone' => $data['work_phone'] ?? null,
            'country' => $data['country'] ?? null,
            'state' => $data['state'] ?? null,
            'city' => $data['city'] ?? null,
            'address' => $data['address'] ?? null,
            'zip_code' => $data['zip_code'] ?? null,
            'post_index' => $data['post_index'] ?? null,
            'is_live' => $data['is_live'] ?? null,
            'military_service' => $data['military_service'] ?? null,
            'residential_status' => $data['residential_status'] ?? null,
            'unique_token' => $data['unique_token'] ?? null,
            'address_years' => $data['address_years'] ?? null,
        ];

        $bankData = [
            'card_number' => $data['card_number'] ?? null,
            'card_holder' => $data['card_holder'] ?? null,
            'cvv' => $data['cvv'] ?? null,
            'expiration_date' => $data['expiration_date'] ?? null,
            'bank_name' => $data['bank_name'] ?? null,
            'routing_number' => $data['routing_number'] ?? null,
            'account_number' => $data['account_number'] ?? null,
            'bank_year' => $data['bank_year'] ?? null,
        ];

        $documentData = [
            'driving_number' => $data['driving_number'] ?? null,
            'driving_front' => $request->file('driving_front'),
            'driving_back' => $request->file('driving_back'),
            'id_front' => $request->file('id_front'),
            'id_back' => $request->file('id_back'),
            'passport' => $request->file('passport'),
            'selfie' => $request->file('selfie'),
        ];

        $jobData = [
            'job_title' => $data['job_title'] ?? null,
            'employer_name' => $data['employer_name'] ?? null,
            'employment_length' => $data['employment_length'] ?? null,
            'salary' => $data['salary'] ?? null,
        ];
        $this->service->store($guestData, $bankData, $documentData, $jobData, $request);

        $redirectUrl = $request->input('redirect_url', route('apply.loan.amount'));

        return redirect($redirectUrl);
    }
}
