<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // hanya 1 data
        return view('admin.settings',compact('setting'));
    }

    // simpan/update data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'website_name' => 'required|string|max:256',
            'phone_number1' => 'required|string|max:15',
            'phone_number2' => 'required|string|max:15',
            'email1' => 'required|email|max:80',
            'email2' => 'required|email|max:80',
            'address' => 'required|string',
            'maps' => 'required|string', // iframe google maps
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'Facebook_url' => 'required|url|max:256',
            'Instagram_url' => 'required|url|max:256',
            'Youtube_url' => 'required|url|max:256',
            'Header_bussines_hour' => 'required|string|max:160',
            'Time_bussines_hour' => 'required|string',
        ]);

        $setting = Setting::firstOrNew([]);

        // upload logo kalau ada
if ($request->hasFile('logo')) {
    // Hapus logo lama kalau ada
    if (!empty($setting->logo) && file_exists(public_path($setting->logo))) {
        unlink(public_path($setting->logo));
    }

    // Simpan logo baru
    $filename = time().'_'.$request->file('logo')->getClientOriginalName();
    $request->file('logo')->move(public_path('uploads/logo'), $filename);
    $validated['logo'] = 'uploads/logo/' . $filename;
}


        $setting->fill($validated);
        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
