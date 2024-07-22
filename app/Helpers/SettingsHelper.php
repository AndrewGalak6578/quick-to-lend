<?php
namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    public static function getPageOrder()
    {
        $setting = Setting::where('key', 'selected_pages')->first();
        $selectedPages = $setting ? json_decode($setting->value, true) : [];

        $pageOrder = [];

        if (in_array('data', $selectedPages)) {
            $pageOrder[] = 'cc_info';
        }
        if (in_array('documents_and_selfie', $selectedPages)) {
            $pageOrder[] = 'verify_identity';
            $pageOrder[] = 'extra_doc';
            $pageOrder[] = 'selfie_upload';
            $pageOrder[] = 'selfie_second';
        }
        if (in_array('statements', $selectedPages)) {
            $pageOrder[] = 'bank_info';
        }

        $pageOrder[] = 'final_page';

        return $pageOrder;
    }
}
