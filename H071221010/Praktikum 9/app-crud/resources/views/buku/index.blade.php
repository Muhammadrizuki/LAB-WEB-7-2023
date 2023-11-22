@extends('layout.template')
<!-- START DATA -->
@section('konten')    
<div class="p-5 rounded shadow-sm text-light" style="margin-top: 60px; background-color: rgb(185, 164, 205)">
    <div class="pb-2">
        <h2 class="fw-bold">Data Buku</h2>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-2">
        <form class="d-flex" action="{{ url('buku') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-dark" type="submit">Cari</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr class="text-light">
                {{-- <th class="col-md-1 text-center align-middle">No</th> --}}
                <th class="col-md-3 text-center align-middle">ID Buku</th>
                <th class="col-md-4 text-center align-middle">Judul Buku</th>
                <th class="col-md-2 text-center align-middle">Penulis</th>
                <th class="col-md-2 text-center align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                {{-- <td class="text-center align-middle">{{ $i }}</td> --}}
                <td class="text-center align-middle text-light">{{ $item->idbuku }}</td>
                <td class="text-center align-middle text-light">{{ $item->judul }}</td>
                <td class="text-center align-middle text-light">{{ $item->penulis }}</td>
                <td class="text-center align-middle">
                    <a href='{{ url('buku/'.$item->idbuku) }}' class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info fa-lg"></i></a>
                    <a href="{{ url('buku/'.$item->idbuku.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('buku/'.$item->idbuku) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash fa-lg"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
                <!-- TOMBOL TAMBAH DATA -->
        </tbody>
    </table>
    <div class="pb-2">
        <a href='{{ url('buku/create') }}' class="btn btn-primary"><i class="fa-solid fa-plus fa-lg" style="color: #ffffff;"></i></a>
    </div>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
    