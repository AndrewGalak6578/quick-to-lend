<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('test.guest.create');
    }
}
