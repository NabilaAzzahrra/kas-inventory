<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-amber-300 p-4 flex justify-between">
                        <div>
                            DATA TRANSAKSI PENDAPATAN
                        </div>
                        <div>
                            <a href="{{ route('transaksi_pendapatan.create') }}">TAMBAH TRANSAKSI</a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto sm:rounded-lg shadow-lg mt-6">

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        URAIAN
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        TANGGAL FAKTUR
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        TANGGAL PENDAPATAN
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        GROSS
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        RETUR
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        NETTO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        USER ACCOUNT
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($TransaksiPendapatan as $m)
                                    @php
                                        $tanggal1 = $m->tanggal_faktur1
                                            ? \Carbon\Carbon::parse($m->tanggal_faktur1)
                                            : null;
                                        $tanggal2 = $m->tanggal_faktur2
                                            ? \Carbon\Carbon::parse($m->tanggal_faktur2)
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
                                    @endphp
                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $no++ }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-wrap w-[300px]">
                                            {{ optional($m->klasifikasiUraianPendapatan)->uraian_pendapatan }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                            {{ $tanggal }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ date('d-m-Y', strtotime($m->tanggal_pendapatan)) }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right bg-gray-100">
                                            {{ number_format($m->gross, 0, ',', '.') }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right">
                                            {{ number_format($m->retur, 0, ',', '.') }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right bg-gray-100">
                                            {{ number_format($m->netto, 0, ',', '.') }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right">
                                            {{ optional($m->user)->name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 flex gap-2">
                                            <a href="{{ route('transaksi_pendapatan.edit', $m->id) }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="return TransaksiPendapatanDelete('{{ $m->id }}','{{ $m->klasifikasiUraianPendapatan->uraian_pendapatan }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i
                                                    class="fas fa-trash"></i></button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $TransaksiPendapatan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const TransaksiPendapatanDelete = async (id, uraian_pendapatan) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Transaksi Pendapatan ${uraian_pendapatan} ?`);
            if (tanya) {
                await axios.post(`/transaksi_pendapatan/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
