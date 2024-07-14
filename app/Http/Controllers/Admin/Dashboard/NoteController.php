<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\StoreRequest;
use App\Http\Requests\Loan\UpdateRequest;
use App\Models\Guest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $guest = Guest::findOrFail($data['guest_id']);

        $guest->update(['note' => $data['note']]);

        return redirect()->route('admin.dashboard.index');
    }
}
