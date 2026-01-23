@extends('pages.general.registrartion')

@section('content')
    <main>
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG MAKLUMAT LENGKAP BAGI SYARIKAT TEMPATAN</h1>
                <p class="pip-hero-subtitle">Sila lengkapkan maklumat di bawah.</p>
                {{-- <img alt="Portal Rasmi Mindef" class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" /> --}}
            </div>
        </section>

        <form method='POST' action='/application/fill/{{ WebTool::enc('local-com') }}/{{ WebTool::enc('p1') }}'
            enctype='multipart/form-data' class="pip-form" novalidate>
            @csrf
            <section class="pip-section">
                <div class="container">
                    <div class="pip-card">
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-12 text-right">
                                {{-- <small>#{{ WebTool::encode($profile->id) }} - 000{{ $profile->id }}</small> --}}
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="pip-progress mb-4">
                            <div class="pip-progress-label">Maklumat Akaun & Syarikat: <strong> 1 / 4</strong></div>
                            <div class="progress" role="progressbar" aria-label="Kemajuan pendaftaran" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 25%"></div>
                            </div>
                        </div>

                        <!-- Form Section 1 - Maklumat Akaun -->
                        <h2 class="pip-h2">Maklumat Akaun</h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_full_name">Nama Penuh Akaun</label>
                                <input type="text" class="form-control" name="account_name" placeholder="Nama Akaun" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="account_email">Email Akaun <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control is-invalid" name="account_email"
                                    placeholder="user@example.com" required />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="mobile_phone">No Telefon Bimbit <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control is-invalid" name="account_phone"
                                    placeholder="012-3456789" required />
                            </div>

                            <div class="col-12 col-md-6" style="display: none">
                                <label class="form-label">Kata Laluan <span class="pip-required">*</span></label>
                                <input class="form-control is-invalid" type="password" name="account_pwd" minlength="8"
                                    aria-describedby="pwd-barstr-text">
                                <div class="pip-pwdbar" aria-hidden="true">
                                    <div id="pwd-barstr"></div>
                                </div>
                                <small id="pwd-barstr-text" class="pip-muted">Kekuatan Kata Laluan:</small>
                            </div>

                        </div>

                        <hr class="pip-divider" />

                        <!-- Form Section 2 - Maklumat Syarikat -->
                        <h2 class="pip-h2">Maklumat Syarikat</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="company_name">Nama Syarikat <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" required />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="incorporation_date">Tarikh Ditubuhkan</label>
                                <input type="date" class="form-control" name="company_established" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ssm_registration_no">No. Pendaftaran Syarikat Suruhanjaya
                                    Syarikat Malaysia (SSM) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_ssm" required />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ssm_cert_upload">Muat naik dokumen (SSM) <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="ssm_cert_upload" accept="application/pdf"
                                    @if (auth()->user()->profile()->ssm_cert_upload == 'will_be_updated') required @endif />
                                <div class="form-text">Hanya fail PDF bersaiz tidak lebih 10MB dibenarkan.</div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="company_website">Laman Web Syarikat</label>
                                <input type="url" class="form-control" name="company_website"
                                    placeholder="https://www.example.com" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">No. Telefon Syarikat </label>
                                <input class="form-control" type="text" name="company_phonenumber" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">E-mel Syarikat </label>
                                <input class="form-control" type="email" name="company_email"
                                    placeholder="user@example.com" required>
                            </div>

                            <div class="col-12">
                                <fieldset class="pip-fieldset">
                                    <legend class="pip-legend">Jenis Syarikat <span class="pip-required">*</span>
                                    </legend>
                                    <div class="pip-radio-grid">
                                        <label class="pip-radio"><input type="radio" name="company_type"
                                                value="bhd" required> <span>Awam Berhad</span></label>
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
                            @section('script-inject')
                                <script>
                                    @php
                                        $code = in_array($profile->company_type, ['bhd', 'jv', 'sdn_bhd', 'individual']);
                                    @endphp
                                    @if (!$code)
                                        $(document).ready(function(e) {
                                            $("#company_type_other").removeAttr('disabled');
                                            setValueByName('company_type', 'other');
                                            setValueByName('company_type_other', '{{ $profile->company_type }}');
                                        });
                                    @endif
                                </script>
                            @endsection
                        </div>

                        <div class="col-12">
                            <fieldset class="pip-fieldset">
                                <legend class="pip-legend">Jenis Kumpulan Syarikat</legend>
                                <div class="pip-radio-grid">
                                    <label class="pip-radio"><input type="radio" name="companygroup_type"
                                            value="sme"> <span>Perniagaan Kecil dan Sederhana
                                            (PKS)</span></label>
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
                            <label class="form-label" for="mof_registration_no">No. Pendaftaran Syarikat
                                Kementerian Kewangan Malaysia</label>
                            <input type="text" class="form-control" name="eperolehannumber" />
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="mof_cert_upload">Muat naik dokumen sijil (MOF)</label>
                            <input class="form-control" type="file" id="mof_cert_upload" name="mof_cert_upload"
                                accept="application/pdf" @if (auth()->user()->profile()->mof_cert_upload == 'will_be_updated') required @endif />
                            <div class="form-text">Hanya fail PDF bersaiz tidak lebih 10MB dibenarkan.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat Rasmi / Ibu Pejabat</label>
                            <input type="text" class="form-control mb-2" name="company_address1"
                                placeholder="Alamat Baris 1" required>
                            <input type="text" class="form-control mb-2" name="company_address2"
                                placeholder="Alamat Baris 2">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Poskod </label>
                            <input type="text" class="form-control" name="company_postcode" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Bandar </label>
                            <input type="text" class="form-control" name="company_city" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Negeri </label>
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
                                <option value="">Pilih Negeri</option>
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

                            <!-- Form Section 3 - Bidang Kepakaran Syarikat -->
                            @include('pages.general.components.areas-of-expert')

                            <div class="col-12 d-flex justify-content-between pt-2">
                                <a href="#" class="btn btn-outline-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan &amp; Teruskan</button>
                            </div>
                        </div>
                    </div>
        </section>
    </form>
</main>
<script>
    $(document).ready(function(e) {
        @php
            // dd(json_decode($profile->exps));
            if (!is_array($profile->exps)) {
                $exps = [$profile->exps];
            } else {
                $exps = $profile->exps;
            }
            // dd($exps);
            $exps = json_decode($exps[0]);
        @endphp
        const matchValues = [
            @foreach ($exps as $exp)
                "{{ $exp }}",
            @endforeach
        ];

        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            if (matchValues.includes(cb.value)) {
                cb.checked = true;
            }
        });


        if ($("#kepakaran_others").prop('checked')) {
            @php
                $isArray = is_array($exps);
                if ($isArray) {
                    $len = count($exps);
                    $len -= 1;
                }

            @endphp

            @if (auth()->user()->profile()->exps != 'null' && auth()->user()->profile()->exps)
                $("#kepakaranOthersText").val("{{ $exps[$len] }}");
            @endif
            $("#kepakaranOthersWrap").css("display", "block");
        }
    });
</script>

@endsection
