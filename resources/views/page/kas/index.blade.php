<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-amber-300 p-4 flex justify-between">
                        <div>
                            TAMBAHAN KAS
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('tambahanKas.store') }}" method="post" class="px-3">
                            <div class="flex flex-col p-3 space-y-2">
                                @csrf
                                <div>
                                    <label for="tgl_kas" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                        Kas
                                    </label>
                                    <input type="date" id="tgl_kas" name="tgl_kas"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan tanggal kas disini...">
                                </div>
                                <div>
                                    <label for="kas" class="block mb-2 text-sm font-medium text-gray-900">Kas
                                        Tambahan
                                    </label>
                                    <input type="number" id="kas" name="kas"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan kas awal disini...">
                                </div>
                            </div>
                            <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="submit" id="formSourceButtonKas"
                                    onclick="changeFilterDataRegisterProgram()"
                                    class="bg-emerald-400 hover:bg-emerald-500 flex items-center gap-3 text-slate-100 px-4 py-2 rounded-md shadow-md text-sm font-semibold">Simpan</button>
                                <button type="button" onclick="sourceModalCloseKas(this)"
                                    data-modal-target="sourceModalKas"
                                    class="bg-red-600 hover:bg-red-700 flex items-center gap-3 text-slate-100 px-4 py-2 rounded-md shadow-md text-sm font-semibold">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-amber-300 p-4 flex justify-between">
                        <div>
                            DATA KAS
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
                                        KAS
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        TANGGAL
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($TambahanKas as $m)
                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $no++ }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ number_format($m->kas, 0, ',', '.') }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $m->tanggal_kas }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <button type="button" data-id="{{ $m->id }}"
                                                data-modal-target="sourceModal" data-kas="{{ $m->kas }}"
                                                data-tanggal_kas="{{ $m->tanggal_kas }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button
                                                onclick="return tambahanKasDelete('{{ $m->id }}','{{ $m->kas }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i
                                                    class="fas fa-trash"></i></button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $TambahanKas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">

                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">KAS</label>
                            <input type="text" id="kass" name="kas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Uraian Pendapatan disini..."
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div>
                            <label for="tgl_kas" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kas
                            </label>
                            <input type="date" id="tanggal_kass" name="tgl_kas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan tanggal kas disini...">
                        </div>

                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="changeSourceModal(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const kas = button.dataset.kas;
            const tanggal_kas = button.dataset.tanggal_kas;
            let url = "{{ route('tambahanKas.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Klasifikasi Pendapatan ${kas}`;
            document.getElementById('kass').value = kas;
            document.getElementById('tanggal_kass').value = tanggal_kas;
            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            status.classList.toggle('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const tambahanKasDelete = async (id) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Tambahan Kas ?`);
            if (tanya) {
                await axios.post(`/tambahanKas/${id}`, {
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
