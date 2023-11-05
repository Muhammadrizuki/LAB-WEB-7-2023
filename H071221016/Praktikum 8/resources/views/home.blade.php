@extends('layouts.main')
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

    .h2-word-3 {
        --color-1: #FF6B6B;
        --color-2: #DFFF00;
        --color-3: #FFB74D;
    }

    .h2-word-4 {
        --color-1: #FAD02E;
        --color-2: #3B5998;
        --color-3: #30AAE5;
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

    /* Here are just some visual styles. 🖌 */


    .h2 {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 50px;
        text-transform: uppercase;
    }
</style>

@section('container')
    <h2 class="h2 ">
        <span class="h2-word h2-word-1">Selamat</span>
        <span class="h2-word h2-word-2">Datang</span>
        <span class="h2-word h2-word-3">di</span>
        <span class="h2-word h2-word-4">ClassicModels!</span>
    </h2>
@endsection