<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKatalog = Catalogue::count();
        $totalPesanan = Order::count();
        $pesananMenunggu = Order::where('status', 'pending')->count();
        $pesananDiterima = Order::where('status', 'accepted')->count();

        // API Cuaca (contoh pakai OpenWeatherMap)
        $apiKey = "ISI_API_KEY_MU"; // daftar di https://openweathermap.org/api
        $city = "Jakarta";
        $weather = null;

        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'id',
            ]);

            if ($response->successful()) {
                $weather = $response->json();
            }
        } catch (\Exception $e) {
            $weather = null;
        }

        return view('admin.dashboard', compact(
            'totalKatalog',
            'totalPesanan',
            'pesananMenunggu',
            'pesananDiterima',
            'weather'
        ));
    }
}
