<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Anggota;
use Inertia\Inertia;
class AnggotaController extends Controller
{
    //
    public function index() {

        $anggota = Anggota::latest()->get();

        return Inertia::render('Anggota/Index',[
            'anggotas' => $anggota
        ]);
    }

    public function create() {
        return Inertia::render('Anggota/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'no_identitas' => 'required',
            'jenis_identitas' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required'
        ]);

        $anggota = Anggota::create([
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'jenis_identitas' => $request->jenis_identitas,
            'tgl_lahir' => $request->tgl_lahir,
            'jenkel' => $request->jenkel,
        ]);

        if ($anggota) {
            return Redirect::route('anggotas.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    public function edit(Anggota $anggota) {
        return Inertia::render('Anggota/Edit',[
            "anggota" => $anggota
        ]);
    }

    public function update(Request $request, Anggota $anggota) {
        $request->validate([
            'nama' => 'required',
            'no_identitas' => 'required',
            'jenis_identitas' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required'
        ], [
            "nama.required" => "Silahkan isi nama",
            "no_identitas.required" => "Silahkan isi Nomor Identitas",
            "jenis_identitas.required" => "Silahkan isi jenis identitas",
            "tgl_lahir.required" => "Silahkan isi tgl_lahir",
            "jenkel.required" => "Silahkan isi Jenis kelamin"
        ]);

        $anggota->update([
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'jenis_identitas' => $request->jenis_identitas,
            'tgl_lahir' => $request->tgl_lahir,
            'jenkel' => $request->jenkel,
        ]);

        if ($anggota) {
            return Redirect::route('anggotas.index')->with('message', 'Data Berhasil Diperbaharui!');
        }
    }

    public function destroy($id) {
        $anggota = Anggota::findOrfail($id);

        $anggota->delete();

        return Redirect::route('anggotas.index')->with('message', 'Data Berhasil Dihapus!');
    }


}
