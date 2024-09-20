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
    <div class="book">
        <div class="page" id="result">
            <div class="">
                <div class="flex items-center justify-center mt-2 text-[15px] font-bold">
                    LAPORAN PENGELUARAN
                </div>
                <div class="flex items-center justify-center text-[15px]">
                    <span class="font-bold">
                        {{ date('d-m-Y', strtotime(request('start_date', ''))) }} -
                        {{ date('d-m-Y', strtotime(request('end_date', ''))) }}</span>
                </div>
                <div class="flex items-center justify-center text-[15px] font-bold">
                    <span class="font-bold">
                        {{ \App\Models\KlasifikasiUraianPengeluaran::where('id', request('uraian', ''))->select('uraian_pengeluaran')->first()->uraian_pengeluaran ?? 'Tidak ada kode laporan' }}
                    </span>
                </div>

                <div class="-ml-[30px] mr-[50px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">NO
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">
                                    TANGGAL FAKTUR</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" colspan="5">
                                    PENGELUARAN</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-10" rowspan="2">
                                    KETERANGAN</td>
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
                                $tagihan = 0;
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
                                    $tagihan += $p->tagihan;

                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal w-[100px]">
                                        {{ $no++ }}</td>
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
                                </tr>
                            @endforeach

                            <tr>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]" colspan="6">TOTAL</td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                    {{ number_format($tagihan, 0, ',', '.') }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-bold w-[100px]">
                                </td>
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
