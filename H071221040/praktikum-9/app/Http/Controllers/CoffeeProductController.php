<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeProduct;

class CoffeeProductController extends Controller
{
    public function index() //Mengambil semua produk makeup dari database
    {
        $coffeeProducts = CoffeeProduct::all();
        return view('index', compact('coffeeProducts'));
    }

    public function create() //Menampilkan formulir untuk membuat produk makeup baru.
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $this->validateProductData($request); //untuk memastikan bahwa data yang masuk dari request valid berdasarkan aturan validas

        CoffeeProduct::create($data); //membuat instance baru dari model MakeupProduct dan mengisinya dengan data yang telah divalidasi. Kemudian, menyimpan instance baru tersebut ke dalam database.

        return redirect()->route('coffee-products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(CoffeeProduct $coffeeProduct) //Menampilkan detail dari produk makeup tertentu.
    {
        return view('show', compact('coffeeProduct'));
    }

    public function edit(CoffeeProduct $coffeeProduct) //Menampilkan formulir untuk mengedit produk makeup tertentu.
    {
        return view('edit', compact('coffeeProduct'));
    }

    public function update(Request $request, CoffeeProduct $coffeeProduct)
    {
        $data = $this->validateProductData($request);

        $coffeeProduct->update($data);

        return redirect()->route('coffee-products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(CoffeeProduct $coffeeProduct) //Menghapus produk makeup tertentu dari database
    {
        $coffeeProduct->delete();

        return redirect()->route('coffee-products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validateProductData(Request $request) //Menangani pengiriman formulir untuk memperbarui produk yang sudah ada di database
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
    }
}
