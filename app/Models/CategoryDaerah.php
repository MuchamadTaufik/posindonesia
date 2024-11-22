<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDaerah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function catatan_keluar()
    {
        return $this->hasMany(CatatanKeluar::class);
    }
}
