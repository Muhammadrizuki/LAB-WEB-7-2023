<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(String $search="")
    {
        $productLine = DB::table('productLines')
            ->select('productLine')
            ->get();
        $title = "Home";
        if($search==""){
             
            $product = DB::table('products')->get();
        }else {
            $product = DB::table('products')->where('productLine',$search)->get();   
        }
        return view('index', compact('product', 'title', 'productLine'));
    }

    public function detail(String $code)
    {
        $product = DB::table('products')->where('productCode',$code)->get();
        return view('detail', compact('product'));
    }
}
