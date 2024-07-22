<?php
namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\SettingsHelper;

class FormController extends Controller
{
    public function showPage($page)
    {
        $routes = SettingsHelper::getPageOrder();

        if (!in_array($page, $routes)) {
            abort(404);
        }

        return view('loan.apply_components.' . $page);
    }
}
