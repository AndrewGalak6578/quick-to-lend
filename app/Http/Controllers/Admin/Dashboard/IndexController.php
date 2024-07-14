<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $guests = Guest::paginate(9);
        return view('admin.dashboard.dashboard', compact('guests'));
    }
}
