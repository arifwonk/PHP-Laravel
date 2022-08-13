@extends('dashboard.layouts.main')

@section('container')
    <div>
        <a href="/dashboard/users" class="btn btn-primary my-3"><span data-feather="arrow-left-circle"></span> Back Users</a>
    </div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 pb-2 border-bottom">
        <h1>Insert New User</h1>
    </div>



    <div class="col-lg-5">
        <form method="post" action="/dashboard/users" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    autofocus required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation"
                    value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="is_admin" class="form-label">Is Admin</label>
                <select class="form-select  @error('is_admin') is-invalid @enderror" name="is_admin">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                </select>
            </div> --}}
            <div class="form-check">
                <h6 class="form-check-label">Is Admin ?</h6>
                <input class="form-check-label" type="radio" name="is_admin" value="1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-label" type="radio" name="is_admin" value="0" id="flexRadioDefault2"
                    checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    No
                </label>
            </div>
            <button type="submit" class="btn btn-success mt-2 mb-5"><i class="bi bi-file-earmark-arrow-up"></i> Save
                Data</button>
        </form>
    </div>
@endsection
