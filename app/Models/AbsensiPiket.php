<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class AbsensiPiket extends Model
{
    use HasFactory;

    protected $table = 'absensi_pikets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penghuni',
        'lokasi',
        'tanggal',
        'waktu',
        'status',
        'dokumentasi_foto',
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
