@extends('layouts.log')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <main class="form-registration">
                    <form action='/register' method='post'>
                        @csrf
                        {{-- <img class="mb-4" src="img/{{ $image }}" alt="On Proses" width="72" height="57"> --}}
                        
                        <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>

                        <div class="form-floating mb-1">
                            <input type="text" name="name" class="form-control rounded-top @error ('name') is-invalid @enderror" id="name"
                                placeholder="Name" value="{{ old('name') }}" autofocus>
                            <label for="name">Name</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" name="username" class="form-control @error ('username') is-invalid @enderror" id="username"
                                placeholder="username" value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="form-floating mb-1">
                            <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="email"
                                placeholder="email" value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="form-floating  mb-1">
                            <input type="password" name="password" class="form-control rounded-bottom @error ('password') is-invalid @enderror" id="password"
                                placeholder="password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" name="password_confirmation" class="form-control rounded-bottom @error ('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                placeholder="password_confirmation">
                            <label for="password_confirmation">Password Confirmation</label>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>

                    </form>
                    <small class="d-block text-center mt-2">allready registered ? <a href="/login" class="text-white">Login Now</a></small>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
