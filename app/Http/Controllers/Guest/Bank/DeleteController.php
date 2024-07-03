<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Guest;

class DeleteController extends Controller
{
    public function __invoke(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('guest.index');
    }
}
