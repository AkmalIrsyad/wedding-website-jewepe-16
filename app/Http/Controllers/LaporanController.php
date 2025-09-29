<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // ambil semua data pesanan + relasi katalog
        $orders = Order::with('catalogue')->get();

        return view('admin.laporan.index', compact('orders'));
    }
}
