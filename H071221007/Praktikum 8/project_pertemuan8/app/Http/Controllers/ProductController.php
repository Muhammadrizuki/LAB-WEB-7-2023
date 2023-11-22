<?php

namespace App\Http\Controllers;

use index;
use App\Models\products;
use App\Models\productCode;
use App\Models\ProductLines;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Products::all();
        return view('products', ['products' => $products]);
    }

    public function showByProductLine($productLine)
    {
        $products = Products::where('productLine', $productLine)->get();
        return view('products', compact('products'));
    }

    public function showProductDetail($id)
    {
        $products = Products::where('productCode', $id)->first();
        
        if (!$products) {
            return view('welcome');
        }

        return view('products_id', compact('products'));
    }

    // public function showProductDetail($id)
    // {
    //     $product = Products::find($id);
    //     return view('product.product_detail', compact('product'));
    // }

    // public function showDetailProduct($productCode)
    // {
    //     $products = Products::where('productCode', $productCode)->get();
    //     return view('products', compact('products'));
    // }

}
