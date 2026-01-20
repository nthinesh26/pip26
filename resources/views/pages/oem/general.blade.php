@extends('pages.general.registrartion')

@section('content')
    <main class="pip-main">
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG PENDAFTARAN BAGI OEM</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah untuk mendapatkan log masuk Portal Industri
                    Pertahanan</p>
                {{-- <img class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" alt="Portal Rasmi Mindef" /> --}}
            </div>
        </section>

        <!-- FORM -->
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form class="pip-form" method='POST' action='/pip/general/oem-registration' enctype='multipart/form-data'
                        autocomplete="off" novalidate>
                        @csrf
                        <h2 class="pip-h2">Maklumat Akaun</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_full_name">Nama Penuh Akaun<span class="pip-required">*</span></label>
                                <input class="form-control" id="account_full_name" name="account_full_name"
                                    placeholder="Ali Bin Abu" type="text" required  />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">E-mel Akaun<span class="pip-required">*</span></label>
                                <input class="form-control" type="email" name="account_email"
                                    placeholder="user@example.com" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No Telefon Bimbit <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="account_phone" placeholder="012-3456789"
                                    required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Kata Laluan <span class="pip-required">*</span></label>
                                <input class="form-control" type="password" name="account_pwd" minlength="8" required
                                    aria-describedby="pwd-barstr-text">
                                <div class="pip-pwdbar" aria-hidden="true">
                                    <div id="pwd-barstr"></div>
                                </div>
                                <small id="pwd-barstr-text" class="pip-muted">Kekuatan Kata Laluan:</small>
                            </div>
                        </div>

                        <hr class="pip-divider" />

                        <h2 class="pip-h2">Maklumat Syarikat</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nama Syarikat<span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_name" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Negara Didaftarkan<span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_country" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Pendaftaran Syarikat<span
                                        class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_registration_no" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Tahun Ditubuhkan<span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_year_established" required>
                            </div>

                            <div class="col-12">
                                <fieldset class="pip-fieldset">
                                    <legend class="pip-legend">Jenis Syarikat <span class="pip-required">*</span></legend>
                                    <div class="pip-radio-grid">
                                        <label class="pip-radio"><input type="radio" name="company_type" value="bhd"
                                                required> <span>Awam Berhad</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type" value="jv"
                                                required> <span>Perkongsian</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type" value="sdn_bhd"
                                                required> <span>Sendirian Berhad</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="individual" required> <span>Perseorangan</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type" value="other"
                                                id="company_type_other_radio" required>
                                            <span>Lain-Lain</span></label>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-label">Jika pilih Lain-Lain, sila nyatakan</label>
                                        <input class="form-control" type="text" name="company_type_other"
                                            id="company_type_other" disabled>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Alamat Rasmi / Ibu Pejabat<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="oem_address1"
                                    placeholder="Alamat Baris 1" required>
                                <input type="text" class="form-control mb-2" name="oem_address2"
                                    placeholder="Alamat Baris 2">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Poskod <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="oem_postcode" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Bandar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="oem_city" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Negara <span
                                        class="text-danger">*</span></label>
                                <select id="country" name="oem_country" class="form-select" required>
                                    <option value="" disable selected hidden>Pilih Negara</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Laos">Laos</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3 d-none" id="stateSelectWrap">
                                <label for="stateSelect" class="form-label">Negeri <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="stateSelect" name="oem_state" disabled>
                                    <option value="" disabled selected hidden>Pilih Negeri</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3 d-none" id="stateTextWrap">
                                <label for="stateText" class="form-label">Negeri/Wilayah <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="stateText" name="oem_state_text" disabled
                                    placeholder="E.g. Central / Bangkok / Jawa Barat">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="company_website">Laman Web Syarikat</label>
                                <input class="form-control" id="company_website" name="company_website"
                                    placeholder="https://www.example.com" type="url" />
                            </div>
                        </div>
                        <h2 class="pip-h2">Pengakuan</h2>
                        <p class="pip-muted">Saya dengan ini mengisytiharkan semua maklumat yang diberikan adalah benar dan
                            tepat.</p>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ack_name">Nama <span class="pip-required">*</span></label>
                                <input class="form-control" id="ack_name" name="ack_name" type="text" required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ack_position">Jawatan </label>
                                <input class="form-control" id="ack_position" name="ack_position" type="text" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ack_date">Tarikh</label>
                                <input class="form-control" id="ack_date" name="ack_date" type="date" />
                            </div>
                        </div>
                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Persetujuan</h2>
                        <div class="form-check pip-consent">
                            <input class="form-check-input" id="consent_pdpa" name="consent_pdpa" required=""
                                type="checkbox" value="1" />
                            <label class="form-check-label" for="consent_pdpa">
                                Maklumat yang telah anda berikan akan digunakan oleh Kerajaan, khususnya Kementerian
                                Pertahanan, serta pihak ketiga yang dilantik secara rasmi oleh Kerajaan.
                                Data anda akan dilindungi selaras dengan peruntukan Akta Perlindungan Data Peribadi 2010
                                (Akta 709) dan dasar keselamatan maklumat Kerajaan
                            </label>
                        </div>
                        <div class="pip-actions mt-4">
                            <button class="btn btn-primary" type="submit">
                                Hantar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
