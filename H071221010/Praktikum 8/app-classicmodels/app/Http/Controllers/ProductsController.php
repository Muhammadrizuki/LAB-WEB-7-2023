<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function showProducts() {
        return view('products', [
            "product" => Products::all(),
        ]);
    }

    public function showProductByProductLine($productLine) {
        $product = Products::where('productLine', $productLine)->get();
        return view('products', [ "product" => $product ]);
    }

    public function showProductByProductCode($productCode) {
        $product = Products::where('productCode', $productCode)->first();
        return view('product-by-code', [ "pc" => $product ]);
    }
}
