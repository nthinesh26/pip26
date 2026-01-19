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

        @if (isset($message))
            {!! $message !!}
        @endif

        <section class="pip-section">
            <div class="container">
                <div class="pip-card">


                    <div class="row g-4">
                        <div class="col-12">
                            <div class="pip-progress mb-4">
                                <div class="pip-progress-label"> Maklumat Pengurusan: <strong>2 / 4</strong></div>
                                <div aria-label="Maklumat Pengurusan" aria-valuemax="100" aria-valuemin="0"
                                    aria-valuenow="50" class="progress" role="progressbar">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>

                            <h2 class="section-title">Maklumat Pengurusan</h2>
                            <p class="text-muted mb-4">Sila lengkapkan maklumat pengurusan syarikat di bawah.</p>
                        </div>

                        <!-- Lembaga Pengarah -->
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-header bg-white">
                                    <h3 class="h5 mb-0">Lembaga Pengarah</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="director_name">Nama</label>
                                            <input type="text" class="form-control" id="director_name"
                                                name="director_name" placeholder="Contoh: Ahmad bin Ali">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="director_id_passport">No Kad Pengenalan /
                                                Pasport</label>
                                            <input type="text" class="form-control" id="director_id_passport"
                                                name="director_id_passport" placeholder="Contoh: 990101-14-1234">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="director_nationality">Warganegara</label>
                                            <input type="text" class="form-control" id="director_nationality"
                                                name="director_nationality" placeholder="Contoh: Malaysia">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="director_position">Jawatan</label>
                                            <input type="text" class="form-control" id="director_position"
                                                name="director_position" placeholder="Contoh: Pengarah">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="director_shareholding_pct">Pegangan Saham
                                                %</label>
                                            <input type="number" class="form-control" id="director_shareholding_pct"
                                                name="director_shareholding_pct" min="1" max="100"
                                                placeholder="1 - 100">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label d-block">Status</label>
                                            <div class="d-flex flex-wrap gap-3">
                                                <div class="pip-radio-grid">
                                                    <input class="pip-radio" type="radio" name="director_status"
                                                        id="director_status_awam" value="Awam"><span>Awam</span>
                                                </div>
                                                <div class="pip-radio-grid">
                                                    <input class="pip-radio" type="radio" name="director_status"
                                                        id="director_status_pesara_awam" value="Pesara Awam"><span>Persara
                                                        Awam</span>
                                                </div>
                                                <div class="pip-radio-grid">
                                                    <input class="pip-radio" type="radio" name="director_status"
                                                        id="director_status_pesara_tentera"
                                                        value="Pesara Tentera"><span>Persara Tentera</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hidden payload for multiple directors (built by JS) -->
                                        <input type="hidden" id="directors_payload" name="directors_payload"
                                            value="">
                                    </div>

                                    <div class="mt-3 d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary" id="btn_add_director"
                                            aria-label="Klik untuk Tambah">Klik untuk Tambah</button>
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="btn_clear_director">Kosongkan</button>
                                    </div>
                                    <div id="res">
                                        @include('pages.local-company.sub.p2-dir-list', [
                                            'user' => auth()->user(),
                                        ])
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Pegawai Yang Boleh Dihubungi -->
                        <form action="/pip/local/update/contact-officer" class="pip-form" method='POST'
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            @include('pages.local-company.sub.p2-contact-officer')


                            <!-- Actions -->
                            <div class="col-12 d-flex justify-content-between pt-2">
                                <a href="/profile/application/fill/{{ WebTool::enc(1) }}"
                                    class="btn btn-outline-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan &amp; Teruskan</button>
                            </div>
                    </div>
                    </form>
                    {{-- @include('pages.local-company.com.p2-script') --}}
                    @include('pages.local-company.sub.p2-sc-script')
                </div>
            </div>
        </section>
    </main>
@endsection
