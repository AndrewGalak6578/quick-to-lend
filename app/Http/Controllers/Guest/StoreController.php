<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (!isset($data['unique_token']) || is_null($data['unique_token'])) {
            if (!$request->session()->has('unique_token')) {
                $uniqueToken = Str::random(32);
                $request->session()->put('unique_token', $uniqueToken);
            } else {
                $uniqueToken = $request->session()->get('unique_token');
            }

            $data['unique_token'] = $uniqueToken;
        } else {
            $uniqueToken = $data['unique_token'];
        }

        $data['unique_token'] = $uniqueToken;

        $guest = Guest::firstOrCreate(["unique_token" => $uniqueToken], $data);
        return $guest;
    }
}
