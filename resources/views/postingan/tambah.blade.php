@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Postingan</div>

                    <div class="card-body">
                        <form action="{{ route('postingan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea name="isi" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggalDibuat" required>
                            </div>
                            @if (Auth::user()->role == 'admin')
                                <div class="mb-3">
                                    <label class="form-label">Tampil</label>
                                    <select class="form-select" name="tampil">
                                        <option selected disabled>Pilih opsi</option>
                                        <option value="Ditampilkan">Ditampilkan</option>
                                        <option value="Tidak Ditampilkan">Tidak Ditampilkan</option>
                                    </select>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select"name="kategori_id">
                                    <option selected>Pilih kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}">{{ $kt->namaKategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ Auth::user()->name }}"
                                    required readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
