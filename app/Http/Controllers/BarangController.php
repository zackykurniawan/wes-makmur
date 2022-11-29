<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan data barang
        $data = Barang::all();
        return view('barang.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilan tambah data barang
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambah data artikel
        $data = $request->all();

        $data['foto'] = Storage::put('img', $request->file('foto'));

        Barang::create($data);

        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //tampilan edit data barang
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //mengedit data artikel

        $data = $request->all();
        try {
            // jika ada perubahan gambar
            $data['foto'] = Storage::put('img', $request->foto);
            $barang->update($data);
        } catch (\Throwable $th) {
            // jika tidak ada perubahan gambar
            $data['foto'] = $barang->foto;
            $barang->update($data);
        }

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //menghapus data artikel
        $barang->delete();
        return redirect('barang');
    }

    public function tampil()
    {
        //tampilan halaman beranda
        $data = Barang::where('tampil', 'Ditampilkan')->get();
        return view('beranda', compact('data'));
    }
}
