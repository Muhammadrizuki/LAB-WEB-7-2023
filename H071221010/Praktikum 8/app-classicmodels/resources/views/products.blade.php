@extends('layouts.main')

@section('body')
<div class="product-list row d-flex justify-content-center">
    @foreach ($product as $products)
    <div class="col-md-4 mb-3" >
        <div class="product-card card h-100 p-3 mx-auto text-dark" style="width: 22rem; background-color: rgb(222, 214, 230);">
            <div class="card-body">
                <h5 class="card-title fw-700"><b>{{ $products->productName }} ( {{ $products->productLine }} )</b></h5>
                <p class="card-text">By {{ $products->productVendor }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <h2>
                        <a href="/product/details/{{ $products->productCode }}" class="btn btn-primary">Details</a>
                    </h2>
                </div>
                <div class="pt-3 pb-2 text-primary">
                    <h6>Stock : {{ $products->quantityInStock }}</h6>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
