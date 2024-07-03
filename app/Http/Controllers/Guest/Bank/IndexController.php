<?php

namespace App\Http\Controllers\Guest\Bank;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->get('search');
        $guests = Guest::with(['bank', 'documents'])
            ->sortable()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->paginate(10);
        return view('test.guest.index', compact('guests'));
    }
}
