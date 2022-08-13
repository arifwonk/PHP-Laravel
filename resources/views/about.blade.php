@extends('layouts.main')


@section('container')
<div class="container">
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{  $image  }}" alt="{{ $name }}" width="250" class="img-thumbnail rounded-circle">

</div>
@endsection