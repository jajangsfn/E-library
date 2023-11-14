<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Peminjaman;
use App\Models\Book;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    //
    public function index()
    {
        $peminjaman = DB::select(DB::raw("SELECT books.judul,books.harga_denda,anggota.nama,peminjaman.id,peminjaman.qty,
        peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian, peminjaman.tgl_kembali,
       '' as status, peminjaman.denda  from peminjaman join books on peminjaman.id_buku=books.id
        join anggota on anggota.id=peminjaman.peminjam"));
        return Inertia::render("Peminjaman/Index", [
            "peminjaman" => $peminjaman
        ]);
    }

    public function create()
    {
        $book = Book::all();
        $peminjam = Anggota::all();
        return Inertia::render("Peminjaman/Create", [
            "books" => $book,
            "peminjam" => $peminjam
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "buku" => "required",
            "peminjam" => "required",
            "tgl_pinjam" => "required",
            "tgl_pengembalian" => "required",
            "qty" => "required"
        ], [
            "buku.required" => "Silahkan isi buku",
            "peminjam.required" => "Silahkan isi peminjam",
            "tgl_pinjam.required" => "Silahkan isi tgl pinjam",
            "tgl_pengembalian.required" => "Silahkan isi tgl pengembalian",
            "qty.required" => "Silahkan isi qty"
        ]);

        //update qty buku
        $buku = Book::findOrfail($request->buku);
        if ($buku) {
            $stok = $buku->stok - $request->qty;
            if ($stok >= 0) {
                $buku->update([
                    'stok' => $stok
                ]);

                $peminjaman = Peminjaman::create([
                    "id_buku" => $request->buku,
                    "peminjam" => $request->peminjam,
                    "tgl_peminjaman" => $request->tgl_pinjam,
                    "tgl_pengembalian" => $request->tgl_pengembalian,
                    "qty" => $request->qty
                ]);

                if ($peminjaman) {
                    return Redirect::route("peminjaman.index")->with("message", "Data Berhasil Disimpan!");
                }
            }else {
                return Redirect::route("peminjaman.index")->withErrors(["message_error" => "Stok Buku Habis!"]);
            }
        } else {
            return Redirect::route("peminjaman.index")->withErrors(["message_error" => "Stok Buku Habis!"]);
        }
    }

    public function edit(Peminjaman $peminjaman)
    {
        $book = Book::all();
        $peminjam = Anggota::all();
        return Inertia::render("Peminjaman/Edit", [
            "peminjaman" => $peminjaman,
            "books" => $book,
            "peminjam" => $peminjam
        ]);
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            "buku" => "required",
            "peminjam" => "required",
            "tgl_pinjam" => "required",
            "tgl_pengembalian" => "required",
            "qty" => "required"
        ], [
            "buku.required" => "Silahkan isi buku",
            "peminjam.required" => "Silahkan isi peminjam",
            "tgl_pinjam.required" => "Silahkan isi tgl pinjam",
            "tgl_pengembalian.required" => "Silahkan isi tgl pengembalian",
            "qty.required" => "Silahkan isi qty"
        ]);

        if ($request->type == null) {
            if ($peminjaman->qty != $request->qty) {
                $buku = Book::findOrfail($request->buku);
                if ($buku) {

                    $stok = $buku->stok - $request->qty;
                    if ($stok >= 0) {
                        $peminjaman->update([
                            "id_buku" => $request->buku,
                            "peminjam" => $request->peminjam,
                            "tgl_peminjaman" => $request->tgl_pinjam,
                            "tgl_pengembalian" => $request->tgl_pengembalian,
                            "qty" => $request->qty
                        ]);
                    } else {
                        return Redirect::route("peminjaman.index")->withErrors(["message_error" => "Stok Buku Habis!"]);
                    }
                }
            } else {
                $buku = Book::findOrfail($request->buku);
                if ($buku) {
                    $stok = $buku->stok - $request->qty;
                    if ($stok >= 0) {
                        $peminjaman->update([
                            "id_buku" => $request->buku,
                            "peminjam" => $request->peminjam,
                            "tgl_peminjaman" => $request->tgl_pinjam,
                            "tgl_pengembalian" => $request->tgl_pengembalian,
                            "qty" => $request->qty
                        ]);
                    } else {
                        return Redirect::route("peminjaman.index")->withErrors(["message_error" => "Stok Buku Habis!"]);
                    }
                }
                return Redirect::route("peminjaman.index")->with("message", "Data Berhasil Diperbaharui!");
            }
        } else {
            $peminjaman->update([
                "tgl_kembali" => $request->tgl_kembali,
                "denda" => $request->denda
            ]);
            return Redirect::route("peminjaman.index")->with("message", "Data Berhasil Diperbaharui!");
        }
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrfail($id);

        $peminjaman->delete();
        return Redirect::route("peminjaman.index")->with("message", "Data Berhasil Dihapus!");
    }

    public function show($id)
    {
        $peminjaman = DB::select(DB::raw("SELECT books.judul,books.harga_denda,anggota.nama,peminjaman.id,peminjaman.qty,
        peminjaman.id_buku, peminjaman.peminjam, peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian, peminjaman.tgl_kembali,
       '' as status, peminjaman.peminjam  from peminjaman join books on peminjaman.id_buku=books.id
        join anggota on anggota.id=peminjaman.peminjam
        WHERE peminjaman.id='" . $id . "'"));
        //$data = array();
        foreach ($peminjaman as $key => &$val) {
            $now = time(); // or your date as well
            $your_date = strtotime($val->tgl_pengembalian);
            $datediff = $now - $your_date;

            $diff = round($datediff / (60 * 60 * 24));
            $denda = 0;
            $val->status = 'Tepat Waktu';
            if ($diff > 0) {
                $denda = $diff * $val->harga_denda * $val->qty;
                $val->status = 'Telat';
            }

            $val->denda = $denda;
        }
        $data = $peminjaman[0];
        return Inertia::render('Peminjaman/View', [
            'peminjaman' => $data
        ]);
    }
}
