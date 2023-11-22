@extends('layouts.main')

@section('content')

    
<style>

    .card {
        margin-top: 90px;
        width: 1050px;
        /* text-align: center; */
        align-content: center;
        justify-content: center;
        text-align:left;
        border-color: #1d1d1d;
        /* border radius: 10px; */
    }



    .card-header {
        background-color: #111111;
        color: #E2BC77;
    }

    .card-title {
        color: #E2BC77;
        font-size: 24px;
        font-size: bold;
    }

    .card-body {
        background-color: #1d1d1d;
        color: #E2BC77;
    }

    .card-body p {
        font-size: 18px;
        color: #E2BC77;
    }

</style>


    <div class="container">
        <center>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">{{ $products->productName }}</h2>
                </div>
                <div class="card-body">
                    <p>Product Line: {{ $products->productLine }}</p>
                    <p>Product Scale: {{ $products->productScale }}</p>
                    <p>Product Vendor: {{ $products->productVendor }}</p>
                    <p>Product Description: {{ $products->productDescription }}</p>
                    <p>Quantity in Stock: {{ $products->quantityInStock }}</p>
                    <p>Buy Price: ${{ $products->buyPrice }}</p>
                    <p>MSRP: ${{ $products->MSRP }}</p>
                </div>
            </div>  
        </center>
        
    </div>
@endsection

