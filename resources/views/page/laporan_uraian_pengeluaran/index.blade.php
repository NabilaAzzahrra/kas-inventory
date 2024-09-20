<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Harian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-amber-300 p-4 flex justify-between">
                        <div>
                            FILTER LAPORAN URAIAN PENGELUARAN
                        </div>
                    </div>
                    <div class="mt-6">
                        <form id="filterForm" action="{{ route('laporanUraianPengeluaran.create') }}" method="GET" target="_blank">
                            <input type="hidden" name="orientation" value="">
                            <div class="flex flex-col p-4 space-y-6">
                                <input type="text" id="akun" name="akun" value="{{ Auth::user()->name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div>
                                    <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900">Uraian
                                        Pengeluaran</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        id="uraian" name="uraian" data-placeholder="Pilih Uraian Pengeluaran">
                                        <option value="">Pilih...</option>
                                        @foreach ($klasifikasi_uraian_pengeluaran as $m)
                                            <option value="{{ $m->id }}">{{ $m->uraian_pengeluaran }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900">Dari
                                        Tanggal</label>
                                    <input type="date" id="from_date" name="start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900">Sampai
                                        Tanggal</label>
                                    <input type="date" id="to_date" name="end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="submit"
                                    class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                                <button type="reset" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                                    class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let tunaiCount = 1;

        function addTunaiInput() {
            tunaiCount++;
            const tunaiContainer = document.getElementById('tunai-container');

            const newLabel = document.createElement('label');
            newLabel.className = 'block mb-2 mt-2 text-sm font-medium text-gray-900';
            newLabel.textContent = `Tunai ${tunaiCount}`;

            const newInput = document.createElement('input');
            newInput.type = 'number';
            newInput.name = `tunai_${tunaiCount}`;
            newInput.className =
                'px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500';

            tunaiContainer.appendChild(newLabel);
            tunaiContainer.appendChild(newInput);
        }

        function removeTunaiInput() {
            if (tunaiCount > 1) {
                const tunaiContainer = document.getElementById('tunai-container');
                tunaiContainer.removeChild(tunaiContainer.lastElementChild); // Remove last input
                tunaiContainer.removeChild(tunaiContainer.lastElementChild); // Remove corresponding label
                tunaiCount--;
            }
        }
    </script>
</x-app-layout>
