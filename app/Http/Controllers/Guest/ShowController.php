<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Guest $guest)
    {

        return response()->json([
            'html' => view('test.guest.modal', compact('guest'))->render()
        ]);
    }
}
