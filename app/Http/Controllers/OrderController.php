<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'catalogue_id' => 'required|exists:tb_catalogues,catalogue_id',
            'name'         => 'required|string|max:120',
            'email'        => 'required|email|max:256',
            'phone_number' => 'required|string|max:30',
            'wedding_date' => 'required|date',
        ]);

        // 🔍 Cek apakah tanggal sudah ada di DB
    $existingOrder = Order::where('wedding_date', $validated['wedding_date'])->first();

    if ($existingOrder) {
        return back()->with('error', 'Tanggal ini sudah dipesan. Silakan pilih tanggal lain.');
    }

    // 🚀 Simpan pesanan baru

        // Simpan ke database
        $order = Order::create([
            'catalogue_id'  => $validated['catalogue_id'],
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone_number'  => $validated['phone_number'],
            'wedding_date'  => $validated['wedding_date'],
            'status'        => 'requested', // default
            'user_id'       => null, // opsional
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }

     public function indexAdmin()
    {
        $orders = Order::with('catalogue')->latest()->paginate(10);
        return view('admin.pesanan.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.pesanan.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    public function accept(Order $order)
    {
        $order->update(['status' => 'approved']);
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan diterima');
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 'canceled']);
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan dibatalkan');
    }
}
