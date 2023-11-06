@extends('layouts.main')

@section('tampilan-produk')
    <style>
        .row {
            margin-top: 120px;
            margin-bottom: 20px;
        }

        .custom-card {
            background-color: #1c1c1c; 
            color: #fff; 
            font-size: 14px; 
            padding: 10px; 
            border: 1px solid #111; 
            border-radius: 5px; 
            margin-top: 20px;
        }

        .custom-card .product-name {
            font-size: 18px; 
            background-color: #333; 
            padding: 5px; 
            margin: 0;
            color: rgb(185, 149, 28); 
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s; 
            text-decoration: none;
        }

        .custom-card .product-name:hover {
            background-color: #222; 
            color: rgb(227, 209, 150); 
            text-decoration: none;
        } 

        .toProductDetail {
            text-decoration: none;
        }
        
        /* .custom-card .product-name a {
            text-decoration: none;
        } */

        /* .container {
            margin-top: 30px;
        } */

        .button-container {
            position: fixed;
            top: 77px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            z-index: 999;
            background-color: transparent;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            width: 100%;
            justify-content: center; /* Tombol akan tertata rapi di tengah horizontal */
            align-items: center;
            text-align: center;
            paddding-bottom:10px;
        }

        .custom-button {
            transition: background-color 0.3s, color 0.3s;
            background-color: #1c1c1c;
            /* color: rgb(241, 190, 22); */
            color: #E2BC77;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            width: 160px;
            margin: 5px;
            font-size: 16px; /* Ukuran font lebih kecil */
        }

        .custom-button:hover {
            background-color: #414040;
            color: rgb(227, 209, 150);
            /* color: #E2BC77; */
            text-decoration: none;
        }

    </style>


<div class="button-container">
    <a class="custom-button" href="/product">
        All
    </a>
    <a class="custom-button" href="/product/Classic%20Cars">
        Classic Cars
    </a>
    <a class="custom-button" href="/product/Motorcycles">
        Motorcycles
    </a>
    <a class="custom-button" href="/product/Planes">
        Planes
    </a>
    <a class="custom-button" href="/product/Ships">
        Ships
    </a>
    <a class="custom-button" href="/product/Trains">
        Trains
    </a>
    <a class="custom-button" href="/product/Trucks%20and%20Buses">
        Trucks and Buses
    </a>
    <a class="custom-button" href="/product/Vintage%20Cars">
        Vintage Cars
    </a>
</div>



    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="custom-card">
                        {{-- <a class="toProductDetail" href="/product/{{ $product->productLine }}/{{ $product->productCode }}"> --}}
                        <a class="toProductDetail" href="/produk/{{ $product->productCode }}">
                            <div class="product-name">{{ $product->productName }}</div>
                        </a>
                        <div class="card-body">
                            <p class="card-text">Product Line: {{ $product->productLine }}</p>
                            <p class="card-text">Vendor: {{ $product->productVendor }}</p>
                            <p class="card-text">Quantity in Stock: {{ $product->quantityInStock }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
