<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';

    protected $guarded = [];

    public function hasillaut()
    {
        return $this->belongsTo(HasilLaut::class, 'hasillaut_id');
    }
}
