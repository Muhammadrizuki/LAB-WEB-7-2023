@extends('layouts.main')
@section('container')
    @foreach ($item as $product)
        <div class="mb-5">
            <h3 class="mb-3">
                <h3>Nama Produk : <a
                        href="{{ route('products.show', $product->productName) }}" style="color: #CD5C08;">{{ $product->productName }}</a></h3>
            </h3>
            <p>ProductLine : {{ $product->productLine }}</p>
            <p>ProductVendor : {{ $product->productVendor }}</p>
            <p>QuantityInStock : {{ $product->quantityInStock }}</p>
        </div>
    @endforeach
@endsection