<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'selfie_upload' => 'nullable|boolean',
            'selfie_second' => 'nullable|boolean',
            'extra_doc' => 'nullable|boolean',
        ]);

        // Update the settings in the database
        Setting::where('id', 1)->update([
            'selfie_upload' => $validated['selfie_upload'],
            'selfie_second' => $validated['selfie_second'],
            'extra_doc' => $validated['extra_doc'],
        ]);

        return response()->json(['success' => true]);
    }

    public function show()
    {
        $settings = Setting::first();

        return view('admin.dashboard.setting', compact('settings'));
    }
}
