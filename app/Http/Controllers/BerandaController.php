<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Setting;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function catalogues()
    {
        // ambil 6 katalog terbaru yg publish
        $setting = Setting::get();
        $catalogues =Catalogue::where('status_publish', 'Y')
                    ->latest()
                    ->take(6)
                    ->get();
        return view('landing.index', compact('catalogues','setting'));
    }

     public function cataloguesDetail($id)
    {
        $catalogue = Catalogue::findOrFail($id);
        return view('landing.show', compact('catalogue'));
    }

    // public function kontakIndex()
    // {
    //     return view('landing.kontak');
    // }
}
