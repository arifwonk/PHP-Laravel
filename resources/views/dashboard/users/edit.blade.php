@extends('dashboard.layouts.main')

@section('container')
    <div>
        <a href="/dashboard/users" class="btn btn-primary my-3"><span data-feather="arrow-left-circle"></span> Back Users</a>
    </div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 pb-2 border-bottom">
        <h1>Edit User</h1>
    </div>



    <div class="col-lg-5">
        <form method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    autofocus required value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_admin" class="form-label">Is Admin</label>
                <select class="form-select  @error('is_admin') is-invalid @enderror" name="is_admin">
                    @if (old('is_admin', $user->is_admin) == 1)
                        <option value="1" checked>Yes</option>
                        <option value="0">No</option>
                    @else
                        <option value="0" checked>No</option>
                        <option value="1">Yes</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-success mb-5"><i class="bi bi-file-earmark-arrow-up"></i> Save
                Data</button>
        </form>
    </div>
@endsection
