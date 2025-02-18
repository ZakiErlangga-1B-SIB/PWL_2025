<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller

use App\Models\Item; // Mengimpor model Item untuk digunakan dalam controller
use Illuminate\Http\Request; // Mengimpor class Request untuk mengelola permintaan HTTP

class ItemController extends Controller // Mendefinisikan class ItemController yang mewarisi class Controller
{
    public function index()// Method untuk menampilkan daftar item (halaman utama)
    {
        $items = Item::all();// Mengambil semua data item dari database
        return view('items.index', compact('items'));// Mengembalikan view 'items.index' dengan data items
    }

    public function create()// Method untuk menampilkan form pembuatan item baru
    {
        return view('items.create');// Mengembalikan view 'items.create' untuk form pembuatan
    }

    public function store(Request $request)// Method untuk menyimpan item baru ke database
    {
        $request->validate([// Memvalidasi data input dari request
            'name' => 'required',// Field name harus diisi
            'description' => 'required',// Field description harus diisi
        ]);
         
        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan// Membuat item hanya dengan field name dan description
        return redirect()->route('items.index')->with('success', 'Item added successfully.');// Redirect dengan pesan sukses
    }

    public function show(Item $item)// Method untuk menampilkan detail item tertentu (menggunakan route model binding)
    {
        return view('items.show', compact('item')); // Mengembalikan view 'items.show' dengan data item
    }

    public function edit(Item $item) // Method untuk menampilkan form edit item (menggunakan route model binding)
    {
        return view('items.edit', compact('item')); // Mengembalikan view 'items.edit' dengan data item
    }

    public function update(Request $request, Item $item) // Method untuk mengupdate item yang ada
    {
        $request->validate([ // Memvalidasi data input dari request
            'name' => 'required', // Field name harus diisi
            'description' => 'required',// Field description harus diisi
        ]);
         
        //$item->update($request->all());
        //return redirect()->route('items.index');
        // Hanya masukkan atribut yang diizinkan
         $item->update($request->only(['name', 'description'])); // Update item hanya dengan field name dan description
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');// Redirect dengan pesan sukses
    }

    public function destroy(Item $item)// Method untuk menghapus item dari database
    {
        
       // return redirect()->route('items.index');
       $item->delete();// Menghapus item dari database
       return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Redirect dengan pesan sukses
    }
}
