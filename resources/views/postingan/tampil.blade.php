@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Postingan</div>

                    <div class="card-body">
                        <a href="{{ url('postingan/create') }}" class="btn btn-primary">Tambah Postingan</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tampil</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->tanggalDibuat }}</td>
                                        <td>{{ $item->tampil }}</td>
                                        <td>{{ $item->kategori->namaKategori }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td>
                                            <a href="{{ route('postingan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('delpos/' . $item->id) }}" class="btn btn-danger">Hapus</a>
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