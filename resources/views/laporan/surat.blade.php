@extends('layouts.master')
@section('content')
    <div class="lg:w-[90%] px-2 mt-10  mx-auto space-y-10">

        <form method="GET" action="{{ route('laporanSurat.index') }}">
            <label for="start_date">Mulai Tanggal:</label>
            <input type="date" id="start_date" name="start_date">

            <label for="end_date">Sampai Tanggal:</label>
            <input type="date" id="end_date" name="end_date">

            <button class="bg-[#EAD196] py-2 px-5">Filter</button>
            <a href="{{route('suratDownload.index')}}">Print</a>
        </form>
        <div class="">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pengirim
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Asal Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No. Telepon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Perihal Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lampiran
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="">Tanda Tangan</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($surats as $data)
                            <tr class="bg-[#D9D9D9] border-b    ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->pengirim }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->asal_surat }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->no_wa }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->perihal }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach (explode(', ', $data->lampiran) as $lampiran)
                                        <a target="_blank" href="{{ $lampiran }}">{{ basename($lampiran) }}</a><br>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-right">

                                </td>
                            </tr>
                            <div id="popup-approve-{{ $data->id }}" tabindex="-1" aria-labelledby="modal-title"
                                role="dialog" aria-modal="true" id="interestModal"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-approve-{{ $data->id }}">
                                            <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda
                                                yakin ingin menyetujui
                                                surat ini?</h3>
                                            <form action="{{ route('surat.approve', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button data-modal-hide="popup-modal" type="submit"
                                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Setujui
                                                </button>
                                                <button data-modal-hide="popup-approve-{{ $data->id }}" type="button"
                                                    class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="popup-reject-{{ $data->id }}" tabindex="-1" aria-labelledby="modal-title"
                                role="dialog" aria-modal="true" id="interestReject"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-reject-{{ $data->id }}">
                                            <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                                Anda yakin ingin
                                                menolak surat ini? </h3>
                                            <form action="{{ route('surat.reject', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="catatan">
                                                <button data-modal-hide="popup-modal" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Tolak
                                                </button>
                                                <button data-modal-hide="popup-reject-{{ $data->id }}" type="button"
                                                    class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="popup-delete-{{ $data->id }}" tabindex="-1" aria-labelledby="modal-title"
                                role="dialog" aria-modal="true" id="interestDelete"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-delete-{{ $data->id }}">
                                            <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                                Anda yakin ingin
                                                menghapus surat ini? </h3>
                                            <form action="{{ route('surat.delete', $data->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Hapus
                                                </button>
                                                <button data-modal-hide="popup-delete-{{ $data->id }}" type="button"
                                                    class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#approve').on('click', function(e) {
                $('#overlay, #interestModal').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e) {
                $('#overlay, #interestModal').addClass('hidden');
            });
        });
        $(document).ready(function() {
            $('#reject').on('click', function(e) {
                $('#overlay, #interestReject').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e) {
                $('#overlay, #interestReject').addClass('hidden');
            });
        });
        $(document).ready(function() {
            $('#delete').on('click', function(e) {
                $('#overlay, #interestDelete').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e) {
                $('#overlay, #interestDelete').addClass('hidden');
            });
        });
    </script>
@endsection
