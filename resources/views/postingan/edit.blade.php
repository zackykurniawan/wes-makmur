@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Postingan</div>

                    <div class="card-body">
                        <form action="{{ route('postingan.update', $postingan->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" required
                                    value="{{ $postingan->judul }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea name="isi" class="form-control" required>{{ $postingan->isi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggalDibuat" required
                                    value="{{ $postingan->tanggalDibuat }}">
                            </div>
                            @if (Auth::user()->role == 'admin')
                                <div class="mb-3">
                                    <label class="form-label">Tampil</label>
                                    <select class="form-select" name="tampil">
                                        <option selected disabled>Pilih opsi</option>
                                        <option value="Ditampilkan" @selected($postingan->tampil == 'Ditampilkan')>Ditampilkan</option>
                                        <option value="Tidak Ditampilkan" @selected($postingan->tampil == 'Tidak Ditampilkan')>Tidak Ditampilkan</option>
                                    </select>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id">
                                    <option selected>Pilih kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}" @selected($postingan->kategori_id == $kt->id)>
                                            {{ $kt->namaKategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" required
                                    value="{{ $postingan->penulis }}" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
