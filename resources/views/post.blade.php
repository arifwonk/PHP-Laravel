@extends('layouts.main')

@section('container')
    <div class="container">
        <h1 class="text-center">{{ $title }}</h1>
        <hr>

        <a href="/" class="btn btn-primary my-3" class="d-flex justify-content-end">Back to database</a>
    </div>

    <div class="container table-responsive mb-5 border-bottom" >      
        
        <table class="table table-striped table-hover align-middle ">
            <thead>
                <tr class="table-success">
                    <th class="text-center" >Material code</th>
                    <th>Description</th>
                    <th>Long Description</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">mrp</th>
                    <th class="text-center">Max</th>
                    <th class="text-center">Rop</th>
                    <th class="text-center">Safety Stock</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Category</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $post->kode }}</td>
                    <td>{{ $post->deskripsi }}</td>
                    <td>{{ $post->l_deskripsi }}</td>
                    <td class="text-center">{{ $post->qty }}</td>
                    <td class="text-center">{{ $post->loc }}</td>
                    <td class="text-center">{{ $post->mrp }}</td>
                    <td class="text-center">{{ $post->ma }}</td>
                    <td class="text-center">{{ $post->rop }}</td>
                    <td class="text-center">{{ $post->mi }}</td>
                    <td class="text-center">{{ $post->price }}</td>
                    <td class="text-center"><a href="/posts?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
        <div class="card mb-5 container ">
            <div class="card-img d-flex justify-content-center ">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                class="img-responsive img-centered">
            </div>
          </div>
@endsection
