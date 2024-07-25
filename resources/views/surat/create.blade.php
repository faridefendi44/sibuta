<title>Tambah Data Permohonan Surat</title>
@extends('layouts.master')
@section('content')
    <style>
        .hidden {
            display: none;
        }

        #files-area {
            width: 100%;
            margin: 0 auto;
        }

        .file-block {
            border-radius: 10px;
            background-color: rgba(144, 163, 203, 0.2);
            margin: 5px;
            color: initial;
            display: inline-flex;

            &>span.name {
                padding-right: 10px;
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }

        .file-delete {
            display: flex;
            width: 24px;
            color: initial;
            background-color: #6eb4ff00;
            font-size: large;
            justify-content: center;
            margin-right: 3px;
            cursor: pointer;

            &:hover {
                background-color: rgba(144, 163, 203, 0.2);
                border-radius: 10px;
            }

            &>span {
                transform: rotate(45deg);
            }
        }
    </style>
    <div class="">
        <div class="lg:flex  lg:space-x-10 justify-center py-10 px-5 mx-auto ">

            <div class="bg-[#EAD196] lg:w-4/5  rounded-lg p-5">
                <h1 class="lg:text-xl font-semibold text-center py-10">Silakan isi form dibawah ini untuk melakukan
                    pengiriman surat</h1>

                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data"
                    class="lg:w-4/5 justify-center mx-auto space-y-6">
                    @csrf
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nama Pengirim</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="pengirim"
                                placeholder="Nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Email</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="email"
                                placeholder="Email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nomor Whatsapp</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="no_wa"
                                placeholder="628123456789"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Nomor Surat</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="no_surat"
                                placeholder="Nomor Surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Tanggal Surat</label>
                        <div class="relative md:w-3/5 ">
                            <input   autocomplete="off" type="date" name="tanggal_surat"
                                placeholder="Tanggal Surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Asal Surat</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="asal_surat"
                                placeholder="Asal Surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex  md:space-x-5  md:justify-between my-auto items-center md:w-full">
                        <label for="">Perihal Surat</label>
                        <div class="relative md:w-3/5 ">
                            <input id='test'  autocomplete="off" type="text" name="perihal"
                                placeholder="Perihal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <div class="md:flex pb-5  md:space-x-5  md:justify-between my-auto items-center w-full">
                        <label for="">Lampiran</label>
                        <div class="md:w-3/5 ">
                            <input name="lampiran[]" id="attachment"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" type="file"
                                accept="application/pdf,image/png,image/jpeg,image/jpg" multiple>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF
                            </p>
                            <p id="files-area" class="">
                                <span id="filesList">
                                    <span id="files-names"></span>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="">
                        <button class="bg-[#7D0A0A] text-white rounded-lg px-8 py-2">Submit form pengiriman surat</button>
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
    <script>
        const datapicker = document.getElementById('test');
        new Datepicker(datapicker, {
            todayHighlight: true,
            minDate: new Date()
        }); <
        <
        script src = "https://unpkg.com/flowbite@1.5.3/dist/flowbite.js" >
    </script>
@endsection
