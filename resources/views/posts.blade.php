@extends('layouts.main')

@section('container')
    <div class="container">

        <h1 class="mb-5 text-center">{{ $title }}</h1>
        {{-- @foreach ($categories as $category)
        <a href="/posts?category={{ $category->slug }}">
            <select class="form-select" aria-label="Default select example" name="category_id">
                        <option  value="{{ $category->id }}">{{ $category->name }}  </option>
                       
                    </select>
                    @endforeach
                </a> --}}
        @can('admin')
        <div class="d-flex justify-content-end">
            <a href="/export" class="btn btn-success my-3"><i class="bi bi-file-earmark-excel-fill"></i>
                Export excel file</a>
        </div>
        @endcan

        <div class="row">
            <div class="col justify-content-left col-md-5">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group">
                        <input type="text" class="form-control mb-3" placeholder="Search.." name="search"
                            value="{{ request('search') }}" autofocus>
                        <button class="btn btn-dark mb-3" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end pagination-sm ">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

        @if ($posts->count())
            <div class="mb-3 table-responsive">
                <table class="table table-striped table-hover table-sm align-middle ">
                    <thead>
                        <tr class="table-info text-center">
                            <th>Material code</th>
                            <th>Description</th>
                            <th>Long Description</th>
                            <th>Qty</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            @foreach ($posts as $post)
                                <td class="text-center">{{ $post->kode }}</td>
                                <td>{{ $post->deskripsi }}</td>
                                <td>{{ $post->l_deskripsi }}</td>
                                <td class="text-center">{{ $post->qty }}</td>
                                <td class="text-center">{{ $post->loc }}</td>
                                <td class="text-center"><a href="/posts?category={{ $post->category->slug }}"
                                        class="text-decoration-none">{{ $post->category->name }}</a></td>
                                <td> <a href="/posts/{{ $post->kode }}" class="btn btn-primary">Show</a></td>
                        </tr>
        @endforeach
        </tbody>
        <caption class="text-end">Update On: {{ $post->created_at->diffForHumans() }} </caption>
        </table>
        <div class="d-flex justify-content-end pagination-sm">
            {{ $posts->links() }}
        </div>
    </div>
@else
    <P class="text-center fs-4 fw-bold"> Data not found</P>
    @endif


@endsection
