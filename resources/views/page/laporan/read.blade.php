<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian {{ date('d-m-Y', strtotime(request('start_date', ''))) }}</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 335mm;
            /* Adjusted for Legal portrait height */
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        .kp {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .logo {
            text-align: center;
            font-size: small;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .cntr {
            font-size: small;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }

        .translation {
            display: block;
            font-size: small;
            margin-top: -9px;
            font-style: italic;
        }

        table {
            border-collapse: collapse;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 10px;
        }

        .ini {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: small;
            padding: 0;
        }

        .ttd {
            text-align: left;
            font-size: small;
            padding: 0px;
            margin-top: -10px;
            font-style: italic;
        }

        .ttd1 {
            text-align: left;
            font-size: small;
            padding: 0px;
        }

        .left {
            padding-left: 10px;
        }

        .footer {
            background: #204b8c;
            color: #fff;
            text-align: center;
            font-size: small;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ket {
            margin-left: 290px;
        }

        body {
            font-family: 'Tahoma';
        }

        .tengah {
            text-align: center;
        }

        .page {
            width: 215.9mm;
            /* Adjusted for Legal portrait width */
            min-height: 355.6mm;
            /* Adjusted for Legal portrait height */
            padding: 0mm;
            margin: 0mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .page::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 794px;
            height: 49px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @page {
            size: 215.9mm 355.6mm;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 215.9mm;
                height: 355.6mm;
            }

            .page {
                padding: 0mm;
                margin: 0mm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .page::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                position: absolute;
                bottom: 0;
                right: 0;
                width: 794px;
                height: 49px;
                background-size: cover;
                background-repeat: no-repeat;
            }
        }
    </style>
    <style>
        .page-break {
            page-break-before: always;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @php
        $date = date('l', strtotime(request('start_date', '')));
        switch (strtolower($date)) {
            case 'sunday':
                $hari = 'MINGGU';
                break;
            case 'monday':
                $hari = 'SENIN';
                break;
            case 'tuesday':
                $hari = 'SELASA';
                break;
            case 'wednesday':
                $hari = 'RABU';
                break;
            case 'thursday':
                $hari = 'KAMIS';
                break;
            case 'friday':
                $hari = 'JUMAT';
                break;
            case 'saturday':
                $hari = 'SABTU';
                break;
        }
    @endphp
    <div class="book">
        <div class="page" id="result">
            <div class="">
                <div class="flex items-center justify-center mt-2 text-[15px] font-bold">
                    LAPORAN PENDAPATAN DAN PENGELUARAN
                </div>
                <div class="flex items-center justify-center text-[15px]">
                    <span class="font-bold"> {{ $hari }},
                        {{ date('d-m-Y', strtotime(request('start_date', ''))) }}</span>
                </div>
                <div class="flex items-center justify-center text-[15px] font-bold">
                    <span class=""> Kode Laporan:
                        {{ \App\Models\KodeLaporan::where('tanggal', request('start_date', ''))->select('kode')->first()->kode ?? 'Tidak ada kode laporan' }}</span>
                </div>

                <div class="-ml-[30px] mr-[50px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">NO
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[300px]" rowspan="2">
                                    URAIAN</th>
                                <th class="border border-1 border-black text-[10px] font-bold" colspan="4">PENDAPATAN
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]" rowspan="2">
                                    LEBIH BAYAR</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]" rowspan="2">
                                    KURANG BAYAR</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]" rowspan="2">
                                    KETERANGAN</th>
                            </tr>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">TANGGAL FKTUR
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">GROSS</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">RETUR</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">NETTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $netto_pendapatan_saldo = 0;
                            @endphp
                            @foreach ($pendapatan_saldo as $ps)
                                @php
                                    $netto_pendapatan_saldo = $ps->netto;
                                @endphp
                            @endforeach
                            <tr>
                                <td
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] bg-slate-400 text-white">
                                    I</td>
                                <td
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-[5px] bg-slate-400 text-white">
                                    SALDO</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($netto_pendapatan_saldo, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                            </tr>

                            @php
                                $netto_pendapatan_penerimaan = 0;
                            @endphp
                            @foreach ($pendapatan_penerimaan as $pp)
                                @php
                                    $netto_pendapatan_penerimaan = $pp->netto;
                                @endphp
                            @endforeach
                            <tr>
                                <td
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] bg-slate-400 text-white">
                                    II</td>
                                <td
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-[5px] bg-slate-400 text-white">
                                    PENERIMAAN</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($netto_pendapatan_penerimaan, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                            </tr>


                            @php
                                $netto_saldo_penerimaan = $netto_pendapatan_saldo + $netto_pendapatan_penerimaan;
                            @endphp
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-normal w-[100px]"
                                    colspan="5"></th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($netto_saldo_penerimaan, 0, ',', '.') ?? 0 }}</th>
                            </tr>

                            @php
                                $no = 1;
                                $pu_gross = 0;
                                $pu_retur = 0;
                                $pu_netto = 0;
                                $pu_lebih_bayar = 0;
                                $pu_kurang_bayar = 0;
                            @endphp
                            @foreach ($pendapatan_umum as $pu)
                                @php
                                    $tanggal1 = $pu->tanggal_faktur1
                                        ? \Carbon\Carbon::parse($pu->tanggal_faktur1)
                                        : null;
                                    $tanggal2 = $pu->tanggal_faktur2
                                        ? \Carbon\Carbon::parse($pu->tanggal_faktur2)
                                        : null;

                                    // Jika salah satu tanggal null, tampilkan yang ada saja
                                    if ($tanggal1 && !$tanggal2) {
                                        $tanggal = $tanggal1->format('d/m/Y');
                                    } elseif (!$tanggal1 && $tanggal2) {
                                        $tanggal = $tanggal2->format('d/m/Y');
                                    } elseif ($tanggal1 && $tanggal2) {
                                        // Jika bulan dan tahun sama, gabungkan hari
                                        $tanggal =
                                            $tanggal1->format('mY') == $tanggal2->format('mY')
                                                ? $tanggal1->format('d') .
                                                    '-' .
                                                    $tanggal2->format('d') .
                                                    '/' .
                                                    $tanggal1->format('m/Y')
                                                : $tanggal1->format('d/m/Y') . ' - ' . $tanggal2->format('d/m/Y');
                                    } else {
                                        // Jika keduanya null
                                        $tanggal = '';
                                    }

                                    $pu_gross += $pu->gross;
                                    $pu_retur += $pu->retur;
                                    $pu_netto += $pu->netto;
                                    $pu_lebih_bayar += $pu->lebih_bayar;
                                    $pu_kurang_bayar += $pu->kurang_bayar;
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $no++ }}</td>
                                    <td
                                        class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                        {{ $pu->klasifikasiUraianPendapatan->uraian_pendapatan }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $tanggal }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pu->gross, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pu->retur, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pu->netto, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pu->lebih_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pu->kurang_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $pu->keterangan }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] bg-slate-400 text-white">
                                    III</th>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-[5px] bg-slate-400 text-white">
                                    PENJUALAN TUNAI
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-[5px]" colspan="7"></th>
                            </tr>
                            @php
                                $no = 1;
                                $pt_gross = 0;
                                $pt_retur = 0;
                                $pt_netto = 0;
                                $pt_lebih_bayar = 0;
                                $pt_kurang_bayar = 0;
                            @endphp
                            @foreach ($pendapatan_tunai as $pt)
                                @php
                                    $tanggal1 = $pt->tanggal_faktur1
                                        ? \Carbon\Carbon::parse($pt->tanggal_faktur1)
                                        : null;
                                    $tanggal2 = $pt->tanggal_faktur2
                                        ? \Carbon\Carbon::parse($pt->tanggal_faktur2)
                                        : null;

                                    // Jika salah satu tanggal null, tampilkan yang ada saja
                                    if ($tanggal1 && !$tanggal2) {
                                        $tanggal = $tanggal1->format('d/m/Y');
                                    } elseif (!$tanggal1 && $tanggal2) {
                                        $tanggal = $tanggal2->format('d/m/Y');
                                    } elseif ($tanggal1 && $tanggal2) {
                                        // Jika bulan dan tahun sama, gabungkan hari
                                        $tanggal =
                                            $tanggal1->format('mY') == $tanggal2->format('mY')
                                                ? $tanggal1->format('d') .
                                                    '-' .
                                                    $tanggal2->format('d') .
                                                    '/' .
                                                    $tanggal1->format('m/Y')
                                                : $tanggal1->format('d/m/Y') . ' - ' . $tanggal2->format('d/m/Y');
                                    } else {
                                        // Jika keduanya null
                                        $tanggal = 'Tanggal tidak tersedia';
                                    }

                                    $pt_gross += $pt->gross;
                                    $pt_retur += $pt->retur;
                                    $pt_netto += $pt->netto;
                                    $pt_lebih_bayar += $pt->lebih_bayar;
                                    $pt_kurang_bayar += $pt->kurang_bayar;
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $no++ }}</td>
                                    <td
                                        class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                        {{ $pt->klasifikasiUraianPendapatan->uraian_pendapatan }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $tanggal }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pt->gross, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pt->retur, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pt->netto, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pt->lebih_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pt->kurang_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $pt->keterangan }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] bg-slate-400 text-white">
                                    IV</th>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-[5px] bg-slate-400 text-white">
                                    PENJUALAN KREDIT
                                </th>
                            </tr>
                            @php
                                $no = 1;
                                $pk_gross = 0;
                                $pk_retur = 0;
                                $pk_netto = 0;
                                $pk_lebih_bayar = 0;
                                $pk_kurang_bayar = 0;
                            @endphp
                            @foreach ($pendapatan_kredit as $pk)
                                @php
                                    $tanggal1 = $pk->tanggal_faktur1
                                        ? \Carbon\Carbon::parse($pk->tanggal_faktur1)
                                        : null;
                                    $tanggal2 = $pk->tanggal_faktur2
                                        ? \Carbon\Carbon::parse($pk->tanggal_faktur2)
                                        : null;

                                    // Jika salah satu tanggal null, tampilkan yang ada saja
                                    if ($tanggal1 && !$tanggal2) {
                                        $tanggal = $tanggal1->format('d/m/Y');
                                    } elseif (!$tanggal1 && $tanggal2) {
                                        $tanggal = $tanggal2->format('d/m/Y');
                                    } elseif ($tanggal1 && $tanggal2) {
                                        // Jika bulan dan tahun sama, gabungkan hari
                                        $tanggal =
                                            $tanggal1->format('mY') == $tanggal2->format('mY')
                                                ? $tanggal1->format('d') .
                                                    '-' .
                                                    $tanggal2->format('d') .
                                                    '/' .
                                                    $tanggal1->format('m/Y')
                                                : $tanggal1->format('d/m/Y') . ' - ' . $tanggal2->format('d/m/Y');
                                    } else {
                                        // Jika keduanya null
                                        $tanggal = 'Tanggal tidak tersedia';
                                    }

                                    $pk_gross += $pk->gross;
                                    $pk_retur += $pk->retur;
                                    $pk_netto += $pk->netto;
                                    $pk_lebih_bayar += $pk->lebih_bayar;
                                    $pk_kurang_bayar += $pk->kurang_bayar;
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $no++ }}</td>
                                    <td
                                        class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                        {{ $pk->klasifikasiUraianPendapatan->uraian_pendapatan }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $tanggal }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pk->gross, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pk->retur, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pk->netto, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pk->lebih_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($pk->kurang_bayar, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $pk->keterangan }}</td>
                                </tr>
                            @endforeach

                            @php
                                $jumlah_gross = 0;
                                $jumlah_retur = 0;
                                $jumlah_netto = 0;
                                $jumlah_kurang_bayar = 0;
                                $jumlah_lebih_bayar = 0;
                            @endphp
                            <tr>
                                @php
                                    $jumlah_gross = $pu_gross + $pt_gross + $pk_gross;
                                    $jumlah_retur = $pu_retur + $pt_retur + $pk_retur;
                                    $jumlah_netto = $pu_netto + $pt_netto + $pk_netto;
                                    $jumlah_kurang_bayar = $pu_kurang_bayar + $pt_kurang_bayar + $pk_kurang_bayar;
                                    $jumlah_lebih_bayar = $pu_lebih_bayar + $pt_lebih_bayar + $pk_lebih_bayar;
                                @endphp
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td
                                    class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_gross, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_retur, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_netto, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_lebih_bayar, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_kurang_bayar, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                </td>
                            </tr>

                            @php
                                $jumlah_pendapatan = 0;
                            @endphp
                            <tr>
                                @php
                                    $jumlah_pendapatan =
                                        $jumlah_netto + $netto_pendapatan_saldo + $netto_pendapatan_penerimaan;
                                @endphp
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]" colspan="5">
                                    TOTAL PENDAPATAN
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_pendapatan, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="page-break"></div>

                <div class="-ml-[30px] mr-[50px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">NO
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[300px]"
                                    rowspan="2">URAIAN</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">
                                    TANGGAL FAKTUR</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" colspan="5">
                                    PENGELUARAN</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">
                                    KETERANGAN</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">
                                    PENDAPATAN BERSIH</td>
                            </tr>
                            <tr>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">UMUM</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">OPERASIONAL
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">BAHAN</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">PRIVE</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">TOTAL</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $umum = 0;
                                $operasional = 0;
                                $bahan = 0;
                                $prive = 0;
                                $total_pengeluaran = 0;
                                $pendapatan_bersih = 0;
                            @endphp
                            @foreach ($pengeluaran as $p)
                                @php
                                    $tanggal1 = $p->tanggal_faktur1 ? \Carbon\Carbon::parse($p->tanggal_faktur1) : null;
                                    $tanggal2 = $p->tanggal_faktur2 ? \Carbon\Carbon::parse($p->tanggal_faktur2) : null;

                                    // Jika salah satu tanggal null, tampilkan yang ada saja
                                    if ($tanggal1 && !$tanggal2) {
                                        $tanggal = $tanggal1->format('d/m/Y');
                                    } elseif (!$tanggal1 && $tanggal2) {
                                        $tanggal = $tanggal2->format('d/m/Y');
                                    } elseif ($tanggal1 && $tanggal2) {
                                        // Jika bulan dan tahun sama, gabungkan hari
                                        $tanggal =
                                            $tanggal1->format('mY') == $tanggal2->format('mY')
                                                ? $tanggal1->format('d') .
                                                    '-' .
                                                    $tanggal2->format('d') .
                                                    '/' .
                                                    $tanggal1->format('m/Y')
                                                : $tanggal1->format('d/m/Y') . ' - ' . $tanggal2->format('d/m/Y');
                                    } else {
                                        // Jika keduanya null
                                        $tanggal = 'Tanggal tidak tersedia';
                                    }

                                    $umum = $pengeluaran->where('pengeluaran', 'UMUM')->sum('tagihan');
                                    $operasional = $pengeluaran->where('pengeluaran', 'OPERASIONAL')->sum('tagihan');
                                    $bahan = $pengeluaran->where('pengeluaran', 'BAHAN')->sum('tagihan');
                                    $prive = $pengeluaran->where('pengeluaran', 'PRIVE')->sum('tagihan');

                                    $total_pengeluaran += $p->tagihan;
                                    $pendapatan_bersih = $jumlah_pendapatan - $total_pengeluaran;
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $no++ }}</td>
                                    <td
                                        class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                        {{ $p->klasifikasiUraianPengeluaran->uraian_pengeluaran }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $tanggal }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format(optional($pengeluaran->where('pengeluaran', 'UMUM')->where('id', $p->id)->first())->tagihan ?? 0,0,',','.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format(optional($pengeluaran->where('pengeluaran', 'OPERASIONAL')->where('id', $p->id)->first())->tagihan ?? 0,0,',','.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format(optional($pengeluaran->where('pengeluaran', 'BAHAN')->where('id', $p->id)->first())->tagihan ?? 0,0,',','.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format(optional($pengeluaran->where('pengeluaran', 'PRIVE')->where('id', $p->id)->first())->tagihan ?? 0,0,',','.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($p->tagihan, 0, ',', '.') }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $p->keterangan }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                </tr>
                            @endforeach

                            <tr>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td
                                    class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($umum, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($operasional, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($bahan, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                    {{ number_format($prive, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                            </tr>

                            <tr>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td
                                    class="border border-1 border-black text-[10px] font-normal w-[100px] text-left pl-[5px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($total_pengeluaran, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal w-[100px]"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_pendapatan - $total_pengeluaran, 0, ',', '.') }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="-ml-[30px] mr-[50px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">PEMBAYARAN DENGAN
                                    BANK</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">JATUH TEMPO</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">NO CHECK/BG</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">NAMA DEPOT</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">NILAI TERTERA</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10">UANG TUNAI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-1 border-black text-[10px] font-bold w-10"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10"></td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4">
                                    {{ number_format($jumlah_pendapatan - $total_pengeluaran, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            @php
                                $tunaiCount = count(request()->all());
                            @endphp
                            @for ($i = 1; $i <= $tunaiCount; $i++)
                                @php
                                    $tunaiKey = 'tunai_' . $i;
                                @endphp
                                @if (request()->has($tunaiKey))
                                    <tr>
                                        <th class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4"
                                            colspan="5">TUNAI {{ $i }}</th>
                                        <th
                                            class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4">
                                            {{ number_format(request($tunaiKey), 0, ',', '.') }}</th>
                                    </tr>
                                @endif
                            @endfor

                            @if ($tunaiCount == 1)
                                @php
                                    $tunai2 = $jumlah_pendapatan - $total_pengeluaran - request('tunai_1');
                                @endphp
                                <tr>
                                    <th class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4"
                                        colspan="5">TUNAI 2</th>
                                    <th
                                        class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4">
                                        {{ number_format($tunai2, 0, ',', '.') }}</th>
                                </tr>
                            @endif
                            @php
                                $tunai2 = $jumlah_pendapatan - $total_pengeluaran - request('tunai_1');
                            @endphp
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4"
                                    colspan="5">TUNAI 2</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-10 text-right pr-4">
                                    {{ number_format($tunai2, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="left-0 right-0 text-center text-sm font-bold flex justify-center">
                    <table class="border border-1 border-black w-[400px]">
                        <thead>
                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-2">
                                    SALDO AWAL</th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($NettoSebelumnya, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[10px]"
                                    rowspan="2">+</td>
                            </tr>
                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-2">
                                    TAMBAHAN KAS</th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($kas, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]"></th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($NettoSebelumnya + $kas, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[10px]"
                                    rowspan="2">+</td>
                            </tr>
                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-2">
                                    SALES INCOME</th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_pendapatan - $total_pengeluaran, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]"></th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_pendapatan - $total_pengeluaran + ($NettoSebelumnya + $kas), 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[10px]"
                                    rowspan="2">-</td>
                            </tr>
                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-2">
                                    PENGELUARAN</th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($total_pengeluaran, 0, ',', ',') }}</td>
                            </tr>
                            <tr>
                                <th
                                    class="border border-1 border-black text-[10px] font-bold w-[100px] text-left pl-2">
                                    SALDO AKHIR</th>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($jumlah_pendapatan - $total_pengeluaran + ($NettoSebelumnya + $kas) - $total_pengeluaran, 0, ',', '.') }}
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
