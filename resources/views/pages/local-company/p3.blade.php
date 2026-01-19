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
                    <form action="#" class="pip-form" enctype="multipart/form-data" method="post" novalidate="">
                        <div class="pip-progress mb-4">
                            <div class="pip-progress-label">Program Kolaborasi Industri: <strong>3 / 4</strong></div>
                            <div aria-label="Program Kolaborasi Industri" aria-valuemax="100" aria-valuemin="0"
                                aria-valuenow="75" class="progress" role="progressbar">
                                <div class="progress-bar" style="width: 75%"></div>
                            </div>
                        </div>
                        <h2 class="pip-h2">Program Kolaborasi Industri</h2>
                        <p class="pip-muted">Maklumat ini membantu PIP mengenal pasti penglibatan organisasi dalam Program
                            Kolaborasi Industri (ICP) sama ada sebagai penyedia atau penerima.</p>
                        <div class="pip-card mb-4">
                            <h3 class="pip-h3">Penyedia ICP (ICP Provider)</h3>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label d-block">Adakah anda pernah / sedang menjadi Penyedia ICP (ICP
                                        Provider)?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="pip-radio" id="icp_provider_yes" name="icp_provider_status"
                                            type="radio" value="Ya" />
                                        <label class="form-check-label" for="icp_provider_yes">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="pip-radio" id="icp_provider_no" name="icp_provider_status"
                                            type="radio" value="Tidak" checked />
                                        <label class="form-check-label" for="icp_provider_no">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div id="icp_provider_details" class="icp-details d-none">
                                <h4 class="pip-h4">Jika Ya, nyatakan:</h4>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="icp_provider_icp_name">Nama ICP</label>
                                        <input class="form-control" id="icp_provider_icp_name" name="icp_provider_icp_name"
                                            placeholder="Contoh: ICP XYZ" type="text" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="icp_provider_contract">Kontrak</label>
                                        <input class="form-control" id="icp_provider_contract" name="icp_provider_contract"
                                            placeholder="Contoh: Kontrak ABC" type="text" />
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label" for="icp_provider_start_year">Mulai Tahun</label>
                                        <input class="form-control" id="icp_provider_start_year" inputmode="numeric"
                                            max="9999" min="1900" name="icp_provider_start_year" placeholder="2020"
                                            type="number" />
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label" for="icp_provider_end_year">Hingga Tahun</label>
                                        <input class="form-control" id="icp_provider_end_year" inputmode="numeric"
                                            max="9999" min="1900" name="icp_provider_end_year" placeholder="2024"
                                            type="number" />
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <button type="button" data-target="res" class="btn btn-outline-primary"
                                        id="btn_add_icp_provider1">Klik
                                        untuk Tambah</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="btn_clear_icp_provider">Kosongkan</button>
                                </div>
                                <div id="res">
                                    @include('pages.local-company.p3-sets.icp-provider-list', [
                                        'company_id' => auth()->user()->profile()->id,
                                        'ctg' => 'Provider',
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="pip-card mb-4">
                            <h3 class="pip-h3">Penerima ICP (ICP Recipient)</h3>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label d-block">Adakah anda pernah / sedang menjadi Penerima ICP (ICP
                                        Recipient)?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="pip-radio" id="icp_recipient_yes" name="icp_recipient_status"
                                            type="radio" value="Ya" />
                                        <label class="form-check-label" for="icp_recipient_yes">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="pip-radio" id="icp_recipient_no" name="icp_recipient_status"
                                            type="radio" value="Tidak" checked />
                                        <label class="form-check-label" for="icp_recipient_no">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div id="icp_recipient_details" class="icp-details d-none">
                                <h4 class="pip-h4">Jika Ya, nyatakan:</h4>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="icp_recipient_icp_name">Nama ICP</label>
                                        <input class="form-control" id="icp_recipient_icp_name"
                                            name="icp_recipient_icp_name" placeholder="Contoh: ICP XYZ" type="text" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="icp_recipient_contract">Kontrak</label>
                                        <input class="form-control" id="icp_recipient_contract"
                                            name="icp_recipient_contract" placeholder="Contoh: Kontrak ABC"
                                            type="text" />
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label" for="icp_recipient_start_year">Mulai Tahun</label>
                                        <input class="form-control" id="icp_recipient_start_year" inputmode="numeric"
                                            max="9999" min="1900" name="icp_recipient_start_year"
                                            placeholder="2020" type="number" />
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label" for="icp_recipient_end_year">Hingga Tahun</label>
                                        <input class="form-control" id="icp_recipient_end_year" inputmode="numeric"
                                            max="9999" min="1900" name="icp_recipient_end_year"
                                            placeholder="2024" type="number" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="icp_recipient_provider_name">Penyedia ICP (ICP
                                            Provider)</label>
                                        <input class="form-control" id="icp_recipient_provider_name"
                                            name="icp_recipient_provider_name" placeholder="Nama penyedia ICP"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <button type="button" class="btn btn-outline-primary" id="btn_add_icp_recipient1"
                                        data-target="res2">Klik untuk Tambah</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="btn_clear_icp_recipient">Kosongkan</button>
                                </div>
                                <div id="res2">
                                    @include('pages.local-company.p3-sets.icp-recipient', [
                                        'company_id' => auth()->user()->profile()->id,
                                        'ctg' => 'Recipient',
                                    ])
                                </div>
                            </div>
                        </div>
                </div>
                <div class="d-flex gap-2 justify-content-between mt-4">
                    <a class="btn btn-outline-secondary"
                        href="/profile/application/fill/{{ WebTool::enc('2') }}">Kembali</a>
                    <a href="/profile/application/fill/{{ WebTool::enc('4') }}"><button class="btn btn-primary"
                            type="button">Simpan &amp; Teruskan</button></a>
                </div>
                </form>
            </div>
            </div>
        </section>
    </main>
    @include('pages.local-company.sub.p3-script')
    @include('pages.local-company.p3-sets.icp-pro-script')
@endsection
