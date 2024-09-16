<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tpengeluaran',
        'id_uraian_pengeluaran',
        'pengeluaran',
        'tanggal_pengeluaran',
        'tanggal_faktur1',
        'tanggal_faktur2',
        'tagihan',
        'keterangan',
        'id_user'
    ];

    protected $table = 'transaksi_pengeluaran';

    public function klasifikasiUraianPengeluaran()
    {
        return $this->belongsTo(KlasifikasiUraianPengeluaran::class, 'id_uraian_pengeluaran', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
