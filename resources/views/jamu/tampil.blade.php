@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Masukkan Keluhan</div>

                    <div class="card-body">
                        <form action="{{ route('jamu.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Keluhan</label>
                                <select class="form-select" name="keluhan" required>
                                    <option selected disabled>Pilih keluhan</option>
                                    <option value="Keseleo">Keseleo</option>
                                    <option value="Kurang Nafsu">Kurang Nafsu</option>
                                    <option value="Pegal-pegal">Pegal-pegal</option>
                                    <option value="Darah Tinggi">Darah Tinggi</option>
                                    <option value="Gula Darah">Gula Darah</option>
                                    <option value="Kram Perut">Kram Perut</option>
                                    <option value="Masuk Angin">Masuk Angin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun lahir</label>
                                <input type="number" class="form-control" name="tahunLahir" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="/jamu" type="button" class="btn btn-success">Refresh</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Rekomendasi Jamu</div>

                    <div class="card-body">
                        <form action="" method="">
                            @isset($data)
                                <div class="mb-3">
                                    <label class="form-label">Nama Jamu</label>
                                    <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Khasiat</label>
                                    <input type="text" class="form-control" value="{{ $data['khasiat'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keluhan</label>
                                    <input type="text" class="form-control" value="{{ $data['keluhan'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Umur</label>
                                    <input type="number" class="form-control" value="{{ $data['umur'] }}" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label">Saran Penggunaan</label>
                                    <input type="text" class="form-control" value="{{ $data['saran'] }}" readonly>
                                    <input type="text" class="form-control mt-1" value="{{ $data['saran2'] }}" readonly>
                                </div>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
