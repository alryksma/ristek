@extends('layout.layout')

@section('body')
    <div class="container mt-4">
        <h2>Cari barang</h2>
        <form action="cari-barang">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search.." name="search">
                <button class="btn btn-danger" type="submit">search </button>
            </div>
        </form>

        @if (isset($barang) && count($barang) > 0)
            <div class="container mt-4">
                <h2>Hasil pencarian</h2>
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
                            @foreach ($barang as $result)
                                <tr>
                                    <td>{{ $result->barang_id }}</td>
                                    <td>{{ $result->nama }}</td>
                                    <td>{{ $result->jumlah_barang }}</td>
                                    <td>{{ $result->jumlah_sisa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(isset($searchResults) && count($searchResults) == 0)
            <div class="container mt-4">
                <h2>Pencaharian tidak ada</h2>
            </div>
        @endif
    </div>
@endsection
