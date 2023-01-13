<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilLaut extends Model
{
    use HasFactory;
    protected $table = 'hasillaut';

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id');
    }
}
