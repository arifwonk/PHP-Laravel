@extends('layouts.log')


@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif

                  @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <main class="form-signin">
                    <form action="/login" method="post">
                        @csrf
                        {{-- <img class="mb-4" src="img/{{ $image }}" alt="On Proses" width="72" height="57"> --}}
                        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                        <div class="form-floating">
                            <input type="text" name="username" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="Username" autofocus value="{{ old('username') }}">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                    </form>
                    <small class="d-block text-center mt-2">Not registered? <a href="/register">Register Now</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection
