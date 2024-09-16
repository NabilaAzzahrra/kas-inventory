<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiUraianPendapatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian_pendapatan'
    ];

    protected $table = 'klasifikasi_uraian_pendapatan';

    public function transaksiPendapatan()
    {
        return $this->hasMany(TransaksiPendapatan::class, 'id_uraian_pendapatan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
