<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiUraianPengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'uraian_pengeluaran'
    ];

    protected $table = 'klasifikasi_uraian_pengeluaran';

    public function transaksiPengeluaran()
    {
        return $this->hasMany(TransaksiPengeluaran::class, 'id_uraian_pengeluaran');
    }
}
