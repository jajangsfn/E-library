<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "anggota";
    protected $fillable = [
        "no_identitas",
        "jenis_identitas",
        "nama",
        "tgl_lahir",
        "jenkel"
    ];
}
