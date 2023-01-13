<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    protected $guarded = [];

    public function hasillaut()
    {
        return $this->belongsTo(HasilLaut::class, 'hasillaut_id');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id');
    }
}
