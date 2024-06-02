@extends('layout.layout')

@section('body')
    <div class="container mt-4">
        <h2>Pinjam Barang</h2>
        <form action="/pinjambarang" method="post">
            @csrf
            @method('POST') <!-- tambahkan baris ini -->
            <div class="mb-3">
                <label for="barang_id" class="form-label">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="form-control">
                    @foreach ($barang as $b)
                        <option value="{{ $b->barang_id }}">{{ $b->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Pinjam</button>
        </form>



        <h2 class="mt-5">Barang yang Sudah Dipinjam</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah yang Dipinjam</th>
                    <th>Nama Peminjam</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach ($transaksi as $transaksi)
                    @if ($transaksi->jenis_transaksi === 'pinjam' && $transaksi->user_id === auth()->user()->id)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->barang ? $transaksi->barang->nama : 'Barang tidak ditemukan' }}</td>
                            <td>{{ $transaksi->jumlah }}</td>
                            <td>{{ $transaksi->user ? $transaksi->user->username : 'User tidak ditemukan' }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            </tbody>

        </table>

    </div>
@endsection
