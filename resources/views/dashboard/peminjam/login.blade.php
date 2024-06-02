@extends('layout.layout')
@section('body')
    <div class="d-flex align-items-center py-4 bg-body-tertiary">


        <main class="form-signin w-100 m-auto">
            <form action="/login" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">login peminjam</h1>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">login</button>
            </form>
            <small>sudah punya akun? register disini <a href="/register">register</a></small>
        </main>
        {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}

    </div>
@endsection
