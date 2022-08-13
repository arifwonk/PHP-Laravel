@extends('layouts.main')

@section('container')
    <div class="container">

        <a href="/" class="btn btn-primary" class="d-flex justify-content-end">Back to database</a>
    </div>
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <hr>
        
        <table class="table table-responsive table-striped table-hover my-5">
            <thead>
                <tr class="table-success">
                    <th>Material code</th>
                    <th>Description</th>
                    <th>Long Description</th>
                    <th>Qty</th>
                    <th>Location</th>
                    <th>Max</th>
                    <th>Rop</th>
                    </th>
                    <th>Safety Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->kode }}</td>
                    <td>{{ $post->deskripsi }}</td>
                    <td>{{ $post->l_deskripsi }}</td>
                    <td>{{ $post->qty }}</td>
                    <td>{{ $post->loc }}</td>
                    <td>{{ $post->ma }}</td>
                    <td>{{ $post->rop }}</td>
                    <td>{{ $post->mi }}</td>
                    <td>{{ $post->price }}</td>
                    <td><a href="/posts?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</a></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="card mb-5">
            <div class="card-body d-flex justify-content-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                class="img-responsive img-centered img-fluid">
            </div>
          </div>
    </div>
@endsection
