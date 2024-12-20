<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryProduk()
    {
        return $this->belongsTo(CategoryProduk::class);
    }

    public function catatan_keluar()
    {
        return $this->hasMany(CatatanKeluar::class);
    }
}
