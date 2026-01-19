@extends('pages.general.registrartion')

@section('content')
    <main class="pip-main">
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG PENDAFTARAN BAGI INSTITUSI PENYELIDIKAN &amp; AKADEMIA</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah untuk mendapatkan log masuk Portal Industri
                    Pertahanan</p>
                {{-- <img alt="MINDEF" class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" /> --}}
            </div>
        </section>
        <!-- FORM -->
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form method='POST' class="pip-form" action='/pip/registration/ins-registration'
                        enctype='multipart/form-data'>
                        @csrf
                        <h2 class="pip-h2">Maklumat Akaun</h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_full_name">Nama Penuh Akaun</label>
                                <input class="form-control" id="account_full_name" name="account_full_name"
                                    placeholder="Nama Penuh" type="text" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_email">Email Akaun<span
                                        class="pip-required">*</span></label>
                                <input class="form-control" id="account_email" name="account_email"
                                    placeholder="user@example.com" required="" type="email" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_mobile_phone">No. Telefon Bimbit<span
                                        class="pip-required">*</span></label>
                                <input class="form-control" id="account_mobile_phone" name="account_mobile_phone"
                                    placeholder="012-3456789" type="tel" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="password">Kata Laluan <span
                                        class="pip-required">*</span></label>
                                <input aria-describedby="pwd-barstr-text" class="form-control" id="password" minlength="8"
                                    name="account_pwd" required="" type="password" />
                                <div aria-hidden="true" class="pip-pwdbar">
                                    <div id="pwd-barstr"></div>
                                </div>
                                <small class="pip-muted" id="pwd-barstr-text">Kekuatan Kata Laluan:</small>
                            </div>
                        </div>
                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Identiti Organisasi</h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="organisation_name">Nama Organisasi</label>
                                <input class="form-control" id="organisation_name" name="organisation_name"
                                    type="text" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="organisation_established_date">Tarikh Ditubuhkan</label>
                                <input class="form-control" id="organisation_established_date"
                                    name="organisation_established_date" placeholder="Contoh: 01/01/2000" type="text" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="parent_ministry">Kementerian Induk / Tadbir Urus</label>
                                <input class="form-control" id="parent_ministry" name="parent_ministry" type="text" />
                            </div>
                        </div>
                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Penerangan Organisasi / Mandat</h2>
                        <div class="row g-3">
                            <div class="col-12">
                                <fieldset class="pip-fieldset">
                                    <legend class="pip-legend">Tandakan jenis organisasi yang berkenaan (Tandakan (√) yang
                                        berkenaan)</legend>
                                    <div class="pip-radio-grid">
                                        <label class="pip-radio"><input id="org_type_ministry" name="org_desciption[]"
                                                type="checkbox" value="Kementerian Kerajaan" /> <span>Kementerian
                                                Kerajaan</span></label>
                                        <label class="pip-radio"><input id="org_type_agency" name="org_desciption[]"
                                                type="checkbox" value="Jabatan/Agensi" /> <span>Jabatan/Agensi
                                                Kerajaan</span></label>
                                        <label class="pip-radio"><input id="org_type_armed_forces_unit"
                                                name="org_desciption[]" type="checkbox"
                                                value="Unit Angkatan Tentera (Darat/Laut/Udara/Bersama)" />
                                            <span>Unit Angkatan Tentera (Darat/Laut/Udara/Bersama)</span></label>
                                        <label class="pip-radio"><input id="org_type_academia_university"
                                                name="org_desciption[]" type="checkbox" value="Akademia/Universiti" />
                                            <span>Akademia/Universiti</span></label>
                                        <label class="pip-radio"><input id="org_type_research_institute"
                                                name="org_desciption[]" type="checkbox" value="Institusi Penyelidikan" />
                                            <span>Institusi Penyelidikan</span></label>
                                        <label class="pip-radio"><input id="org_type_professional_body"
                                                name="org_desciption[]" type="checkbox" value="Badan Profesional" />
                                            <span>Badan Profesional</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Alamat &amp; Maklumat Perhubungan</h2>

                        <div class="col-12">
                            <label class="form-label">Alamat Ibu Pejabat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" name="akademia_address1"
                                placeholder="Alamat Baris 1" required>
                            <input type="text" class="form-control mb-2" name="akademia_address2"
                                placeholder="Alamat Baris 2">
                        </div>


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="akademia_postcode" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="akademia_city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri <span class="text-danger">*</span></label>
                                <select class="form-select" name="akademia_state" required>
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
                        <div class="col-12">
                            <label class="form-label">Alamat Fasiliti Lain (Jika Berbeza) </label>
                            <input type="text" class="form-control mb-2" name="akademia_alt_address1"
                                placeholder="Alamat Baris 1">
                            <input type="text" class="form-control mb-2" name="akademia_alt_address2"
                                placeholder="Alamat Baris 2">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poskod</label>
                                <input type="text" class="form-control" name="akademia_postcode" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bandar</label>
                                <input type="text" class="form-control" name="akademia_city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Negeri</label>
                                <select class="form-select" name="companyfacility_state" required>
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

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="organisation_website">Laman Web Syarikat</label>
                            <input class="form-control" id="organisation_website" name="organisation_website"
                                placeholder="https://..." type="url" />
                        </div>

                        <hr class="pip-divider" />
                        <h2 class="pip-h2">Pengakuan</h2>
                        <p class="pip-muted">Saya dengan ini mengisytiharkan semua maklumat yang diberikan adalah benar dan
                            tepat.
                        </p>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ack_name">Nama</label>
                                <input class="form-control" id="ack_name" name="ack_name" type="text" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ack_position">Jawatan</label>
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
                                Pertahanan,
                                serta pihak ketiga yang dilantik secara rasmi oleh Kerajaan.
                                Data anda akan dilindungi selaras dengan peruntukan Akta Perlindungan Data Peribadi 2010
                                (Akta 709)
                                dan dasar keselamatan maklumat Kerajaan
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
            </div>
        </section>
    </main>
@endsection
