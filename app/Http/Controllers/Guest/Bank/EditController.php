<?php

namespace App\Http\Controllers\Guest\Bank;

use App\Http\Controllers\Controller;
use App\Models\Guest;

class EditController extends Controller
{
    public function __invoke(Guest $guest)
    {

        return view('test.guest.edit', compact('guest'));
    }
}
