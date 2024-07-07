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
                <div class="lg:flex py-5 items-center text-lg lg:space-x-5 justify-between">
                    <h1>
                        Atur Janji Tamu
                    </h1>
                    <button class="px-2 py-3 bg-[#ebca7d] rounded-lg toggleButton">
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
                    <a href="/tamu" class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Klik disini atur janji
                        tamu</a>
                </div>
            </div>
            <div class="bg-[#EAD196] lg:w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Pengiriman Surat</h1>
                <div class="h-1 w-1/2 bg-[#A98F03]"></div>
                <div class="lg:flex py-5 items-center text-lg lg:space-x-5 justify-between">
                    <h1>
                        Kirim Surat Permohonan
                    </h1>
                    <button class="px-2 py-3 bg-[#ebca7d] rounded-lg toggleButton">
                        Selengkapnya
                    </button>
                </div>
                <div class="pl-10 text-justify hidden">
                    <p>
                        Mengirim surat permohonan kini lebih mudah dengan SIBUTA. Anda dapat mengirim surat elektronik
                        kepada pihak yang berkepentingan langsung melalui platform kami. Pihak yang berkepentingan akan
                        menerima notifikasi dan dapat mem-validasi surat Anda melalui WhatsApp atau email.
                    </p>
                </div>
                <div class="py-5">
                    <a href="/surat" class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Klik disini kirim surat
                        permohonan</a>
                </div>
            </div>
        </div>

        <div class="py-10 flex justify-end">
            <div class="bg-[#EAD196] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Lokasi Kantor</h1>
            </div>
        </div>
        <div class="">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.5506741832596!2d100.93846417377023!3d-0.6636574993298657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b2180cae23113%3A0xc500e464e6997b1!2sKejaksaan%20Negeri%20Sijunjung!5e0!3m2!1sid!2sid!4v1720125963967!5m2!1sid!2sid"
                class="w-full" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="pt-10 flex justify-start">
            <div class="bg-[#EAD196] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Contact Person</h1>
            </div>
        </div>
        <div class="flex lg:ml-10 pt-5 pb-20">
            <h1>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25 5H5C3.625 5 2.5125 6.125 2.5125 7.5L2.5 22.5C2.5 23.875 3.625 25 5 25H25C26.375 25 27.5 23.875 27.5 22.5V7.5C27.5 6.125 26.375 5 25 5ZM25 10L15 16.25L5 10V7.5L15 13.75L25 7.5V10Z"
                        fill="#A98F03" />
                </svg>

            </h1>
            <h1 class="text-sm w-fit">novitasaripalembang16@gmail.com</h1>

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
