@extends('layouts.main')

@section('home')
    <div class="container mt-5" style="margin-bottom: 70px">
        <h1 style="color: #ffffff;">Edit Rider</h1>
        <table class="table">
            <thead>
                <tr style="color: white;">
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Tim</th>
                    <th>Konstruktor</th>
                    <th>Negara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riders as $rider)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                        <td>{{ $rider->number }}</td>
                        <td><a href="/rider/{{ $rider->number }}" class="white-link">{{ $rider->name }}</a></td>
                        <td>{{ $rider->team }}</td>
                        <td>{{ $rider->konstruktor }}</td>
                        <td>{{ $rider->country }}</td>
                        <td>
                            <a href="/edit/update/{{ $rider->id }}" class="btn" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px; color: white;">Edit</a>
                            <a href="/edit/delete/{{ $rider->id }}" class="btn btn-danger" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px;">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .even {
            background-color: #89022B; /* Warna latar belakang baris ganjil */
        }

        .odd {
            background-color: #CA0442; /* Warna latar belakang baris genap */
        }

        .table {
            background: rgb(36, 7, 7);
            color: white;
        }

        .white-link {
            color: white; 
            text-decoration: none; 
        }

        .white-link:hover {
            color: black; 
        }

        .btn-primary:hover, .btn-danger:hover {
            background-color: #89022B; 
        }
    </style>
@endsection
