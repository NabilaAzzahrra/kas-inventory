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
                    <div class="bg-amber-300 p-4 rounded-full">
                        <div>
                            EDIT TRANSAKSI PENDAPATAN
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('transaksi_pendapatan.update', $TransaksiPendapatan->id) }}" method="post"
                            >
                            @csrf
                            @method('PATCH')
                            <div class="p-4 rounded-xl">
                                <div class="flex gap-5">
                                    <div class="flex gap-5 w-full">
                                        <div class="mb-5 w-full">
                                            <label for="klasifikasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klasifikasi
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="klasifikasi" name="klasifikasi"
                                                data-placeholder="Pilih Klasifikasi">

                                                <option value="{{ $TransaksiPendapatan->id_pendapatan }}">
                                                    {{ $TransaksiPendapatan->pendapatan->nama }}</option>
                                                @foreach ($klasifikasi_pendapatan as $m)
                                                    @if ($m->id != $TransaksiPendapatan->id_pendapatan)
                                                        <option value="{{ $m->id }}"
                                                            data-pendapatan="{{ $m->id_pendapatan }}">
                                                            {{ $m->nama }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            <span class="text-sm m-l text-red-500">{{ $errors->first('lantai') }}</span>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="klasifikasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Faktur
                                                <span class="text-red-500"></span>
                                            </label>

                                            <!-- Grouping the two date inputs -->
                                            <div class="flex space-x-4">
                                                <!-- Tanggal Faktur 1 -->
                                                <input type="date" id="tanggal_faktur1" name="tanggal_faktur1"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Uraian disini ..."
                                                    value="{{ $TransaksiPendapatan->tanggal_faktur1 }}" />

                                                <!-- Tanggal Faktur 2 -->
                                                <input type="date" id="tanggal_faktur2" name="tanggal_faktur2"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Uraian disini ..."
                                                    value="{{ $TransaksiPendapatan->tanggal_faktur2 }}" />
                                            </div>
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('lantai') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="tgl_pendapatan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Pendapatan</label>
                                            <input type="date" id="tgl_pendapatan" name="tgl_pendapatan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Uraian disini ..."
                                                value="{{ $TransaksiPendapatan->tanggal_pendapatan }}" required />
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="uraian"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Uraian <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="uraian" name="uraian" data-placeholder="Pilih Uraian">
                                                <option value="{{ $TransaksiPendapatan->id_uraian_pendapatan }}">
                                                    {{ $TransaksiPendapatan->klasifikasiUraianPendapatan->uraian_pendapatan }}
                                                </option>
                                                @foreach ($klasifikasi_uraian_pendapatan as $m)
                                                    @if ($m->id != $TransaksiPendapatan->id_uraian_pendapatan)
                                                        <option value="{{ $m->id }}"
                                                            data-uraian_pendapatan="{{ $m->id_uraian_pendapatan }}">
                                                            {{ $m->uraian_pendapatan }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('uraian') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="tagihan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal
                                            Pendapatan</label>
                                        <input type="text" id="tagihan" name="tagihan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nominal Pendapatan disini ..."
                                            value="{{ number_format($TransaksiPendapatan->gross, 0, ',', '.') }}"
                                            required />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="retur"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retur</label>
                                        <input type="text" id="retur" name="retur"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Retur disini ..." value="{{ number_format($TransaksiPendapatan->retur, 0, ',', '.') }}" />
                                    </div>
                                </div>
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="keterangan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Keterangan disini ..." value="{{ $TransaksiPendapatan->keterangan }}" required />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="penerimaan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerimaan</label>
                                        <input type="text" id="penerimaan" name="penerimaan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Penerimaan disini ..." value="{{ number_format($TransaksiPendapatan->netto, 0, ',', '.') }}" required />
                                    </div>
                                </div>
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="kekurangan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kekurangan</label>
                                        <input type="text" id="kekurangan" name="kekurangan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Kekurangan disini ..." value="{{ number_format($TransaksiPendapatan->kurang_bayar, 0, ',', '.') }}" />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="kelebihan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelebihan</label>
                                        <input type="text" id="kelebihan" name="kelebihan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Kelebihan disini ..." value="{{ number_format($TransaksiPendapatan->lebih_bayar, 0, ',', '.') }}" readonly />
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white bg-[#0C4B54] hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#uraian').select2({
                tags: true,
                placeholder: "Pilih Uraian",
                createTag: function(params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }
                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    };
                }
            });
        });

        // FORMAT CURRENCY
        const input = document.getElementById('tagihan');
        const input_retur = document.getElementById('retur');
        const input_penerimaan = document.getElementById('penerimaan');
        const input_kelebihan = document.getElementById('kelebihan');
        const input_kekurangan = document.getElementById('kekurangan');

        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });

        input_retur.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });

        input_penerimaan.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });

        input_kelebihan.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });

        input_kekurangan.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });

        // Fungsi format Rupiah
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);
        }

        // Fungsi untuk menghitung kelebihan dan kekurangan
        function calculate() {
            const tagihan = parseInt(document.getElementById('tagihan').value.replace(/\./g, '')) || 0;
            const retur = parseInt(document.getElementById('retur').value.replace(/\./g, '')) || 0;
            const penerimaan = parseInt(document.getElementById('penerimaan').value.replace(/\./g, '')) || 0;
            const klasifikasi = document.getElementById('klasifikasi').value; // Ambil nilai klasifikasi

            const tagihanSetelahRetur = tagihan - retur;

            const kelebihanInput = document.getElementById('kelebihan');
            const kekuranganInput = document.getElementById('kekurangan');

            // Jika klasifikasi id=1 atau id=2, kelebihan dan kekurangan tetap 0
            if (klasifikasi === '1' || klasifikasi === '2') {
                kelebihanInput.value = '0';
                kekuranganInput.value = '0';
                return; // Hentikan perhitungan lebih lanjut
            }

            // Logika untuk kelebihan dan kekurangan
            if (penerimaan > tagihanSetelahRetur) {
                kelebihanInput.value = formatRupiah(penerimaan - tagihanSetelahRetur);
                kekuranganInput.value = '0';
            } else if (penerimaan < tagihanSetelahRetur) {
                kekuranganInput.value = formatRupiah(tagihanSetelahRetur - penerimaan);
                kelebihanInput.value = '0';
            } else {
                kelebihanInput.value = '0';
                kekuranganInput.value = '0';
            }
        }

        // Menambahkan event listener ke input yang relevan
        document.getElementById('tagihan').addEventListener('input', calculate);
        document.getElementById('retur').addEventListener('input', calculate);
        document.getElementById('penerimaan').addEventListener('input', calculate);
        document.getElementById('klasifikasi').addEventListener('change', calculate);
    </script>
</x-app-layout>
