@extends('pages.general.registrartion')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Mesej: </h1>
                <p>Maaf atas kesulitan. Sistem tidak dapat memproses permintaan anda pada masa ini.</p>

                <h3>Makluman:</h3>
                <p>Gangguan ini mungkin bersifat sementara. Tiada data pengguna terjejas.</p>

                <h3>Tindakan:</h3>
                Sila cuba semula, atau kembali ke Laman Utama. Sekiranya masalah berterusan, sila hubungi pihak pentadbir
                sistem dengan menyertakan ID rujukan di bawah.

                <h3>Butang:</h3>
                <a href="javascript:void(0)" onclick="history.back()">Kembali</a> | <a href="/">Kembali</a> | <a
                    href="">Cuba Semula</a>

                ID Rujukan: {WebTool::enc(date('ymdhis'))}
            </div>
        </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Title: </h1>
                <p>System Service Interruption.</p>

                <h3>Message:</h3>
                <p>We apologise for the inconvenience. The system is currently unable to process your request.</p>

                <h3>Notice:</h3>
                This may be a temporary interruption. No user data has been affected.
                <h3>Action: </h3>
                <p>Please try again, or return to the Home page. If the issue persists, contact the system administrator and
                    quote the reference ID below. </p>
                <h3>Buttons:</h3>
                <a href="javascript:void(0)" onclick="history.back()">Back </a> | <a href="/">Home </a> | <a
                    href="">Retry</a>

                Reference ID: {WebTool::enc(date('ymdhis'))}
            </div>
        </div>
    </div>
@endsection
