<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid 19 new case vs recovery 2020 Makassar</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap core CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">H071201042</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('beranda')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('data')}}">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-between mb-1">
        <h1 class="h1 text-black-800">Data Covid 19 2020 Kota Makassar</h1>
        <div>
            <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#TambahDPeserta">Tambah Data</button>
        </div>
    </div>

    </div>
    <div class="modal fade" id="TambahDPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('inputData')}}" class="signin-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" d-flex mb-3">
                        <div class="form-group col-md-6">
                            <label class="label" for="kasus_baru">Kasus Baru</label>
                            <input type="text" class="form-control  @error('kasus_baru') is-invalid @enderror" name="kasus_baru" placeholder="Kasus Baru" required autocomplete="kasus_baru">
                            @error('kasus_baru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label" for="recovered">recovered</label>
                            <input type="number" name="recovered" class="form-control @error('recovered') is-invalid @enderror" placeholder="recovered" required autocomplete="recovered">
                            @error('recovered')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label" for="bulan">Bulan</label>
                        <input type="text" name="bulan" class="form-control @error('bulan') is-invalid @enderror" placeholder="bulan" required autocomplete="bulan">
                        @error('bulan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <br>
    <div class="container-md">
        <div class="table">
            <table class="table table-primary table-striped col-md-12">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kasus Baru</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">bulan</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $nomor=1;
                    @endphp
                    @foreach($data as $dataList)
                    <tr>
                        <th scope="row">{{$nomor++}}</th>
                        <td>{{ $dataList->kasus_baru}}</td>
                        <td>{{ $dataList->recovered}}</td>
                        <td>{{ $dataList->bulan}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$dataList->id}}">edit</button>
                            <div class="modal fade" id="exampleModal1{{$dataList->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data bulan {{$dataList->bulan}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('editData',['id'=>$dataList->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @csrf
                                            <div class=" d-flex mb-3">
                                                <div class="form-group col-md-6">
                                                    <label class="label" for="kasus_baru1">Kasus Baru</label>
                                                    <input type="text" class="form-control  @error('kasus_baru1')  is-invalid @enderror" value="{{ $dataList->kasus_baru}}" name="kasus_baru1" placeholder="Kasus Baru" required autocomplete="kasus_baru1">
                                                    @error('kasus_baru1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="label" for="recovered1">recovered</label>
                                                    <input type="number" name="recovered1" class="form-control @error('recovered1') is-invalid @enderror" value="{{ $dataList->recovered}}" placeholder="recovered" required autocomplete="recovered1">
                                                    @error('recovered1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $dataList->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>