<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;

    protected $table = 'absens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'user_id',
        'tanggal',
        'keterangan',
        'lokasi',
        'presensi_masuk',
        'presensi_keluar',
        'status_masuk',
        "status_keluar",

    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}

