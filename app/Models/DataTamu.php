<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DataTamu extends Model
{
    use HasFactory;

    protected $table = 'data_tamus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'nama_tamu',
        'alamat',
        'no_handphone',
        'tujuan',
        'kerabat',
        'tanggal_masuk',
        'tanggal_keluar',
        'identitas',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
