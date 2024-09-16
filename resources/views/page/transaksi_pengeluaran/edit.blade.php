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
                            EDIT TRANSAKSI PENGELUARAN
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('transaksi_pengeluaran.update', $TransaksiPengeluaran->id) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <div class="p-4 rounded-xl">
                                <div class="flex gap-5">
                                    <div class="flex gap-5 w-full">
                                        <div class="mb-5 w-full">
                                            <label for="klasifikasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klasifikasi
                                                Pengeluaran
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="klasifikasi" name="klasifikasi"
                                                data-placeholder="Pilih Klasifikasi Pengeluaran">
                                                <option value="">Pilih...</option>
                                                <option value="UMUM"
                                                    {{ old('klasifikasi', $TransaksiPengeluaran->pengeluaran ?? '') == 'UMUM' ? 'selected' : '' }}>
                                                    UMUM</option>
                                                <option value="OPERASIONAL"
                                                    {{ old('klasifikasi', $TransaksiPengeluaran->pengeluaran  ?? '') == 'OPERASIONAL' ? 'selected' : '' }}>
                                                    OPERASIONAL</option>
                                                <option value="BAHAN"
                                                    {{ old('klasifikasi', $TransaksiPengeluaran->pengeluaran  ?? '') == 'BAHAN' ? 'selected' : '' }}>
                                                    BAHAN</option>
                                                <option value="PRIVE"
                                                    {{ old('klasifikasi', $TransaksiPengeluaran->pengeluaran  ?? '') == 'PRIVE' ? 'selected' : '' }}>
                                                    PRIVE</option>
                                            </select>
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('klasifikasi') }}</span>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="klasifikasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Faktur
                                                <span class="text-red-500"></span>
                                            </label>

                                            <div class="flex space-x-4">
                                                <!-- Tanggal Faktur 1 -->
                                                <input type="date" id="tanggal_faktur1" name="tanggal_faktur1"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Uraian disini ..." value="{{ $TransaksiPengeluaran->tanggal_faktur1 }}" />

                                                <!-- Tanggal Faktur 2 -->
                                                <input type="date" id="tanggal_faktur2" name="tanggal_faktur2"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Uraian disini ..." value="{{ $TransaksiPengeluaran->tanggal_faktur2 }}" />
                                            </div>
                                            <span class="text-sm m-l text-red-500">{{ $errors->first('lantai') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="tgl_pengeluaran"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Pengeluaran</label>
                                            <input type="date" id="tgl_pengeluaran" name="tgl_pengeluaran"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Uraian disini ..." value="{{ $TransaksiPengeluaran->tanggal_pengeluaran }}" required />
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="uraian"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="uraian" name="uraian" data-placeholder="Pilih Uraian">

                                                <option value="{{ $TransaksiPengeluaran->id_uraian_pengeluaran }}">
                                                    {{ $TransaksiPengeluaran->klasifikasiUraianPengeluaran->uraian_pengeluaran }}
                                                </option>
                                                @foreach ($klasifikasi_uraian_pengeluaran as $m)
                                                    @if ($m->id != $TransaksiPengeluaran->id_uraian_pengeluaran)
                                                        <option value="{{ $m->id }}"
                                                            data-uraian_pengeluaran="{{ $m->id_uraian_pengeluaran }}">
                                                            {{ $m->uraian_pengeluaran }}</option>
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
                                        <label for="keterangan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Keterangan disini ..." value="{{ $TransaksiPengeluaran->keterangan }}" required />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="pengeluaran"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal
                                            Pengeluaran</label>
                                        <input type="text" id="pengeluaran" name="pengeluaran"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Pengeluaran disini ..." value="{{ number_format($TransaksiPengeluaran->tagihan, 0, ',', '.') }}" required />
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
        const pengeluaran = document.getElementById('pengeluaran');

        pengeluaran.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = formattedValue;
        });
    </script>
</x-app-layout>
