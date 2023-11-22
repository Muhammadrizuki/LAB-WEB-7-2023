@extends('layouts.main')

@section('home')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" style="background-color: #CA0442; color: white;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 24px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">#{{ $riders->number }}</h5>
                    <h2 class="card-title" style="font-size: 36px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">{{ $riders->name }}</h2>
                    <p class="card-text">Tim: {{ $riders->team }}</p>
                    <p class="card-text">Konstruktor: {{ $riders->konstruktor }}</p>
                    <p class="card-text">Negara: {{ $riders->country }}</p>
                    <p class="card-text">Tanggal Lahir: {{ $riders->tLahir }}</p>
                    <p class="card-text">{{ $riders->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
