@extends('layout.layout')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/pinjambarang">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Pinjam Barang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/kembalikanbarang">
                                    <svg class="bi">
                                        <use xlink:href="#cart" />
                                    </svg>
                                    kembalikan barang
                                </a>
                            </li>
                        </ul>


                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"> <i
                                            class="nav-link d-flex align-items-center gap-2">
                                            <svg class="bi">
                                                <use xlink:href="#door-closed" />
                                            </svg>
                                            Sign out
                                        </i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <h1 class="mb-5">Selamat datang kembali {{ auth()->user()->username }}!!!</h1>

                <h4>barang yang belum anda kembalikan</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">jumlah yang dipinjam</th>
                                <th scope="col">nama peminjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $transaksi)
                                @if ($transaksi->jenis_transaksi === 'pinjam' && $transaksi->user_id === auth()->user()->id)
                                    <tr>
                                        <td>{{ $transaksi->id }}</td>
                                        <td>{{ $transaksi->barang ? $transaksi->barang->nama : 'Barang tidak ditemukan' }}
                                        </td>
                                        <td>{{ $transaksi->jumlah }}</td>
                                        <td>{{ $transaksi->user ? $transaksi->user->username : 'User tidak ditemukan' }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection
