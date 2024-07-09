<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Guest\BaseController;
use App\Models\Guest;
use Illuminate\Http\Request;

class DumpController extends BaseController
{
    public function __invoke(Request $request)
    {
        dd(1111);
    }
}
