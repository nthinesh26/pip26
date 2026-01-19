@extends('pages.general.registrartion')

@section('content')
    <main class="pip-main">
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG PENDAFTARAN BAGI AGENSI KERAJAAN</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah untuk mendapatkan log masuk Portal Industri
                    Pertahanan</p>
                {{-- <img class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" alt="MINDEF" /> --}}
            </div>
        </section>

        <!-- FORM -->
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form class="pip-form" action="/pip/registration/royal-registration" method="post" novalidate>
                        @csrf
                        <h2 class="pip-h2">Maklumat Akaun</h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nama Penuh Akaun <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="account_name" placeholder="Ali bin Abu"
                                    required>
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

                        <h2 class="pip-h2">Maklumat Agensi</h2>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Nama Agensi <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="agensi_name" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Laman Web Agensi</label>
                                <input class="form-control" type="url" name="agensi_website"
                                    placeholder="https://www.contoh.com">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Telefon Agensi <span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="agensi_phonenumber" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">E-mel Agensi <span class="pip-required">*</span></label>
                                <input class="form-control" type="email" name="agensi_email"
                                    placeholder="user@example.com" required>
                            </div>

                            <!-- Jenis Agensi (Pilih satu) -->
                            <fieldset class="pip-fieldset">
                                <legend class="pip-legend h5">Jenis Agensi (Pilih satu) <span class="pip-required">*</span>
                                </legend>

                                <!-- Radio group -->
                                <div id="jenis-agensi-group" class="pip-radio-grid">
                                    <!-- ATM -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi" id="agensi_atm"
                                            value="ATM" required>
                                        <span class="form-check-label">Angkatan Tentera Malaysia</span>
                                    </label>

                                    <!-- Jabatan / Agensi Kerajaan -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi"
                                            value="Jabatan_Agensi_Kerajaan">
                                        <span class="form-check-label">Jabatan / Agensi Kerajaan (Selain Akademi)</span>
                                    </label>

                                    <!-- Universiti / Pusat Latihan -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi"
                                            value="Universiti_Pusat_Latihan">
                                        <span class="form-check-label">Universiti / Pusat Latihan</span>
                                    </label>

                                    <!-- Pusat Penyelidikan dan Kajian -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi"
                                            value="Pusat_Penyelidikan_Kajian">
                                        <span class="form-check-label">Pusat Penyelidikan dan Kajian</span>
                                    </label>

                                    <!-- Badan Profesional -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi"
                                            value="Badan_Profesional">
                                        <span class="form-check-label">Badan Profesional</span>
                                    </label>

                                    <!-- Lain-lain -->
                                    <label class="form-check">
                                        <input class="pip-radio" type="radio" name="jenis_agensi" id="agensi_lain"
                                            value="Lain-lain">
                                        <span class="form-check-label">Lain-lain (Nyatakan)</span>
                                    </label>
                                </div>

                                <!-- Shown only when ATM selected -->
                                <div id="atm-extra" class="border rounded p-3 mb-3"
                                    style="display:none; background-color:#f8f9fa;">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="atm_branch" class="form-label">Pilih Pasukan</label>
                                            <select id="atm_branch" name="atm_branch" class="form-select">
                                                <option value="TDM">Tentera Darat Malaysia</option>
                                                <option value="TLDM">Tentera Laut Diraja Malaysia</option>
                                                <option value="TUDM">Tentera Udara Diraja Malaysia</option>
                                                <option value="MAB">Markas Angkatan Bersama</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="atm_pasukan_nyatakan" class="form-label">Pasukan
                                                (Nyatakan)</label>
                                            <input type="text" id="atm_pasukan_nyatakan" name="atm_pasukan_nyatakan"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- ✏️ Shown only when Lain-lain selected -->
                                <div id="lain-extra" class="border rounded p-3"
                                    style="display:none; background-color:#f8f9fa;">
                                    <label for="lain_nyatakan" class="form-label">Nyatakan (Jika Lain-lain
                                        dipilih)</label>
                                    <input type="text" id="lain_nyatakan" name="lain_nyatakan" class="form-control"
                                        placeholder="Contoh: Nama agensi/pasukan">
                                </div>
                            </fieldset>

                            <!-- Tiny JS to toggle visibility (put once at bottom of page or after this section) -->
                            @include('pages.royal.script')


                            <div class="col-12 col-md-6">
                                <label class="form-label">Kementerian<span class="pip-required">*</span></label>
                                <input class="form-control" type="text" name="kementerian" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Tarikh Ditubuhkan<span class="pip-required">*</span></label>

                                <input class="form-control" type="date" name="company_established">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Alamat Rasmi / Ibu Pejabat<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="agensi_address1"
                                    placeholder="Alamat Baris 1" required>
                                <input type="text" class="form-control mb-2" name="agensi_address2"
                                    placeholder="Alamat Baris 2">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="postcode" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri <span class="text-danger">*</span></label>
                                <select class="form-select" name="state" required>
                                    <option value="">Pilih</option>
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
                                <input type="text" class="form-control mb-2" name="agensifacility_address1"
                                    placeholder="Alamat Baris 1">
                                <input type="text" class="form-control mb-2" name="agensifacility_address2"
                                    placeholder="Alamat Baris 2">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod</label>
                                <input type="text" class="form-control" name="agensifacility_postcode">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar</label>
                                <input type="text" class="form-control" name="agensifacility_city">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri</label>
                                <select class="form-select" name="agensifacility_state">
                                    <option value="">Pilih</option>
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


                        </div>

                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Pengakuan</h2>
                        <p class="pip-muted">Saya dengan ini mengisytiharkan bahawa semua maklumat yang diberikan adalah
                            benar dan tepat.</p>

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
                                <input class="form-control" type="date" name="ack_date">
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
