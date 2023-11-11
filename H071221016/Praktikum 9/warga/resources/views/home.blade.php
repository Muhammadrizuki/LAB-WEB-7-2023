@extends('welcome')
<style>
    .h2-word {
        animation: color-animation 3s linear infinite;
    }

    .h2-word-1 {
        --color-1: #FF5733;
        --color-2: #0077B6;
        --color-3: #FFD100;
    }

    .h2-word-2 {
        --color-1: #1E90FF;
        --color-2: #FF4F58;
        --color-3: #44CC00;
    }

    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }
    .h2 {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 50px;
        text-transform: uppercase;
    }
    p{
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 25px;
    }
</style>

@section('content')
    <h2 class="h2 ">
        <span class="h2-word h2-word-1">Selamat</span>
        <span class="h2-word h2-word-2">Datang</span>
    </h2>
    <p>
        Dengan menggali dan memahami data penduduk, kita dapat bersama-sama menciptakan <br>
        solusi yang lebih baik untuk masa depan.
    </p>
@endsection