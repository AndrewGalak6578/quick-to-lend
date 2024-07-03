<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\UpdateRequest;
use App\Models\Guest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Guest $guest)
    {
        $guest->update(["name" => "old one"]);
        $guest->fresh();
        return $guest->name;
    }
}
