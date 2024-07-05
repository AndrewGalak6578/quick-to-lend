<?php

namespace App\Http\Controllers\Guest\Bank;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\Bank\StoreRequest;
use App\Models\Guest;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();


        return 1111;
    }
}
