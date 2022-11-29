@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Daftar Postingan</h2>
            @foreach ($data as $item)
                <div class="col-3 text-center">
                    <div class="card my-3 me-3" style="width: 18rem; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->penulis }}</p>
                            <p class="card-text">{{ $item->isi }}</p>
                            <p class="card-text">{{ $item->tanggalDibuat }}</p>
                            <a href="{{ route('postingan.show', $item->id) }}" class="btn btn-warning">Detail Postingan</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <br>
            <h2>Daftar Rekomendasi</h2>
            @foreach ($data as $produk)
                <div class="col-3 text-center">
                    <div class="card my-3 me-3" style="width: 18rem; height: auto;">
                        <img src="{{ asset('storage/' . $produk->foto) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->namaProduk }}</h5>
                            <p class="card-text">{{ $produk->harga }}</p>
                            <p class="card-text">{{ $produk->descProduk }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection


@section('footer')
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright: Wes Makmur
        </div>
    </footer>
@endsection
