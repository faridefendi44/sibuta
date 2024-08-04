@extends('layouts.master')
@section('title', 'Detail Data Permohonan Surat')
@section('content')
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold  py-10">
                    Data Surat
                </h1>
                <div class="w-1/2 space-y-5 py-10">
                    <div class="grid md:grid-cols-2 justify-center gap-x-20 ">
                        <h1 class="font-semibold">Nama Pengirim</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->pengirim }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Email Pengirim</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->email }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Nomor WA Pengirim</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->no_wa }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Nomor Surat</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->no_surat }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Tanggal Surat</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->tanggal_surat }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Asal Surat</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->asal_surat }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Perihal</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->perihal }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Tanggal Masuk Surat</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ \Carbon\Carbon::parse($surat->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY HH:mm:ss') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Lampiran</h1>
                        <h1 class="flex"><span class="hidden md:block">:</span>
                            @foreach (explode(', ', $surat->lampiran) as $lampiran)
                                <a target="_blank" href="{{ $lampiran }}">{{ basename($lampiran) }}</a><br>
                            @endforeach
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Status</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->status }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center gap-x-20">
                        <h1 class="font-semibold">Catatan</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $surat->catatan }}
                        </h1>
                    </div>

                    <div class="mt-5 text-white font-semibold">
                        <a href="{{route('surat.data')}}" class="bg-[#A94438] px-8 py-3 rounded-lg">Close</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
