<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KatalogController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('admin.katalog.index',compact('catalogues'));
    }

    public function create()
    {
        return view('admin.katalog.add');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'package_name'   => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'required|integer',
            'status_publish' => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/catalogues'), $imageName);
        }

        // Simpan data
        Catalogue::create([
            'image'          => $imageName,
            'package_name'   => $request->package_name,
            'description'    => $request->description,
            'price'          => $request->price,
            'status_publish' => $request->status_publish,
            'user_id'        => Auth::id(), // ambil id user yang login
        ]);

        return redirect()->route('admin.katalog.index')->with('success', 'Catalogue berhasil ditambahkan!');
    }

    public function edit($id)
{
    $catalogue = Catalogue::findOrFail($id);
    return view('admin.katalog.edit', compact('catalogue'));
}

public function update(Request $request, $id)
{
    $catalogue = Catalogue::findOrFail($id);

    $request->validate([
        'package_name'   => 'required|string|max:255',
        'description'    => 'required|string',
        'price'          => 'required|integer',
        'status_publish' => 'required|string',
        'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update gambar jika ada
    if ($request->hasFile('image')) {
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/catalogues'), $imageName);

        // replace image lama
        $catalogue->image = $imageName;
    }

    // Update field lainnya
    $catalogue->package_name   = $request->package_name;
    $catalogue->description    = $request->description;
    $catalogue->price          = $request->price;
    $catalogue->status_publish = $request->status_publish;
    $catalogue->save();

    return redirect()->route('admin.katalog.index')->with('success', 'Catalogue berhasil diupdate!');
}

public function destroy($id)
{
    $catalogue = Catalogue::findOrFail($id);

    // hapus gambar dari folder kalau ada
    if ($catalogue->image && file_exists(public_path('uploads/catalogues/' . $catalogue->image))) {
        unlink(public_path('uploads/catalogues/' . $catalogue->image));
    }

    $catalogue->delete();

    return redirect()->route('admin.katalog.index')->with('success', 'Catalogue berhasil dihapus!');
}

}
