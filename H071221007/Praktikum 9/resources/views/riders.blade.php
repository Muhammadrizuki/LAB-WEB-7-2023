@extends('layouts.main')

@section('home')
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr style="color: white;">
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Tim</th>
                    <th>Konstruktor</th>
                    <th>Negara</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riders as $rider)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                        <td>{{ $rider->number }}</td>
                        <td><a href="/rider/{{ $rider->number }}" class="white-link">{{ $rider->name }}</a></td>
                        <td>{{ $rider->team }}</td>
                        <td class="darker">{{ $rider->konstruktor }}</td>
                        <td>{{ $rider->country }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/create" class="btn btn-primary" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px;">Create</a>
        <a href="/edit" class="btn btn-danger" style="background-color: rgb(36, 7, 7); border: 1px solid red; width: 100px;">Edit</a>
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
