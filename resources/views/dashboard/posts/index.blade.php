@extends('dashboard.layouts.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 pb-2 border-bottom">
        <h1 class="h2">List Database spareparts</h1>
    </div>
    <div class="justify-content-left col-md-5 mb-2">
        <a href="/dashboard/posts/create" class="btn btn-primary my-3 mb-1"><i class="bi bi-file-earmark-plus-fill"></i>
            Insert New Data</a>
    </div>
    <div class="row">
        <div class="col justify-content-left col-md-5 my-2 ">
            <form action="/dashboard/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group ">
                    <input type="text" class="form-control mb-3" placeholder="Search.." name="search"
                        value="{{ request('search') }}" autofocus>
                    <button class="btn btn-light mb-3" type="submit"></button>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end pagination-sm col-sm-10">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show col-lg-11 " role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($posts->count())
        <div class="table-responsive col-lg-11">
            <table class="table table-striped table-sm">
                <thead class="align-middle">
                    <tr class="table-info">
                        <th>#</th>
                        <th>Material Code</th>
                        <th>Short Description</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $post->kode }}</td>
                            <td>{{ $post->deskripsi }}</td>
                            <td>{{ $post->qty }}</td>
                            <td class="text-center"><a href="/dashboard/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none">{{ $post->category->name }}</a></td>
                            <td>
                                <a href="/dashboard/posts/{{ $post->kode }}" class="badge bg-info "><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/posts/{{ $post->kode }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/posts/{{ $post->kode }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure you want to delete this')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <P class="text-center fs-4"> Data Not Found</P>
    @endif
@endsection
