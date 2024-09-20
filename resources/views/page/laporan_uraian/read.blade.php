<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Uraian {{ date('d-m-Y', strtotime(request('start_date', ''))) }} -
        {{ date('d-m-Y', strtotime(request('end_date', ''))) }}</title>
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
        // $date = date('l', strtotime(request('start_date', '')));
        // switch (strtolower($date)) {
        //     case 'sunday':
        //         $hari = 'MINGGU';
        //         break;
        //     case 'monday':
        //         $hari = 'SENIN';
        //         break;
        //     case 'tuesday':
        //         $hari = 'SELASA';
        //         break;
        //     case 'wednesday':
        //         $hari = 'RABU';
        //         break;
        //     case 'thursday':
        //         $hari = 'KAMIS';
        //         break;
        //     case 'friday':
        //         $hari = 'JUMAT';
        //         break;
        //     case 'saturday':
        //         $hari = 'SABTU';
        //         break;
        // }
    @endphp
    <div class="book">
        <div class="page" id="result">
            <div class="">
                <div class="flex items-center justify-center mt-2 text-[15px] font-bold">
                    LAPORAN PENDAPATAN
                </div>
                <div class="flex items-center justify-center text-[15px]">
                    <span class="font-bold">
                        {{ date('d-m-Y', strtotime(request('start_date', ''))) }} -
                        {{ date('d-m-Y', strtotime(request('end_date', ''))) }}</span>
                </div>
                <div class="flex items-center justify-center text-[15px] font-bold">
                    <span class="font-bold">
                        {{ \App\Models\KlasifikasiUraianPendapatan::where('id', request('uraian', ''))->select('uraian_pendapatan')->first()->uraian_pendapatan ?? 'Tidak ada kode laporan' }}
                    </span>
                </div>

                <div class="-ml-[30px] mr-[50px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-[5px]" rowspan="2">NO
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold" colspan="4">PENDAPATAN
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]" rowspan="2">
                                    KETERANGAN</th>
                            </tr>
                            <tr>
                                <th class="border border-1 border-black text-[10px] font-bold w-[50px]">TANGGAL FAKTUR
                                </th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">GROSS</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">RETUR</th>
                                <th class="border border-1 border-black text-[10px] font-bold w-[100px]">NETTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $gross = 0;
                                $retur = 0;
                                $netto = 0;
                            @endphp
                            @foreach ($pendapatan as $p)
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
                                        $tanggal = '';
                                    }

                                    $gross += $p->gross;
                                    $retur += $p->retur;
                                    $netto += $p->netto;
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[5px]">
                                        {{ $no++ }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[50px]">
                                        {{ $tanggal }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($p->gross, 0, ',', '.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($p->retur, 0, ',', '.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ number_format($p->netto, 0, ',', '.') }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $p->keterangan }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="border border-1 border-black font-bold">TOTAL</td>
                                <td class="border border-1 border-black font-bold">
                                    {{ number_format($gross, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black font-bold">
                                    {{ number_format($retur, 0, ',', '.') }}</td>
                                <td class="border border-1 border-black font-bold">
                                    {{ number_format($netto, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="page-break"></div>

            </div>
        </div>
    </div>

</body>

</html>
