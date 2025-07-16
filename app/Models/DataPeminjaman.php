<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DataPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'data_peminjamen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'penanggung_jawab',
        'barang',
        'nomor_telepon',
        'surat',
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
