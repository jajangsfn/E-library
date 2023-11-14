<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use Inertia\Inertia;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::latest()->get();

        return Inertia::render("Book/Index", [
            "books" => $books
        ]);
    }

    public function create()
    {
        return Inertia::render("Book/Create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "judul"   => "required",
            "pengarang" => "required",
            "tahun_terbit" => "required",
            "kategori" => "required",
            "deskripsi" => "required",
            "stok" => "required",
            "harga_denda" => "required",
            "gambar" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ], [
            "judul.required" => "Silahkan isi Judul",
            "pengarang.required" => "Silahkan isi Pengarang",
            "tahun_terbit" => "Silahkan isi Tahun Terbit",
            "kategori.required" => "Silahkan isi Kategori",
            "deskripsi.required" => "Silahkan isi Deskripsi",
            "stok.required" => "Silahkan isi Stok",
            "harga_denda.required" => "Silahkan isi Tarif Denda",
            "gambar.required" => "Silahkan pilih Gambar",
            "gambar.mimes" => "Format gambar yg didukung(jpeg/jpg,png,gif,svg",
            "gambar.max" => "Ukuran gambar melebihi batas maksimal (2MB)"
        ]);
        //upload image
        $gambar = $request->file("gambar");
        $gambar->storeAs("public/books", $gambar->hashName());

        //create post
        $book = Book::create([
            "judul"     => $request->judul,
            "pengarang"   => $request->pengarang,
            "tahun_terbit"   => $request->tahun_terbit,
            "kategori"   => $request->kategori,
            "deskripsi"   => $request->deskripsi,
            "stok"   => $request->stok,
            "harga_denda"   => $request->harga_denda,
            "gambar"   => $gambar->hashName(),
        ]);


        if ($book) {
            return Redirect::route("books.index")->with("message", "Data Berhasil Disimpan!");
        }
    }

    public function edit(Book $book)
    {
        return Inertia::render("Book/Edit", [
            "book" => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            "judul"   => "required",
            "pengarang" => "required",
            "tahun_terbit" => "required",
            "kategori" => "required",
            "deskripsi" => "required",
            "stok" => "required",
            "harga_denda" => "required"
        ], [
            "judul.required" => "Silahkan isi Judul",
            "pengarang.required" => "Silahkan isi Pengarang",
            "tahun_terbit" => "Silahkan isi Tahun Terbit",
            "kategori.required" => "Silahkan isi Kategori",
            "deskripsi.required" => "Silahkan isi Deskripsi",
            "stok.required" => "Silahkan isi Stok",
            "harga_denda.required" => "Silahkan isi Tarif Denda"
        ]);

        //check gambar

        if ($request->hasFile("gambar")) {
            //upload image
            $gambar = $request->file("gambar");
            $gambar->storeAs("public/books", $gambar->hashName());

            //delete old image
            File::delete(public_path("storage\\books\\". explode("/",$book->gambar)[5]));

            //create post
            $book->update([
                "judul"     => $request->judul,
                "pengarang"   => $request->pengarang,
                "tahun_terbit"   => $request->tahun_terbit,
                "kategori"   => $request->kategori,
                "deskripsi"   => $request->deskripsi,
                "stok"   => $request->stok,
                "harga_denda"   => $request->harga_denda,
                "gambar"   => $gambar->hashName(),
            ]);
        } else {
            //create post
            $book->update([
                "judul"     => $request->judul,
                "pengarang"   => $request->pengarang,
                "tahun_terbit"   => $request->tahun_terbit,
                "kategori"   => $request->kategori,
                "deskripsi"   => $request->deskripsi,
                "stok"   => $request->stok,
                "harga_denda"   => $request->harga_denda,
            ]);
        }



        if ($book) {
            return Redirect::route("books.index")->with("message", "Data Berhasil Diperbaharui!");
        }
    }

    public function destroy($id)
    {
        //find post by ID
        $book = Book::findOrfail($id);

        //delete old image
        if (File::exists(public_path("storage\\books\\".explode("/",$book->gambar)[5]))) {
            File::delete(public_path("storage\\books\\". explode("/",$book->gambar)[5]));
            //delete book
            $book->delete();

            if ($book) {
                return Redirect::route("books.index")->with("message", "Data Berhasil Dihapus!");
            }
        } else {
            return Redirect::route("books.index")->with("message", "File tidak ditemukan!");
        }
    }
}
