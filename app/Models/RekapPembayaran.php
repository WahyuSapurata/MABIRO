<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class RekapPembayaran extends Model
{
    use HasFactory;

    protected $table = 'rekap_pembayarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penghuni',
        'metode_pembayaran',
        'bukti',
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
