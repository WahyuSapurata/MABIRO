<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DataPenghuni extends Model
{
    use HasFactory;

    protected $table = 'data_penghunis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_user',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'alamat',
        'universitas',
        'program_studi',
        'riwayat_pendidikan_sd',
        'riwayat_pendidikan_smp',
        'riwayat_pendidikan_sma',
        'no_hp',
        'alasan',
        'persetujuan',
        'kamar',
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
