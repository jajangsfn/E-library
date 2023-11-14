<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $fillable = [
        "id_buku",
        "peminjam",
        "qty",
        "tgl_peminjaman",
        "tgl_pengembalian",
        "tgl_kembali",
        "denda"
    ];
}
