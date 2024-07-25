@extends('layouts.master')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10  px-2 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold text-center py-10">Silakan isi form dibawah ini untuk melakukan
                    pengiriman surat</h1>
                <form action="{{ route('tamu.store') }}" method="POST" class="lg:w-4/5 justify-center mx-auto space-y-6">
                    @csrf

                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nama Tamu</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="nama" placeholder="Nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Asal Instansi</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="asal_instansi"
                                placeholder="Asal Instansi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Tanggal Bertamu</label>
                        <div class="relative md:w-3/5 ">
                            <input  autocomplete="off" type="date" name="tanggal_bertamu"
                                placeholder="Pilih Tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Jam Bertamu</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="jam_bertamu"
                                placeholder="Jam Bertamu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Email</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="email" placeholder="Email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nomor Whatsapp</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="no_wa"
                                placeholder="628123456789"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center w-full">
                        <label for="">Tamu yang ingin ditemui</label>
                        <div class="md:w-3/5 ">
                            <select id="countries" name="target_tamu" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled>Pilih Tamu</option>
                                @foreach ($pegawai as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Keterangan Keperluan</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test' autocomplete="off" type="text" name="keperluan" placeholder="Keperluan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>

                    <div class="">
                        <button class="bg-[#7D0A0A] text-white rounded-lg px-8 py-2">Submit form janji bertamu</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>
        const datapicker = document.getElementById('test');
        new Datepicker(datapicker, {
            todayHighlight: true,
            minDate: new Date()
        }); <
        <
        script src = "https://unpkg.com/flowbite@1.5.3/dist/flowbite.js" >
    </script>
@endsection
