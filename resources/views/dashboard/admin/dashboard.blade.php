@extends('layout.layout')

@section('body')
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.navkanan.navkanan')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <h2>Selamat datang administrator {{ auth()->user()->username }}</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">jumlah barang total</th>
                                <th scope="col">jumlah barang tersedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $b)
                                <tr>
                                    <td>{{ $b->barang_id }}</td>
                                    <td>{{ $b->nama }}</td>
                                    <td>{{ $b->jumlah_barang }}</td>
                                    <td>{{ $b->jumlah_sisa }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <h2>daftar peminjam</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">jumlah yang dipinjam</th>
                                <th scope="col">nama peminjam</th>
                                <th scope="col">tanggal pinjam</th>
                            </tr>
                            <tbody>
                                @foreach ($transaksi as $transaks)
                                    @if ($transaks->jenis_transaksi === 'pinjam') <!-- Filter hanya transaksi yang statusnya 'Dipinjam' -->
                                        <tr>
                                            <td>{{ $transaks->id }}</td>
                                            <td>{{ $transaks->barang->nama }}</td>
                                            <td>{{ $transaks->jumlah }}</td>
                                            <td>{{ $transaks->user->username }}</td>
                                            <td>{{ $transaks->tanggal_pinjam }}</td>
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
