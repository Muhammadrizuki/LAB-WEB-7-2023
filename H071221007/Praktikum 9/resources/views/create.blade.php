@extends('layouts.main')

@section('home')
    <div class="container mt-5" style="margin-bottom: 40px;">
        <h1 style="color: white;">Create Rider</h1>
        <form action="{{ url('/create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number" style="color: white;">Nomor :</label>
                <input type="number" name="number" class="form-control" id="number" required>
            </div>            
            <div class="form-group">
                <label for="name" style="color: white;">Nama :</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="team" style="color: white;">Tim :</label>
                <input type="text" name="team" class="form-control" id="team" required>
            </div>
            <div class="form-group">
                <label for="konstruktor" style="color: white;">Konstruktor :</label>
                <input type="text" name="konstruktor" class="form-control" id="konstruktor" required>
            </div>
            <div class="form-group">
                <label for="country" style="color: white;">Negara :</label>
                <input type="text" name="country" class="form-control" id="country" required>
            </div>
            <div class="form-group">
                <label for="tLahir" style="color: white;">Tanggal Lahir:</label>
                <input type="date" name="tLahir" class="form-control" id="tLahir" required>
            </div>
            <div class="form-group">
                <label for="description" style="color: white;">Deskripsi:</label>
                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px; color:white" value="save">
            <a href="/" class="btn btn-secondary" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px;">Batal</a>
        </form>
    </div>
@endsection
