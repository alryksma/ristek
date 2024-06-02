@extends('layout.layout')

@section('body')
    <div class="container mt-4">
        <h2>daftar barang</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">id barang</th>
                        <th scope="col">nama barang</th>
                        <th scope="col">jumlah total barang</th>
                        <th scope="col">jumlah sisa barang</th>
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
    </div>
@endsection
