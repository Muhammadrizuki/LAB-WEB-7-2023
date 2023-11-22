@extends('layouts.main')
@section('container')
    <h1>Hasil Pencarian Produk</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->productName }}</li>
        @endforeach
    </ul>
    <a href="/" class="btn btn-secondary" style="background-color: #CD5C08; color: #000000;">Back to home</a>
@endsection