<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiUraianPendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('klasifikasi_uraian_pendapatan')->insert([
            ['uraian_pendapatan' => 'MOBIL ROTI 1', 'created_at' => $now, 'updated_at' => $now],
            ['uraian_pendapatan' => 'MOBIL ROTI 2', 'created_at' => $now, 'updated_at' => $now],
            ['uraian_pendapatan' => 'MOBIL ROTI 3', 'created_at' => $now, 'updated_at' => $now],
            ['uraian_pendapatan' => 'MOBIL ROTI 4', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
