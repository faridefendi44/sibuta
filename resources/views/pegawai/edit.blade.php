<title>Edit Data Pegawai</title>
@extends('layouts.master')
@section('content')

    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold text-center py-10">Edit Pegawai</h1>

                <form action="{{ route('pegawai.update', $pegawai->id)}}" method="POST" enctype="multipart/form-data"
                    class="lg:w-4/5 justify-center mx-auto space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nama Pegawai</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$pegawai->nama}}" id='test' autocomplete="off" type="text" name="nama"
                                placeholder="Nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>

                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Jabatan</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$pegawai->jabatan}}" id='test' autocomplete="off" type="text" name="jabatan"
                                placeholder="Jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>

                    <div class="">
                        <button class="bg-[#7D0A0A] text-white rounded-lg px-8 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
