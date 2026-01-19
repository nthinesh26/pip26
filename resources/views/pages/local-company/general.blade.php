@extends('pages.general.registrartion')

@section('content')
    <main class="pip-main">
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG PENDAFTARAN BAGI SYARIKAT TEMPATAN</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah untuk mendapatkan log masuk Portal Industri
                    Pertahanan</p>
                <img class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" alt="Portal Rasmi Mindef" />
            </div>
        </section>

        <!-- FORM -->
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form class="pip-form" enctype='multipart/form-data' action="/pip/general/registration" method="post"
                        novalidate>
                        @csrf
                        <h2 class="pip-h2">Maklumat Akaun</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nama Penuh Akaun<span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="account_name" placeholder="Ali Bin Abu"
                                    required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">E-mel Akaun <span class="pip-required">*</span></label>
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
                                <small id="pwd-barstr-text" class="pip-muted"
                                    data-i18n-key="pip_prereg_syarikattempatan_form_1_4_subtitle">Kekuatan Kata
                                    Laluan:</small>
                            </div>
                        </div>

                        <hr class="pip-divider" />

                        <h2 class="pip-h2">Maklumat Syarikat</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nama Syarikat <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_name" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Tarikh Ditubuhkan <span class="pip-required">*</span> </label>
                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}"
                                    name="company_established" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Pendaftaran Syarikat Suruhanjaya Syarikat Malaysia (SSM) <span
                                        class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_ssm" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Laman Web Syarikat</label>
                                <input class="form-control" type="url" name="company_website"
                                    placeholder="https://www.example.com">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Telefon Syarikat <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="company_phonenumber" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">E-mel Syarikat <span class="pip-required">*</span></label>
                                <input class="form-control" type="email" name="company_email"
                                    placeholder="user@example.com" required>
                            </div>

                            <div class="col-12">
                                <fieldset class="pip-fieldset">
                                    <legend class="pip-legend">Jenis Syarikat <span class="pip-required">*</span></legend>
                                    <div class="pip-radio-grid">
                                        <label class="pip-radio"><input type="radio" name="company_type" value="bhd"
                                                required> <span>Awam Berhad</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="jv" required> <span>Perkongsian</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="sdn_bhd" required> <span>Sendirian Berhad</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="individual" required> <span>Perseorangan</span></label>
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="other" id="company_type_other_radio" required>
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
                                <fieldset class="pip-fieldset">
                                    <legend class="pip-legend">Jenis Kumpulan Syarikat</legend>
                                    <div class="pip-radio-grid">
                                        <label class="pip-radio"><input type="radio" name="companygroup_type"
                                                value="sme"> <span>Perniagaan Kecil dan Sederhana (PKS)</span></label>
                                        <label class="pip-radio"><input type="radio" name="companygroup_type"
                                                value="largeenterprise"> <span>Industri Berskala Besar</span></label>
                                        <label class="pip-radio"><input type="radio" name="companygroup_type"
                                                value="mnc"> <span>Syarikat Multinasional</span></label>
                                        <label class="pip-radio"><input type="radio" name="companygroup_type"
                                                value="foreigncompany"> <span>Pemilikan Asing</span></label>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Pendaftaran Syarikat Kementerian Kewangan Malaysia</label>
                                <input class="form-control" type="text" name="eperolehannumber">
                            </div>


                            <div class="col-12">
                                <label class="form-label">Alamat Rasmi / Ibu Pejabat<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="company_address1"
                                    placeholder="Alamat Baris 1" required>
                                <input type="text" class="form-control mb-2" name="company_address2"
                                    placeholder="Alamat Baris 2">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_postcode" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri <span class="text-danger">*</span></label>
                                <select class="form-select" name="company_state" required>
                                    <option value="" disable selected hidden>Pilih Negeri</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu">Terengganu</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Alamat Fasiliti Lain</label>
                                <input type="text" class="form-control mb-2" name="companyfacility_address1"
                                    placeholder="Alamat Baris 1">
                                <input type="text" class="form-control mb-2" name="companyfacility_address2"
                                    placeholder="Alamat Baris 2">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod</label>
                                <input type="text" class="form-control" name="companyfacility_postcode">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar</label>
                                <input type="text" class="form-control" name="companyfacility_city">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri</label>
                                <select class="form-select" name="companyfacility_state">
                                    <option value="" disable selected hidden>Pilih Negeri</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu">Terengganu</option>
                                </select>
                            </div>

                            <hr class="pip-divider" />

                            <h2 class="pip-h2">Status Pemilikan</h2>
                            <p class="pip-muted">Kategori</p>

                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <fieldset class="pip-fieldset">
                                        <legend class="pip-legend">Bumiputera</legend>
                                        <div class="pip-radio-grid">
                                            <label class="pip-radio"><input type="radio" name="companystatus_bumi"
                                                    value="bumi_100"> <span>100%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_bumi"
                                                    value="bumi_more50"> <span>Melebihi 50%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_bumi"
                                                    value="bumi_less50"> <span>50% dan kurang</span></label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <fieldset class="pip-fieldset">
                                        <legend class="pip-legend">Bukan Bumiputera</legend>
                                        <div class="pip-radio-grid">
                                            <label class="pip-radio"><input type="radio" name="companystatus_nonbumi"
                                                    value="nonbumi_100"> <span>100%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_nonbumi"
                                                    value="nonbumi_50"> <span>Melebihi 50%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_nonbumi"
                                                    value="nonbumi_less50"> <span>50% dan kurang</span></label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <fieldset class="pip-fieldset">
                                        <legend class="pip-legend">Pemilikan Wanita</legend>
                                        <div class="pip-radio-grid">
                                            <label class="pip-radio"><input type="radio" name="companystatus_women"
                                                    value="women_100"> <span>100%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_women"
                                                    value="women_50"> <span>Melebihi 50%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_women"
                                                    value="women_less50"> <span>50% dan kurang</span></label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <fieldset class="pip-fieldset">
                                        <legend class="pip-legend">Pemilik Asing / Usahasama (JV)</legend>
                                        <div class="pip-radio-grid">
                                            <label class="pip-radio"><input type="radio" name="companystatus_jvforeign"
                                                    value="jvforeign_100"> <span>100%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_jvforeign"
                                                    value="jvforeign_50"> <span>Melebihi 50%</span></label>
                                            <label class="pip-radio"><input type="radio" name="companystatus_jvforeign"
                                                    value="jvforeign_less50"> <span>50% dan kurang</span></label>
                                        </div>
                                    </fieldset>
                                </div>

                                @include('pages.general.components.areas-of-expert')

                            </div>

                            <hr class="pip-divider" />

                            <h2 class="pip-h2">Pengakuan</h2>
                            <p class="pip-muted">Saya dengan ini mengisytiharkan bahawa semua maklumat yang diberikan
                                adalah benar dan tepat.</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Nama <span class="pip-required">*</span></label>
                                    <input class="form-control" type="text" name="name_ack" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Jawatan</label>
                                    <input class="form-control" type="text" name="name_jobposition">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Tarikh</label>
                                    <input class="form-control" type="date" name="ack_date"
                                        value="{{ date('Y-m-d') }}">
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
                                <button class="btn btn-primary" type="submit">Hantar</button>
                            </div>

                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
