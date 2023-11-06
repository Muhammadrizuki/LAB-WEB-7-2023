@extends('layout/template')

@section('carousel')
    <style>
        .carousel-inner img {
            height: 95vh;
            object-fit: cover;
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://mcdn.wallpapersafari.com/medium/15/17/POFMwk.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://wallpaperaccess.com/full/9819861.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://6.soompi.io/wp-content/uploads/image/20230831031212_SW-02-1.jpeg?s=900x600&e=t" class="d-block w-100" 
                alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection

@section('content')
    <style>
        .container {
            height: 50vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;3
        }
    </style>

    <div class="container">
        <a href="/products" class="btn btn-success">Silahkan Belanja</a>
    </div>
@endsection
