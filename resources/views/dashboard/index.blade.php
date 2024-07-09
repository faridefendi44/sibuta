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

        @guest
            <div class="py-5">

            </div>
        @else
            <div class="">
                <div class="py-10 flex justify-end">
                    <div class="bg-[#EAD196] w-full rounded-lg p-5">
                        <h1 class="text-lg font-semibold text-center">Grafik batang data tamu per bulan pada tahun ini </h1>
                    </div>
                </div>
                <div class="lg:w-3/4 flex mx-auto">
                    <button id="downloadPdfTamu" class="btn btn-primary bg-[#7D0A0A] text-white px-5 py-3 rounded-md">Download
                        PDF</button>
                </div>
                <div class="card-body flex w-3/4 mx-auto">
                    <canvas id="tamuBulanChart" width="400" height="200"></canvas>
                </div>
            </div>

            <div class="">
                <div class="py-10 flex justify-end">
                    <div class="bg-[#EAD196] w-full rounded-lg p-5">
                        <h1 class="text-lg font-semibold text-center">Grafik batang data tamu orang yang paling banyak
                            berkunjung pada bulan ini </h1>
                    </div>
                </div>
                <div class="container w-full px-20  mx-auto">
                    <form action="{{ route('dashboard.index') }}" class="flex space-x-10"  method="GET">
                        <!-- Form untuk filter bulan -->
                        <label for="month">Pilih Bulan:</label>
                        <select name="month" id="month">
                            @foreach ($months as $key => $month)
                                <option value="{{ $key }}" {{ $selectedMonth == $key ? 'selected' : '' }}>
                                    {{ $month }}</option>
                            @endforeach
                        </select>
                        <div class="flex space-x-5">
                            <button class="px-4 py-2 bg-blue-600" type="submit">Filter</button>
                            <div class="">
                                <button id="downloadPdfTarget" class="btn btn-primary bg-[#7D0A0A] text-white px-5 py-3 rounded-md">Download
                                    PDF</button>
                            </div>
                        </div>

                    </form>

                    <canvas id="tamuChart"></canvas>
                </div>
            </div>

            <div class="">
                <div class="py-10 flex justify-end">
                    <div class="bg-[#EAD196] w-full rounded-lg p-5">
                        <h1 class="text-lg font-semibold text-center">Grafik batang jumlah data surat masuk per bulan pada tahun
                            ini </h1>

                    </div>
                </div>
                <div class="lg:w-3/4 flex mx-auto">
                    <button id="downloadPdfSurat" class="btn btn-primary bg-[#7D0A0A] text-white px-5 py-3 rounded-md">Download
                        PDF</button>
                </div>

                <div class="card-body flex w-3/4 mx-auto">
                    <canvas id="suratChart" width="400" height="200"></canvas>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctxSurat = document.getElementById('suratChart').getContext('2d');
                    const suratData = @json($suratData); // Mengambil data surat dari controller

                    new Chart(ctxSurat, {
                        type: 'bar',
                        data: {
                            labels: @json(array_keys($suratData)), // Mengambil keys dari data surat (bulan)
                            datasets: [{
                                label: 'Jumlah Surat Masuk',
                                data: Object.values(suratData), // Mengambil values dari data surat (jumlah)
                                backgroundColor: `rgba(54, 162, 235, 0.5)`, // Warna latar belakang batang
                                borderColor: `rgba(54, 162, 235, 1)`, // Warna garis batang
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                    title: {
                                        display: true,
                                        text: 'Bulan'
                                    }
                                },
                                y: {
                                    stacked: true,
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Surat Masuk'
                                    }
                                }
                            }
                        }
                    });
                });
                document.getElementById('downloadPdfSurat').addEventListener('click', function() {
                    var canvas = document.getElementById('suratChart');
                    var imgData = canvas.toDataURL('image/png');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('saveChartImage') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.send(JSON.stringify({
                        image: imgData
                    }));

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            window.location.href = '{{ route('downloadPdfWithChart') }}';
                        }
                    };
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctxTamu = document.getElementById('tamuBulanChart').getContext('2d');
                    const tamuData = @json($tamuData); // Mengambil data surat dari controller

                    new Chart(ctxTamu, {
                        type: 'bar',
                        data: {
                            labels: @json(array_keys($tamuData)), // Mengambil keys dari data tamu (bulan)
                            datasets: [{
                                label: 'Jumlah Tamu Perbulan',
                                data: Object.values(tamuData), // Mengambil values dari data surat (jumlah)
                                backgroundColor: `rgba(54, 162, 235, 0.5)`, // Warna latar belakang batang
                                borderColor: `rgba(54, 162, 235, 1)`, // Warna garis batang
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                    title: {
                                        display: true,
                                        text: 'Bulan'
                                    }
                                },
                                y: {
                                    stacked: true,
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Tamu Per bulan'
                                    }
                                }
                            }
                        }
                    });
                });
                document.getElementById('downloadPdfTamu').addEventListener('click', function() {
                    var canvas = document.getElementById('tamuBulanChart');
                    var imgData = canvas.toDataURL('image/png');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('saveTamuChartImage') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.send(JSON.stringify({
                        image: imgData
                    }));

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            window.location.href = '{{ route('downloadTamuPdfWithChart') }}';
                        }
                    };
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('tamuChart').getContext('2d');
                    const chartData = @json($chartData);
                    const labels = Object.keys(chartData);
                    const data = Object.values(chartData);

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Tamu',
                                data: data,
                                backgroundColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.5)`
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true
                                },
                                y: {
                                    stacked: true,
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
                document.getElementById('downloadPdfTarget').addEventListener('click', function() {
                    var canvas = document.getElementById('tamuChart');
                    var imgData = canvas.toDataURL('image/png');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('saveTargetChartImage') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.send(JSON.stringify({
                        image: imgData
                    }));

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            window.location.href = '{{ route('downloadTargetPdfWithChart') }}';
                        }
                    };
                });
            </script>
        @endguest

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
                    <a href="/tamu" class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Klik disini
                        atur janji
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
                        menerima notifikasi dan dapat mem-validasi surat Anda melalui WhatsApp atau email. Dengan SIBUTA
                        Anda juga dapat mengirimkan surat secara online.
                    </p>
                </div>
                <div class="py-5">
                    <a href="/surat" class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">Klik disini
                        kirim surat
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
        <div class="lg:ml-10 pt-5 pb-20 space-y-3">
           
            <div class="flex items-center space-x-3">
                <h1>
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        stroke="#A98F03">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                fill="#A98F03"></path>
                            <path
                                d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                fill="#A98F03"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                fill="#A98F03"></path>
                        </g>
                    </svg>
                </h1>
                <a target="blank" href="https://www.instagram.com/kejari.sijunjung?igsh=MWdrMXE0YjJob3Y0cw==">
                    kejari.sijunjung
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <h1>
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.7828 3.91825C20.1313 3.83565 20.3743 3.75444 20.5734 3.66915C20.8524 3.54961 21.0837 3.40641 21.4492 3.16524C21.7563 2.96255 22.1499 2.9449 22.4739 3.11928C22.7979 3.29366 23 3.6319 23 3.99986C23 5.08079 22.8653 5.96673 22.5535 6.7464C22.2911 7.40221 21.9225 7.93487 21.4816 8.41968C21.2954 11.7828 20.3219 14.4239 18.8336 16.4248C17.291 18.4987 15.2386 19.8268 13.0751 20.5706C10.9179 21.3121 8.63863 21.4778 6.5967 21.2267C4.56816 20.9773 2.69304 20.3057 1.38605 19.2892C1.02813 19.0108 0.902313 18.5264 1.07951 18.109C1.25671 17.6916 1.69256 17.4457 2.14144 17.5099C3.42741 17.6936 4.6653 17.4012 5.6832 16.9832C5.48282 16.8742 5.29389 16.7562 5.11828 16.6346C4.19075 15.9925 3.4424 15.1208 3.10557 14.4471C2.96618 14.1684 2.96474 13.8405 3.10168 13.5606C3.17232 13.4161 3.27562 13.293 3.40104 13.1991C2.04677 12.0814 1.49999 10.5355 1.49999 9.49986C1.49999 9.19192 1.64187 8.90115 1.88459 8.71165C1.98665 8.63197 2.10175 8.57392 2.22308 8.53896C2.12174 8.24222 2.0431 7.94241 1.98316 7.65216C1.71739 6.3653 1.74098 4.91284 2.02985 3.75733C2.1287 3.36191 2.45764 3.06606 2.86129 3.00952C3.26493 2.95299 3.6625 3.14709 3.86618 3.50014C4.94369 5.36782 6.93116 6.50943 8.78086 7.18568C9.6505 7.50362 10.4559 7.70622 11.0596 7.83078C11.1899 6.61019 11.5307 5.6036 12.0538 4.80411C12.7439 3.74932 13.7064 3.12525 14.74 2.84698C16.5227 2.36708 18.5008 2.91382 19.7828 3.91825ZM10.7484 9.80845C10.0633 9.67087 9.12171 9.43976 8.09412 9.06408C6.7369 8.56789 5.16088 7.79418 3.84072 6.59571C3.86435 6.81625 3.89789 7.03492 3.94183 7.24766C4.16308 8.31899 4.5742 8.91899 4.94721 9.10549C5.40342 9.3336 5.61484 9.8685 5.43787 10.3469C5.19827 10.9946 4.56809 11.0477 3.99551 10.9046C4.45603 11.595 5.28377 12.2834 6.66439 12.5135C7.14057 12.5929 7.49208 13.0011 7.49986 13.4838C7.50765 13.9665 7.16949 14.3858 6.69611 14.4805L5.82565 14.6546C5.95881 14.7703 6.103 14.8838 6.2567 14.9902C6.95362 15.4727 7.65336 15.6808 8.25746 15.5298C8.70991 15.4167 9.18047 15.6313 9.39163 16.0472C9.60278 16.463 9.49846 16.9696 9.14018 17.2681C8.49626 17.8041 7.74425 18.2342 6.99057 18.5911C6.63675 18.7587 6.24134 18.9241 5.8119 19.0697C6.14218 19.1402 6.48586 19.198 6.84078 19.2417C8.61136 19.4594 10.5821 19.3126 12.4249 18.6792C14.2614 18.0479 15.9589 16.9385 17.2289 15.2312C18.497 13.5262 19.382 11.1667 19.5007 7.96291C19.51 7.71067 19.6144 7.47129 19.7929 7.29281C20.2425 6.84316 20.6141 6.32777 20.7969 5.7143C20.477 5.81403 20.1168 5.90035 19.6878 5.98237C19.3623 6.04459 19.0272 5.94156 18.7929 5.70727C18.0284 4.94274 16.5164 4.43998 15.2599 4.77822C14.6686 4.93741 14.1311 5.28203 13.7274 5.89906C13.3153 6.52904 13 7.51045 13 8.9999C13 9.28288 12.8801 9.5526 12.6701 9.74221C12.1721 10.1917 11.334 9.92603 10.7484 9.80845Z"
                                fill="#A98F03"></path>
                        </g>
                    </svg>
                </h1>
                <a target="blank" href="https://x.com/ksijunjung?s=11">
                    ksijunjung
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <h1>
                    <svg class="w-6 h-6" fill="#A98F03" height="200px" width="200px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="-143 145 512 512" xml:space="preserve" stroke="#A98F03">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M169.5,357.6l-2.9,38.3h-39.3 v133H77.7v-133H51.2v-38.3h26.5v-25.7c0-11.3,0.3-28.8,8.5-39.7c8.7-11.5,20.6-19.3,41.1-19.3c33.4,0,47.4,4.8,47.4,4.8l-6.6,39.2 c0,0-11-3.2-21.3-3.2c-10.3,0-19.5,3.7-19.5,14v29.9H169.5z">
                            </path>
                        </g>
                    </svg>
                </h1>
                <a target="blank" href="https://www.facebook.com/share/Rp71iw4LoS5X3ehe/?mibextid=LQQJ4d">
                    Kejaksaan Negeri Sijunjung
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <h1>
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.49614 7.13176C9.18664 6.9549 8.80639 6.95617 8.49807 7.13509C8.18976 7.31401 8 7.64353 8 8V16C8 16.3565 8.18976 16.686 8.49807 16.8649C8.80639 17.0438 9.18664 17.0451 9.49614 16.8682L16.4961 12.8682C16.8077 12.6902 17 12.3589 17 12C17 11.6411 16.8077 11.3098 16.4961 11.1318L9.49614 7.13176ZM13.9844 12L10 14.2768V9.72318L13.9844 12Z"
                                fill="#A98F03"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 12C0 8.25027 0 6.3754 0.954915 5.06107C1.26331 4.6366 1.6366 4.26331 2.06107 3.95491C3.3754 3 5.25027 3 9 3H15C18.7497 3 20.6246 3 21.9389 3.95491C22.3634 4.26331 22.7367 4.6366 23.0451 5.06107C24 6.3754 24 8.25027 24 12C24 15.7497 24 17.6246 23.0451 18.9389C22.7367 19.3634 22.3634 19.7367 21.9389 20.0451C20.6246 21 18.7497 21 15 21H9C5.25027 21 3.3754 21 2.06107 20.0451C1.6366 19.7367 1.26331 19.3634 0.954915 18.9389C0 17.6246 0 15.7497 0 12ZM9 5H15C16.9194 5 18.1983 5.00275 19.1673 5.10773C20.0989 5.20866 20.504 5.38448 20.7634 5.57295C21.018 5.75799 21.242 5.98196 21.4271 6.23664C21.6155 6.49605 21.7913 6.90113 21.8923 7.83269C21.9973 8.80167 22 10.0806 22 12C22 13.9194 21.9973 15.1983 21.8923 16.1673C21.7913 17.0989 21.6155 17.504 21.4271 17.7634C21.242 18.018 21.018 18.242 20.7634 18.4271C20.504 18.6155 20.0989 18.7913 19.1673 18.8923C18.1983 18.9973 16.9194 19 15 19H9C7.08058 19 5.80167 18.9973 4.83269 18.8923C3.90113 18.7913 3.49605 18.6155 3.23664 18.4271C2.98196 18.242 2.75799 18.018 2.57295 17.7634C2.38448 17.504 2.20866 17.0989 2.10773 16.1673C2.00275 15.1983 2 13.9194 2 12C2 10.0806 2.00275 8.80167 2.10773 7.83269C2.20866 6.90113 2.38448 6.49605 2.57295 6.23664C2.75799 5.98196 2.98196 5.75799 3.23664 5.57295C3.49605 5.38448 3.90113 5.20866 4.83269 5.10773C5.80167 5.00275 7.08058 5 9 5Z"
                                fill="#A98F03"></path>
                        </g>
                    </svg>
                </h1>
                <a target="blank" href="https://youtube.com/@kejaksaannegerisijunjung730?si=y_8U5vpK03KgyrWd">
                    Kejaksaan Negeri Sijunjung
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <h1>
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        stroke="#A98F03">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#A98F03"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <rect x="3" y="5" width="18" height="14" rx="2" stroke="#A98F03"
                                stroke-width="2" stroke-linecap="round"></rect>
                        </g>
                    </svg>
                </h1>
                <a target="blank" href="mailto:kejari.sijunjung@kejaksaan.go.id">
                    kejari.sijunjung@kejaksaan.go.id
                </a>
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
