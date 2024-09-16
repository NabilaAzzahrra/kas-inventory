<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPendapatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tpendapatan',
        'id_uraian_pendapatan',
        'id_pendapatan',
        'tanggal_pendapatan',
        'tanggal_faktur1',
        'tanggal_faktur2',
        'gross',
        'retur',
        'netto',
        'kurang_bayar',
        'lebih_bayar',
        'keterangan',
        'id_user'
    ];

    protected $table = 'transaksi_pendapatan';

    public function klasifikasiUraianPendapatan()
    {
        return $this->belongsTo(KlasifikasiUraianPendapatan::class, 'id_uraian_pendapatan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function pendapatan()
    {
        return $this->belongsTo(KlasifikasiPendapatan::class, 'id_pendapatan', 'id');
    }
}
