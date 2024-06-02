@extends('layout.layout')

@section('body')
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.navkanan.navkanan')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


                <h2 class="mt-4">Form Hapus Barang</h2>
                <form method="post" action="/dashboard">
                    @method('DELETE')
                    @csrf
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" id="barang_id" name="barang_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Hapus Barang</button>
                </form>

                <h2 class="mt-4">daftar barang</h2>
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
