<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kota = Kota::with('provinsi')->get();
        // return view('admin.kota.index',compact('kota'));

        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view('admin.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view('admin.kota.create' , compact('provinsi','kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|max:7|unique:kotas',
            'nama_kota' => 'required|unique:kotas'
        ], [
            'kode_kota.required' => 'Kode kota tidak boleh kosong',
            'kode_kota.max' => 'Kode maximal 7 karakter',
            'kode_kota.unique' => 'Kode kota sudah terdaftar',
            'nama_kota.required' => 'Nama kota tidak boleh kosong',
            'nama_kota.unique' => 'Nama kota sudah terdaftar'
        ]);
        
        $kota = new Kota();
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
                    ->with(['succes'=>'Data <b>',$kota->nama_kota,
                    '</b> berhasil di input']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show', compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('admin.kota.edit', compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kota' => 'required|max:7',
            'nama_kota' => 'required|unique:kotas'
        ], [
            'kode_kota.required' => 'Kode kota tidak boleh kosong',
            'kode_kota.max' => 'Kode maximal 7 karakter',
            'nama_kota.required' => 'Nama kota tidak boleh kosong',
            'nama_kota.unique' => 'Nama kota sudah terdaftar'
        ]);

        $kota = Kota::findOrFail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
                    ->with(['succes'=>'Data <b>',$kota->nama_kota,
                    '</b> berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')
                    ->with(['succes'=>'Data <b>',$kota->nama_kota,
                    '</b> berhasil di hapus']);
    }
}
