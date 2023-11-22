<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['idbuku', 'judul', 'penulis', 'tanggal_terbit', 'kategori'];
    protected $table = 'buku';
    public $timestamps = false;
}
