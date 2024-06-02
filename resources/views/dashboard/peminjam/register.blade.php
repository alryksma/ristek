@extends('layout.layout')
@section('body')
    <div class="d-flex align-items-center py-4 bg-body-tertiary">


        <main class="form-signin w-100 m-auto">
            <form action="/register" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please Register</h1>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        id="username" placeholder="name@example.com" required>
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="confirmPassword"
                        class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword"
                        placeholder="Password" required>
                    <label for="confirmPassword">confirm Password</label>
                    @error('confirmPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>
            <small>sudah punya akun? login disini <a href="/login">login</a></small>
        </main>


    </div>
@endsection
