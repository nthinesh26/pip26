@extends('pages.general.registrartion')

@section('content')
    <main>
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG MAKLUMAT LENGKAP BAGI SYARIKAT TEMPATAN</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah untuk meneruskan pendaftaran anda di Portal
                    Industri Pertahanan.</p>
                {{-- <img alt="MINDEF" class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" /> --}}
            </div>
        </section>
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form action="/pip/local/complete/registration" class="pip-form" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="pip-progress mb-4">
                            <div class="pip-progress-label">Kemajuan Pendaftaran: <strong>4 / 4</strong></div>
                            <div aria-label="Kemajuan pendaftaran" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100"
                                class="progress" role="progressbar">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                        <h2 class="pip-h2">Pengakuan</h2>
                        <p class="pip-muted">Saya dengan ini mengisytiharkan bahawa semua maklumat yang diberikan adalah
                            benar dan tepat.</p>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="declaration_name">Nama<span
                                        class="pip-required">*</span></label>
                                <input class="form-control" id="declaration_name" name="declaration_name" required
                                    type="text" value="{{ auth()->user()->profile()->name_ack }}" />
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="declaration_position">Jawatan</label>
                                <input class="form-control" required id="declaration_position" name="declaration_position"
                                    type="text" value="{{ auth()->user()->profile()->name_jobposition }}" />
                            </div>
                            <div class="col-12 col-md-2">
                                <label class="form-label" for="declaration_date">Tarikh</label>
                                <input class="form-control" id="declaration_date" name="declaration_date" type="date"
                                    value="{{ \Carbon\Carbon::parse(auth()->user()->profile()->ack_date)->format('Y-m-d') }}" />
                            </div>
                        </div>

                        <hr class="my-4" />

                        <h2 class="pip-h2">Persetujuan</h2>
                        <div class="form-check">
                            <input class="form-check-input" id="consent_pdpa" name="consent_pdpa" type="checkbox"
                                required="required" checked />
                            <label class="form-check-label" for="consent_pdpa">
                                Maklumat yang telah anda berikan akan digunakan oleh Kerajaan, khususnya Kementerian
                                Pertahanan, serta pihak ketiga yang dilantik secara rasmi oleh Kerajaan. Data anda akan
                                dilindungi selaras dengan peruntukan Akta Perlindungan Data Peribadi 2010 (Akta 709) dan
                                dasar keselamatan maklumat Kerajaan.
                            </label>
                        </div>

                        <div class="d-flex gap-2 justify-content-between mt-4">
                            <a class="btn btn-outline-secondary"
                                href="/profile/application/fill/{{ WebTool::enc(3) }}">Kembali</a>
                            <button class="btn btn-primary" type="submit">Hantar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
