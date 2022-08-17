@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-1">
            <div class="col-lg-10">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <h2>Detail Specification</h2>
                </div>
                <a href="/dashboard/posts" class="btn btn-primary"><span data-feather="arrow-left-circle"></span>Back to
                    All DB</a>
                <a href="/dashboard/posts/{{ $post->kode }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->kode }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')"><span
                            data-feather="x-circle"></span> Delete</button>
                </form>
                {{-- <hr> --}}
                <table class="table table-responsive table-striped table-hover my-4" class="border-bottom">
                    <thead>
                        <tr class="table-success">
                            <th>Material code</th>
                            <th>Description</th>
                            <th>Long Description</th>
                            <th>Qty</th>
                            <th>Location</th>
                            <th>Mrp</th>
                            <th>Max</th>
                            <th>Rop</th>
                            <th>Safety Stock</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $post->kode }}</td>
                            <td>{{ $post->deskripsi }}</td>
                            <td>{{ $post->l_deskripsi }}</td>
                            <td>{{ $post->qty }}</td>
                            <td>{{ $post->loc }}</td>
                            <td>{{ $post->mrp }}</td>
                            <td>{{ $post->ma }}</td>
                            <td>{{ $post->rop }}</td>
                            <td>{{ $post->mi }}</td>
                            <td>{{ $post->price }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
        {{-- cut foto = overflow: hidden; --}}
        <div class="card col-lg-10 mb-5">
            <div class="card-body d-flex justify-content-center ">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                class="img-responsive img-centered img-fluid">
            </div>
          </div>
        {{-- <div style="height: 500px; width: 870px;" class="d-flex justify-content-center mb-5">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                class="img-responsive img-centered img-fluid">
        </div> --}}
    </div>
@endsection
