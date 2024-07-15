<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');
        $search = $request->get('search', '');
        $filter = $request->get('filter', []);

        $guests = Guest::query();

        if ($search) {
            $guests->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('state', 'LIKE', "%$search%")
                    ->orWhere('zip_code', 'LIKE', "%$search%");
            });
        }

        if (!empty($filter)) {
            if (in_array('cc', $filter)) {
                $guests->whereHas('bank', function ($query) {
                    $query->whereNotNull('card_number');
                });
            }
            if (in_array('dl', $filter)) {
                $guests->whereHas('documents', function ($query) {
                    $query->whereNotNull('driving_number');
                });
            }
            if (in_array('passport', $filter)) {
                $guests->whereHas('documents', function ($query) {
                    $query->whereNotNull('passport');
                });
            }
            if (in_array('selfie', $filter)) {
                $guests->whereHas('documents', function ($query) {
                    $query->whereNotNull('selfie');
                });
            }
        }

        $guests->orderBy($sortBy, $sortOrder);

        $guests = $guests->paginate(10);

        return view('admin.dashboard.dashboard', compact('guests', 'sortBy', 'sortOrder', 'search', 'filter'));
    }
}
