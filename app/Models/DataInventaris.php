<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DataInventaris extends Model
{
    use HasFactory;

    protected $table = 'data_inventaris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'no_inventaris',
        'nama_barang',
        'jumlah',
        'satuan',
        'baik',
        'kurang_baik',
        'rusak',
        'keterangan',
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
