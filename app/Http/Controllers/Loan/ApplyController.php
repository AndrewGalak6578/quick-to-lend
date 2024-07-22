<?php
namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class ApplyController extends Controller
{
    public function bankInfo()
    {
        // Получаем текущие настройки
        $setting = Setting::where('key', 'selected_pages')->first();
        $selectedPages = $setting ? json_decode($setting->value, true) : [];

        // Определяем следующий маршрут на основе настроек
        if (in_array('cc_info', $selectedPages)) {
            return redirect()->route('apply.loan.cc_info');
        } elseif (in_array('verify_identity', $selectedPages) && in_array('extra_doc', $selectedPages)) {
            return redirect()->route('apply.loan.verify_identity');
        } elseif (in_array('selfie_upload', $selectedPages) && in_array('selfie_second', $selectedPages)) {
            return redirect()->route('apply.loan.selfie_upload');
        } else {
            return redirect()->route('apply.loan.terms');
        }
    }
}
