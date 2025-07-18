<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class JadwalAgenda extends Model
{
    use HasFactory;

    protected $table = 'jadwal_agendas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_program',
        'jadwal_pelaksanaan',
        'foto_absen',
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
