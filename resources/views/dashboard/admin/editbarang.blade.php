@extends('layout.layout')

@section('body')
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.navkanan.navkanan')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <h2 class="mt-4">Form Edit Barang</h2>
                <form method="post" action="/editbarang">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Pilih ID Barang</label>
                        <select class="form-select" id="barang_id" name="barang_id" required>
                            <option value="">Pilih ID Barang</option>
                            @foreach ($barang as $ba)
                                <option value="{{ $ba->barang_id }}">{{ $ba->barang_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang Baru</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang Baru</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Edit Barang</button>
                </form>


                <h2 class="mt-4">Utama</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang Total</th>
                                <th scope="col">Jumlah Barang Tersedia</th>
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


            </main>
        </div>
    </div>
@endsection
