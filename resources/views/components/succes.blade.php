@extends('layouts.master')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="h-screen">
        <div class="lg:flex  lg:space-x-10 justify-center mt-36 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-1/2 rounded-lg p-5">

                <div class=" text-center py-5">
                    <p>
                        Terimakasih, permintaan Anda telah terkirim dan akan dilakukan konfirmasi kepada pihak yang berkait.
                        Untuk informasi lebih lanjut silahkan check email atau whatsapp Anda secara berkala.
                    </p>
                </div>
                <div class="py-5">
                    <a href="/dashboard"
                        class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Oke</a>
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
