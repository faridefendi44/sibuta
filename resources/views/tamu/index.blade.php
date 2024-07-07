@extends('layouts.master')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center mt-36 px-2 mx-auto ">
            <div class="bg-[#EAD196] lg:w-1/2  rounded-lg p-5 relative">
                <h1 class="text-lg font-semibold">Permohonan Bertamu</h1>
                <div class="h-1 w-1/2 bg-[#A98F03]"></div>
                <div class="lg:flex  py-5 items-center text-lg lg:space-x-5 justify-between">
                    <h1>
                        Atur Janji Tamu
                    </h1>
                    <button class="px-2 w-fit py-3 bg-[#ebca7d] rounded-lg toggleButton">
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
                    @guest
                        <div class="py-5">
                            <a href="{{ route('tamu.create') }} "
                                class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Klik disini atur janji
                                tamu
                            </a>
                        </div>
                    @else
                        <div class="py-5">
                            <a href="{{ route('tamu.data') }} "
                                class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">
                                Lihat Semua Data Pengajuan Janji Tamu
                            </a>
                        </div>
                    @endguest
                </div>
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
