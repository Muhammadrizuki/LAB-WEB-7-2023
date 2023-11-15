@extends('layout.template')

@section('konten')
<style>
  body {
    background-image: url('image/bg.png');
    background-size: cover;
    text-align: center;
  }
  h1 {
    color: rgb(132, 107, 151);
  }
  .home {
    padding-top: 200px;
  }
</style>
<div class="home">
    <h1 class="display-4"><b>Welcome to AcliBook</b></h1>
    <br>
    <a class="btn btn-primary btn-lg" href="/buku" role="button">Show Books</a>
</div>
@endsection