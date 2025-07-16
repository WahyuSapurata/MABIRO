<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ArsipDokumen extends Model
{
    use HasFactory;

    protected $table = 'arsip_dokumens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'keterangan',
        'nama_file',
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
