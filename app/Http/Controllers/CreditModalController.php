<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditModalController extends Controller
{
    public function show()
    {
        return response()->json([
            'html' => view('loan.apply_components.cc_info_modal')->render()
        ]);
    }
}
