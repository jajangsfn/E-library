<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "judul",
        "pengarang",
        "penerbit",
        "tahun_terbit",
        "kategori",
        "deskripsi",
        "stok",
        "harga_denda",
        "gambar"
    ];

    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar) => asset('/storage/books/' . $gambar),
        );
    }
}
