@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <label data-lang-ms="Masukkan Nama" data-lang-en="Enter Name">
                Masukkan Nama
            </label>

            <div class="row mt-3">
                <div class="col-4">
                    <button onclick="switchLanguage('en')">English</button>
                    <button onclick="switchLanguage('ms')">Bahasa Malaysia</button>

                </div>
            </div>
            <script>
                function switchLanguage(lang) {
                    document.querySelectorAll('label').forEach(label => {
                        const translatedText = label.getAttribute('data-lang-' + lang);
                        if (translatedText) {
                            label.textContent = translatedText;
                        }
                    });
                }
            </script>
            <div class='card' style="display: none">
                <div class='card-body'>
                    <form method='POST' action='/portal/file/upload' enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="upload">Upload</label>
                                <input type='file' class='form-control' name='upload' id='upload' required />
                            </div>
                            <div class="col-lg-4">
                                <label for="">Post Now</label>
                                <input type='submit' class='btn btn-primary' name='upload' id='upload'
                                    value='Post Now' />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
