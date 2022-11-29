<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan halaman rekomendasi
        return view('jamu.tampil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hitung umur
        $tahunSekarang = 2022;

        $result = new jamu($request->tahunLahir, $request->keluhan,);

        $data = [
            'nama' => $result->namaJamu(),
            'keluhan' => $request->keluhan,
            'khasiat' => $result->khasiat(),
            'umur' => $result->hitungUmur(),
            'saran' => $result->saran(),
            'saran2' => $result->saran2(),
        ];

        return view('jamu.tampil', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class hitung
{
    public function __construct($tahunLahir, $keluhan)
    {
        $this->tahunLahir = $tahunLahir;
        $this->keluhan = $keluhan;
    }

    public function khasiat()
    {
        return 'Bermanfaat untuk kesehatan anda';
    }
    
    public function namajamu()
    {
        if ($this->keluhan == 'Keseleo') {
            return 'Beras Kencur';
        } elseif ($this->keluhan == 'Kurang Nafsu') {
            return 'Beras Kencur';
        } elseif ($this->keluhan == 'Pegal-pegal') {
            return 'Kunyit Asam';
        } elseif ($this->keluhan == 'Darah Tinggi') {
            return 'Brotowali';
        } elseif ($this->keluhan == 'Gula Darah') {
            return 'Brotowali';
        } elseif ($this->keluhan == 'Kram Perut') {
            return 'Temulawak';
        } elseif ($this->keluhan == 'Masuk Angin') {
            return 'Temulawak';
        } else {
            return 'Tidak ada';
        }
    }

    public function hitungUmur()
    {
        $tahunSekarang = 2022;
        return $tahunSekarang - $this->tahunLahir;
    }
}

class jamu extends hitung
{
    public function saran()
    {
        if ($this->hitungUmur() <= 10) {
            return 'Dikonsumsi 1x';
        } else {
            return 'Dikonsumsi 2x';
        }
    }

    public function saran2()
    {
        if ($this->namaJamu() == 'Beras Kencur' && $this->keluhan = 'Keseleo') {
            return 'Dioleskan';
        } else {
            return 'Dikonsumsi';
        }
    }
}
