@extends('layouts.main')

@section('body')
    <div class="card mb-2 p-3" style="background-color: rgb(222, 214, 230);">
        <div class="card-body ">
            <h2 class="card-title"><b>{{ $pc->productName }} ( {{ $pc->productLine}} )</b></h2>
            <p class="card-text">{{ $pc->productDescription }}</p>
            <p class="card-text">By {{ $pc->productVendor }}</p>
            <h5 class="card-text text-primary">Stock: {{ $pc->quantityInStock }}</h5>
            <h5 class="card-text text-success">$ {{ $pc->buyPrice }}</h5>
        </div>
        <div>
    </div>
        <div class="card-footer">
            <a href="/product" class="btn btn-danger">Back</a>
        </div>
    </div>
@endsection