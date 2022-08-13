@extends('dashboard.layouts.main')

@section('container')
    <div>
        <a href="/dashboard/users" class="btn btn-primary my-3"><span data-feather="arrow-left-circle"></span> Back Users</a>
    </div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 pb-2 border-bottom">
        <h1>Change Password</h1>
    </div>



    <div class="col-lg-5">
        <form method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" autofocus required
                    value="{{ old('name', $user->username) }}" disabled>

            </div>
            <div class="mb-3">
                <label for="current_password" class="form-label">Reset code</label>
                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                    name="current_password" autofocus value="{{ old('current_password') }}">
                @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                    name="new_password" value="{{ old('new_password') }}">
                @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
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
