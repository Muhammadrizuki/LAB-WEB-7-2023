@extends('layouts.main')

@section('home')
    <div class="container mt-5" style="margin-bottom: 40px">
        <h1 style="color: white;">Edit Rider</h1>
        <form action="{{ route('riders.update', $riders->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="number" style="color: white;">Nomor:</label>
                <input type="number" name="number" value="{{ $riders->number }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name" style="color: white;">Nama:</label>
                <input type="text" name="name" value="{{ $riders->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="team" style="color: white;">Tim:</label>
                <input type="text" name="team" value="{{ $riders->team }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="konstruktor" style="color: white;">Konstruktor:</label>
                <input type="text" name="konstruktor" value="{{ $riders->konstruktor }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="country" style="color: white;">Negara:</label>
                <input type="text" name="country" value="{{ $riders->country }}" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="dob" style="color: white;">Tanggal Lahir:</label>
                <input type="date" name="tLahir" value="{{ $riders->tLahir }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" style="color: white;">Deskripsi Pembalap:</label>
                <textarea name="description" class="form-control" required>{{ $riders->description }}</textarea>
            </div>
            
            <input type="submit" name="submit" class="btn btn-primary" style="background-color: rgb(36, 7, 7); border: 1px solid red; color:white; width: 100px;" value="Simpan">
            <a class="btn btn-secondary" style="background-color: rgb(36, 7, 7); border: 1px solid red; color:white; width: 100px;" href="/edit">Batal</a>
        </form>
    </div>
@endsection
