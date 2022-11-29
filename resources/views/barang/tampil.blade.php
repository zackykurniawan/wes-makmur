@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Barang</div>

                    <div class="card-body">
                        <a href="{{ url('barang/create') }}" class="btn btn-primary">Tambah Barang</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tampil</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->namaProduk }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$item->foto) }}" alt="" width="100px">
                                        </td>
                                        <td>Rp. {{ $item->harga }}</td>
                                        <td>{{ $item->descProduk }}</td>
                                        <td>{{ $item->tampil }}</td>
                                        <td>
                                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('delbar/' . $item->id) }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection