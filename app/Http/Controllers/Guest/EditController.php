<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreRequest;
use App\Models\Guest;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Guest $guest)
    {

        return view('test.guest.edit', compact('guest'));
    }
}
