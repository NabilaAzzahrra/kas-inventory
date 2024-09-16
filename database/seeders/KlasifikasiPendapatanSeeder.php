<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiPendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('klasifikasi_pendapatan')->insert([
            ['nama' => 'SALDO', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'PENERIMAAN', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'UMUM', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'TUNAI', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'KREDIT', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
