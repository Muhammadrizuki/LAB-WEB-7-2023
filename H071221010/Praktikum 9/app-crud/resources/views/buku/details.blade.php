@extends('layout.template')
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2 class="text-center fw-bold">Detail Buku</h2>
    <hr class="border border-dark border-2 opacity-50">
    <center><img src="{{ url('image/pp.png') }}" alt="" style="max-height: 300px; max-width: 300px"></center>
    <hr class="border border-dark border-2 opacity-50">
    <div class="container p-3">
        <table class="table">
            <tbody>
                <tr>
                    <td class="fw-bold">ID Buku</td>
                    <td>:</td>
                    <td>{{ $data->idbuku }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Judul Buku</td>
                    <td> : </td>
                    <td>{{ $data->judul }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Penulis</td>
                    <td> : </td>
                    <td>{{ $data->penulis }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Tanggal terbit</td>
                    <td> : </td>
                    <td>{{ date('d F Y', strtotime($data->tanggal_terbit)) }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Kategori (Genre)</td>
                    <td> : </td>
                    <td>{{ $data->kategori }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('buku') }}" class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
    </div>
    
</div>
@endsection