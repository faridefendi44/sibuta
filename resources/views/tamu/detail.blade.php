@extends('layouts.master')
@section('content')
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold  py-10">
                    Data Tamu
                </h1>
                <div class="w-1/2 space-y-5 py-10">
                    <div class="grid md:grid-cols-2 justify-center gap-x-20 ">
                        <h1 class="font-semibold">Nama</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->nama }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Asal Instansi</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->asal_instansi }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Tanggal Bertamu</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->tanggal_bertamu }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Jam Bertamu</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->jam_bertamu }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Tamu yang ingin ditemui</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->target_tamu }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Keperluan</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->keperluan }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Email</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->email }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Nomor whatsapp</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->no_wa }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Status</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->status }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Catatan</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $tamu->catatan }}
                        </h1>
                    </div>

                    <div class="mt-5 text-white font-semibold">
                        <a href="{{route('tamu.data')}}" class="bg-[#A94438] px-8 py-3 rounded-lg">Close</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
