@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Detail Postingan</h2>
            <div class="col-12 text-center">
                <div class="card my-3 me-3" style="width: auto; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $postingan->judul }}</h5>
                        <p class="card-text">{{ $postingan->penulis }}</p>
                        <p class="card-text">{{ $postingan->isi }}</p>
                        <p class="card-text">{{ $postingan->tanggalDibuat }}</p>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
