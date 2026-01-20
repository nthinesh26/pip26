@extends('pages.general.registrartion')

@section('content')
    <main>
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title">BORANG CADANGAN PROJEK ICP atau R&D</h1>
                <p class="pip-hero-subtitle">Sila masukkan maklumat projek.</p>
                {{-- <img alt="MINDEF" class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" /> --}}
            </div>
        </section>
        <section class="pip-section">
            <div class="container">
                <div class="pip-card">
                    <form action="/pip/profile/wish-list" class="pip-form" enctype="multipart/form-data" method="post"
                        novalidate>
                        @csrf
                        @php
                            $com = auth()->user()->companyName();
                        @endphp
                        <div class="pip-card mb-4">
                            <h3 class="pip-h3">{{ auth()->user()->profile()->$com }}</h3>
                            <div class="row g-3">

                                <div class="col-12">
                                    <label class="form-label mb-2">Jenis Cadangan Projek <span
                                            class="text-danger">*</span></label>

                                    <div class="pip-radio-grid mb-2">
                                        <label class="pip-radio">
                                            <input type="radio" name="project_type" value="ICP" required>
                                            <span>Program Kolaborasi Industri (ICP)</span>
                                        </label>

                                        <label class="pip-radio">
                                            <input type="radio" name="project_type" value="R&D" required>
                                            <span>Penyelidikan dan Pembangunan (R&amp;D)</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="kategori">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="kategori" name="kategori" required>
                                        <option value="" selected disabled>-- Pilih Kategori --</option>
                                        <option value="Akses Pasaran">Akses Pasaran</option>
                                        <option value="R&amp;D&amp;C">R&amp;D&amp;C Penyelidikan, Pembangunan &amp;
                                            Kolaborasi</option>
                                        <option value="HCD">HCD Pembangunan Modal Insan</option>
                                        <option value="Pelaburan Langsung">Pelaburan Langsung</option>
                                        <option value="MLC">MLC Kandungan Tempatan Malaysia</option>
                                        <option value="ToT/ToK">ToT/ToK Pemindahan Teknologi / Pengetahuan</option>
                                        <option value="Lain-lain (Nyatakan)">Lain-lain (Nyatakan)</option>
                                    </select>
                                </div>




                                <div class="col-12">
                                    <label class="form-label" for="sektor">Sektor</label>
                                    <select class="form-select" id="sektor" name="sektor">
                                        <option value="Automotif Ketenteraan">Automotif Ketenteraan</option>
                                        <option value="Maritim">Maritim</option>
                                        <option value="Aeroangkasa">Aeroangkasa</option>
                                        <option value="Persenjataan &amp; Amunisi">Persenjataan &amp; Amunisi</option>
                                        <option value="Keselamatan Siber &amp; Elektromagnetik">Keselamatan Siber &amp;
                                            Elektromagnetik</option>
                                        <option value="Teknologi Baharu">Teknologi Baharu</option>
                                        <option value="Perkhidmatan Bersama / Penggunaan Bersama">Perkhidmatan Bersama /
                                            Penggunaan Bersama</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="bidang_keutamaan">Bidang Keutamaan / Teknologi</label>
                                    <select class="form-select" id="bidang_keutamaan" name="bidang_keutamaan">
                                        <option value="Satelit">Satelit</option>
                                        <option value="UCAV  (Kapal Udara Tempur Tanpa Pemandu)">UCAV (Kapal Udara Tempur
                                            Tanpa Pemandu)</option>
                                        <option value="Sistem Peluru Berpandu Loitering">Sistem Peluru Berpandu Loitering
                                        </option>
                                        <option value="(Cyber EW) Keselamatan Siber &amp; Perang Elektronik ">(Cyber EW)
                                            Keselamatan Siber &amp; Perang Elektronik </option>
                                        <option value="Amunisi – Propelan">Amunisi – Propelan</option>
                                        <option value="(AI CoE) Pusat Kecemerlangan AI ">(AI CoE) Pusat Kecemerlangan AI
                                        </option>
                                        <option value="Robotik">Robotik</option>
                                        <option value="Sistem Pertahanan Udara Laser">Sistem Pertahanan Udara Laser</option>
                                        <option value="Pautan Data Taktikal">Pautan Data Taktikal</option>
                                        <option value="Sistem Radar">Sistem Radar</option>
                                        <option value="Casis Lengkap untuk Platform Darat">Casis Lengkap untuk Platform
                                            Darat</option>
                                        <option value="Kit Munisi Berpanduan Tepat">Kit Munisi Berpanduan Tepat</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="penerangan_terperinci">Penerangan Terperinci Projek <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="penerangan_terperinci" name="penerangan_terperinci" rows="4" required></textarea>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="tugas_pencapaian_utama">Tugas dan Pencapaian Utama <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="tugas_pencapaian_utama" name="tugas_pencapaian_utama" rows="4" required></textarea>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="sasaran">Sasaran <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="sasaran" name="sasaran" rows="4" required></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="hasil_projek">Hasil Projek <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="hasil_projek" name="hasil_projek" rows="4" required></textarea>
                                    <div class="form-text">Minimum 50 aksara.</div>
                                </div>

                                <div class="col-12 col-md-8">
                                    <label class="form-label" for="tempoh_projek">TEMPOH PROJEK <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="tempoh_projek" name="tempoh_projek" rows="3" required></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="kesan_manfaat">Kesan dan Manfaat Projek kepada Malaysia
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="kesan_manfaat" name="kesan_manfaat" rows="4" required></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-between mt-4">
                            <a class="btn btn-outline-secondary" href="#">Kembali</a>
                            <button class="btn btn-primary" type="submit">HANTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
