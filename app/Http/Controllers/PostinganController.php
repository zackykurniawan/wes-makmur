<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan data postingan
        $data = Postingan::all();
        return view('postingan.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilan tambah data postingan
        $kategori = Kategori::all();
        return view('postingan.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambah data postingan
        Postingan::create($request->all());
        return redirect('postingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function show(Postingan $postingan)
    {
        //menampilkan halaman detail
        $kategori = Kategori::all();
        return view('postingan.detail', compact('postingan', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function edit(Postingan $postingan)
    {
        //tampilan edit data postingan
        $kategori = Kategori::all();
        return view('postingan.edit', compact('postingan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postingan $postingan)
    {
        //mengedit data kategori
        $postingan->update($request->all());
        return redirect('postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postingan $postingan)
    {
        //menghapus data kategori
        $postingan->delete();
        return redirect('postingan');
    }

    public function tampil()
    {
        //tampilan halaman beranda
        $data = Postingan::where('tampil', 'Ditampilkan')->get();
        return view('beranda', compact('data'));
    }
}
