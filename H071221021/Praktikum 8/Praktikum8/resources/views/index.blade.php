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
                <img src="https://i.pinimg.com/564x/36/2c/11/362c11448cdc31e661cb509252f8f5df.jpg" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption">
                    <h1><strong>SELAMAT DATANG !</strong></h1>
                    <p><strong>Selamat berbelanja di toko kami, dimana kami menyediakan beberapa 
                        jenis transportasi yang bisa anda beli dengan harga yanng terjangkau</strong></p>
                    <a href="/products" class="btn btn-outline-light"><strong>SILAHKAN BERBELANJA </strong></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/564x/57/12/8f/57128f7a189cad5eca4df652234aaebc.jpg" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption">
                    <a href="/products" class="btn btn-outline-light"><strong>SILAHKAN BERBELANJA </strong></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/564x/c4/7d/39/c47d3916c91f2d696339f67873492019.jpg" class="d-block w-100" 
                    alt="...">
                <div class="carousel-caption">
                    <a href="/products" class="btn btn-outline-light"><strong>SILAHKAN BERBELANJA </strong></a>
                </div>
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
            justify-content: center;
            align-items: center;
        }
    </style>

@endsection
