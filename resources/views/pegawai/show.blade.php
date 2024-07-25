<title>Detail Data Pegawai</title>
@extends('layouts.master')
@section('content')
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold  py-10">
                    Data Pegawai
                </h1>
                <div class="w-1/2 space-y-5 py-10">
                    <div class="grid md:grid-cols-2 justify-center gap-x-20 ">
                        <h1 class="font-semibold">Nama Pegawai</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pegawai->nama }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Jabatan</h1>
                        <h1 class="flex md:text-left "><span class="hidden md:block">:</span>
                            {{ $pegawai->jabatan }}
                        </h1>
                    </div>


                    <div class="mt-5 text-white font-semibold">
                        <a href="{{route('pegawai.index')}}" class="bg-[#A94438] px-8 py-3 rounded-lg">Close</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
