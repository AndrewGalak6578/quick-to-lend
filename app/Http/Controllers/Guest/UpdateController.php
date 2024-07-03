<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Models\Guest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Guest $guest)
    {
        $guest->update(["name" => "old one"]);
        $guest->fresh();
        return $guest->name;
    }
}
