@extends('dashboard.layouts.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 pb-2 border-bottom">
        <h1 class="h2">Import excel file</h1>
    </div>

    <a href="/dashboard/posts" class="btn btn-primary mb-4"><span data-feather="arrow-left-circle"></span>Back to
        All DB</a>

    <div class="col-sm-6">
        @if (Session::has('import_errors'))
            @foreach (Session::get('import_errors') as $failure)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $failure->errors()[0] }} at Line no: {{ $failure->row() }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    </div>

       <div class="col-lg-6">
        <form action="{{ route('import_data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group pt-3">
                <input type="file" class="form-control" name="excel_file" id="inputGroupFile04">
                <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload excel file</button>
            </div>
            <div class="row mb-3">
                @error('excel_file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </form>
    </div>
    <div class="row">
        <p class="fw-bold">Note: Format a file must be of type -> xlsx, xls, csv</p>
    </div>
@endsection
