<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['item' => $products]);
    }
    public function search(Request $request)
    {
        $productLine = $request->input('productLine');

        $products = Product::where('productLine', $productLine)->get();
        if ($products-> isempty()){
            $pesan="tidak ada data";
            echo "<script>alert('$pesan')</script>";
        }

        return view('productlines', ['products' => $products]);
    }
    public function showProduct($productName)
    {
        $product = Product::where('productName', $productName)->first();

        return view('show', ['product' => $product]);
    }
}
