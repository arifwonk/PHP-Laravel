@extends('dashboard.layouts.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 pb-2 border-bottom">
        <h1>Edit data</h1>
    </div>

    <div class="col mb-4">
        <a href="/dashboard/posts" class="btn btn-primary"><span data-feather="arrow-left-circle"></span> Back to
            All DB</a>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{ $post->kode }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Material code</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode"
                    required value="{{ old('kode', $post->kode) }}">
                @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                    name="deskripsi" required value="{{ old('deskripsi', $post->deskripsi) }}">
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="l_deskripsi" class="form-label">Long Description</label>
                <input type="text" class="form-control @error('l_deskripsi') is-invalid @enderror" id="l_deskripsi"
                    name="l_deskripsi" value="{{ old('l_deskripsi', $post->l_deskripsi) }}">
                @error('l_deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select  @error('category_id') is-invalid @enderror" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty"
                    value="{{ old('qty', $post->qty) }}">
                @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="loc" class="form-label">Loc</label>
                <input type="text" class="form-control @error('loc') is-invalid @enderror" id="loc" name="loc"
                    value="{{ old('loc', $post->loc) }}">
                @error('loc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ma" class="form-label">Max</label>
                <input type="text" class="form-control @error('ma') is-invalid @enderror" id="ma" name="ma"
                    value="{{ old('ma', $post->ma) }}">
                @error('ma')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rop" class="form-label">Rop</label>
                <input type="text" class="form-control @error('rop') is-invalid @enderror" id="rop" name="rop"
                    value="{{ old('rop', $post->rop) }}">
                @error('rop')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="mi" class="form-label">Min</label>
                <input type="text" class="form-control @error('mi') is-invalid @enderror" id="mi" name="mi"
                    value="{{ old('mi', $post->mi) }}">
                @error('mi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $post->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-4">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mb-5"><i class="bi bi-file-earmark-arrow-up"></i> Update
                Data</button>
        </form>
    </div>
@endsection
