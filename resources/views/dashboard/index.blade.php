@extends('layouts.master')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="">
        <div>
            <h1 class="font-bold text-center text-2xl">Selamat Datang di SIBUTA Kejaksaan Negeri Sijunjung</h1>
        </div>
        <div class="py-10 flex justify-end">
            <div class="bg-[#EAD196]  w-3/4 rounded-lg p-5">
                <h1 class="text-lg font-semibold">SIBUTA - Sistem Informasi Buku Tamu</h1>
                <p class="lg:pr-10">
                    SIBUTA adalah platform yang dirancang untuk memudahkan proses permohonan bertamu dan pengiriman surat
                    kepada pihak yang bersangkutan. Dengan SIBUTA, Anda dapat dengan mudah mengatur janji tamu dan mengirim
                    surat permohonan secara efisien dan terorganisir.
                </p>
            </div>
        </div>
        <div class="py-10 flex justify-end">
            <div class="bg-[#EAD196] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Layanan Kami</h1>
            </div>
        </div>


        <div class="lg:flex lg:space-x-10 lg:w-3/4 px-5 mx-auto space-y-10 lg:space-y-0">
            <div class="bg-[#EAD196] lg:w-1/2 rounded-lg p-5 relative">
                <h1 class="text-lg font-semibold">Permohonan Bertamu</h1>
                <div class="h-1 w-1/2 bg-[#A98F03]"></div>
                <div class="flex py-5 items-center text-lg space-x-5 justify-between">
                    <h1>
                        Atur Janji Tamu
                    </h1>
                    <button class="px-8 py-3 bg-[#ebca7d] rounded-lg toggleButton">
                        Selengkapnya
                    </button>
                </div>
                <div class="pl-10 text-justify hidden">
                    <p>
                        Dengan SIBUTA, Anda dapat membuat janji bertamu secara online. Cukup isi formulir yang tersedia dan
                        tentukan waktu kunjungan Anda. Pihak yang berkepentingan akan menerima notifikasi dan dapat
                        mengonfirmasi janji temu Anda melalui WhatsApp atau email.
                    </p>
                </div>
                <div class="py-5">
                    <button class="bg-[#7D0A0A] text-white rounded-lg mx-auto flex px-5 py-2">Klik disini atur janji
                        tamu</button>
                </div>
            </div>
            <div class="bg-[#EAD196] lg:w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Pengiriman Surat</h1>
                <div class="h-1 w-1/2 bg-[#A98F03]"></div>
                <div class="flex py-5 items-center text-lg space-x-5 justify-between">
                    <h1>
                        Kirim Surat Permohonan
                    </h1>
                    <button class="px-8 py-3 bg-[#ebca7d] rounded-lg toggleButton">
                        Selengkapnya
                    </button>
                </div>
                <div class="pl-10 text-justify hidden">
                    <p>
                        Dengan SIBUTA, Anda dapat membuat janji bertamu secara online. Cukup isi formulir yang tersedia dan
                        tentukan waktu kunjungan Anda. Pihak yang berkepentingan akan menerima notifikasi dan dapat
                        mengonfirmasi janji temu Anda melalui WhatsApp atau email.
                    </p>
                </div>
                <div class="py-5">
                    <button class="bg-[#7D0A0A] text-white rounded-lg mx-auto flex px-5 py-2">Klik disini kirim surat
                        permohonan</button>
                </div>
            </div>
        </div>

        <div class="py-10 flex justify-end">
            <div class="bg-[#EAD196] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Lokasi Kantor</h1>
            </div>
        </div>
        <div class="">

        </div>

        <div class="py-10 flex justify-start">
            <div class="bg-[#EAD196] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Contact Person</h1>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('.toggleButton');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var description = this.closest('div').nextElementSibling;
                    if (description.classList.contains('hidden')) {
                        description.classList.remove('hidden');
                    } else {
                        description.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
