<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;

class SortController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->get('sort_by', 'id'); // Default sorting by 'id'
        $sortOrder = $request->get('sort_order', 'asc'); // Default sorting order 'asc'

        $guests = Guest::orderBy($sortBy, $sortOrder)->paginate(10);

        if ($request->ajax()) {
            return view('admin.dashboard.includes.guest_table', compact('guests'))->render();
        }

        return view('admin.dashboard.index', compact('guests'));
    }
}
