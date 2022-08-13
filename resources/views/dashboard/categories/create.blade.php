@extends('dashboard.layouts.main')

@section('container')
    <div>
        <a href="/dashboard/categories" class="btn btn-primary my-3"><span data-feather="arrow-left-circle"></span> Back Categories</a>
    </div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 pb-2 border-bottom">
        <h1>Edit New Categories</h1>
    </div>



    <div class="col-lg-5">
        <form method="post" action="/dashboard/categories" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus
                    required value="{{ old('name') }}" >
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" autofocus
                    required value="{{ old('slug') }}" >
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                        <button type="submit" class="btn btn-success mb-5"><i class="bi bi-file-earmark-arrow-up"></i> Save
                Data</button>
        </form>
    </div>
@endsection
