<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiPendapatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];

    protected $table = 'klasifikasi_pendapatan';

    public function transaksiPendapatan()
    {
        return $this->belongsTo(TransaksiPendapatan::class, 'id_pendapatan', 'id');
    }
}
