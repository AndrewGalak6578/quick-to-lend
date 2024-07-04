<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Guest;

class EditController extends BaseController
{
    public function __invoke(Guest $guest)
    {

        return view('test.guest.edit', compact('guest'));
    }
}
