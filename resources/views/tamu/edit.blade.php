<title>Edit Data Permohonan Bertamu</title>
@extends('layouts.master')
@section('content')

    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold  py-10">
                    Edit Data Tamu
                </h1>
                <form action="{{ route('tamu.update', $tamu->id) }}" method="POST" enctype="multipart/form-data"
                    class="lg:w-4/5 justify-center mx-auto space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nama Tamu</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->nama}}" id='test'  autocomplete="off" type="text" name="nama"
                                placeholder="Select date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Asal Instansi</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->asal_instansi}}" id='test'  autocomplete="off" type="text" name="asal_instansi"
                                placeholder="Select date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Tanggal Bertamu</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->tanggal_bertamu}}"  autocomplete="off" type="date" name="tanggal_bertamu"
                                placeholder="Select date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Jam Bertamu</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->jam_bertamu}}" id='test'  autocomplete="off" type="text" name="jam_bertamu"
                                placeholder="Select date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Email</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->email}}" id='test'  autocomplete="off" type="text" name="email"
                                placeholder="Select date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nomor Whatsapp</label>
                        <div class="relative md:w-3/5 ">
                            <input value="{{$tamu->no_wa}}" id='test'  autocomplete="off" type="text" name="no_wa"
                                placeholder="Select date"
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
                                <option selected value="{{ $tamu->id }}">{{ $tamu->pegawai->nama}} - {{ $tamu->pegawai->jabatan}}
                                </option>
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
                            <input value="{{$tamu->keperluan}}" id='test'  autocomplete="off" type="text" name="keperluan"
                                placeholder="Select date"
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

    <script>
        $(document).ready(function() {
            const dt = new DataTransfer();
            $("#attachment").on('change', function(e) {
                $("#files-names").empty();

                for (let i = 0; i < this.files.length; i++) {
                    let fileBloc = $('<span/>', {
                        class: 'file-block'
                    });
                    let fileName = $('<span/>', {
                        class: 'name',
                        text: this.files.item(i).name
                    });
                    fileBloc.append('<span class="file-delete"><span>+</span></span>')
                        .append(fileName);
                    $("#filesList > #files-names").append(fileBloc);
                }
                dt.items.clear();
                for (let file of this.files) {
                    dt.items.add(file);
                }
                this.files = dt.files;
                $('span.file-delete').click(function() {
                    let name = $(this).next('span.name').text();
                    $(this).parent().remove();
                    for (let i = 0; i < dt.items.length; i++) {
                        if (name === dt.items[i].getAsFile().name) {
                            dt.items.remove(i);
                            break;
                        }
                    }
                    document.getElementById('attachment').files = dt.files;
                });
            });
        });
    </script>
@endsection
