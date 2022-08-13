@extends('layouts.log')

@section('container')
    <div class="container">
        <div class="d-flex justify-content-center text-center">
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show col-lg-7" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show col-lg-7" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-6 text-center" style="background-image: url('img/oriental-tiles.png');">

                <form action="/login" method="post">
                    @csrf
                    <h4 class="my-5 fw-bold" style="color:white">Spare parts warehouse cikande</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control w-50 @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" autofocus value="{{ old('username') }}" name="username"
                            placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control w-50" name="password" id="password"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary text-uppercase"> Login </button>

                </form>
                <small class="d-block text-center mt-3 text-white">Not registered ? <a href="/register"
                        style="color: salmon">Register Now</a></small>
            </div>
        </div>

    </div>
@endsection
