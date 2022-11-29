@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Barang</div>

                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="namaProduk" required
                                    value="{{ $barang->namaProduk }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" required
                                    value="{{ $barang->harga }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="descProduk" required
                                    value="{{ $barang->descProduk }}">
                            </div>
                            @if (Auth::user()->role == 'admin')
                                <div class="mb-3">
                                    <label class="form-label">Tampil</label>
                                    <select class="form-select" name="tampil">
                                        <option selected disabled>Pilih opsi</option>
                                        <option value="Ditampilkan" @selected($barang->tampil == 'Ditampilkan')>Ditampilkan</option>
                                        <option value="Tidak Ditampilkan" @selected($barang->tampil == 'Tidak Ditampilkan')>Tidak Ditampilkan
                                        </option>
                                    </select>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
