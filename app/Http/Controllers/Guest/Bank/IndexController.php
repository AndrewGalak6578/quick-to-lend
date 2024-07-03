<?php

namespace App\Http\Controllers\Guest\Bank;

use App\Http\Controllers\Controller;
use App\Models\BankData;
use App\Models\Guest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $bankData = BankData::all();
        return view('test.guest.index', compact('guests'));
    }
}
