@extends('pages.general.registrartion')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <main class="pip-profile-page">
        <!-- HERO -->
        <section class="pip-hero">
            <div class="container">
                <h1 class="pip-hero-title" data-i18n="dir_hero_title">Direktori Ekosistem Pertahanan Negara</h1>
                <p class="pip-hero-subtitle" data-i18n="dir_hero_sub">Direktori ini menghimpunkan organisasi utama ekosistem
                    industri pertahanan negara yang berdaftar sebagai Rakan Industri Pertahanan.</p>
                {{-- <img alt="Portal Rasmi Mindef" class="pip-hero-logo" src="/pip/assets/img/header-mindef.png" /> --}}
            </div>
        </section>

        <section aria-label="Penapis Direktori" class="pip-section">
            <div class="container">
                <div class="row g-3 align-items-end">
                    <div class="col-6 col-md-3 col-lg-6">
                        <label class="form-label mb-1" data-i18n="dir_filter_category">Kategori</label>
                        <select class="form-select" name="kategori_entiti" id="kategori_entiti">
                            <option selected="all" value="all" data-i18n="dir_opt_all">Semua</option>
                            <option value="local" data-i18n="dir_opt_local">Syarikat Tempatan</option>
                            <option value="royal" data-i18n="dir_opt_agency">Agensi Kerajaan</option>
                            <option value="institute" data-i18n="dir_opt_academia">Institusi Penyelidikan & Akademia
                            </option>
                            <option value="oem" data-i18n="dir_opt_oem">OEM</option>
                        </select>
                        @if (session('category'))
                            <script>
                                $(document).ready(function(e) {
                                    $("#kategori_entiti").val("{{ session('category') }}");
                                });
                            </script>
                            @endsession
                    </div>

                    <div class="col-6 col-md-3 col-lg-6">
                        <label class="form-label mb-1" data-i18n="dir_filter_sort">Susun Mengikut</label>
                        <select class="form-select" name="susun_mengikut" id="dir-sorting">
                            <option selected="" value="latest" data-i18n="dir_sort_latest">Susun Mengikut</option>
                            <option value="az">A - Z</option>
                            <option value="za">Z - A</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 col-lg" style="display: none"><label class="form-label mb-1"
                            for="dirKeyword" data-i18n="dir_filter_search">Carian</label>
                        <div class="input-group"><input class="form-control" id="dirKeyword"
                                placeholder="Contoh: siber, komunikasi, Kuala Lumpur" data-i18n-attr="placeholder"
                                data-i18n="dir_search_placeholder" type="text" /><button class="btn btn-primary"
                                id="dirSearchBtn" type="button" data-i18n="dir_search_btn">Cari</button></div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="Senarai Organisasi" class="pip-section" id="directory-result">
            @include('portal.dir-res')
        </section>
        @include('portal.dir-js')

        <script id="directory-filter-js">
            (function() {
                const input = document.getElementById('dirKeyword');
                const btn = document.getElementById('dirSearchBtn');
                if (!input || !btn) return;

                function runFilter() {
                    const q = (input.value || '').trim().toLowerCase();
                    const cards = document.querySelectorAll('section[aria-label="Senarai Organisasi"] .col-12.col-lg-6');
                    cards.forEach(card => {
                        const hay = (card.textContent || '').toLowerCase();
                        card.style.display = (!q || hay.indexOf(q) !== -1) ? '' : 'none';
                    });
                }

                btn.addEventListener('click', runFilter);
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        runFilter();
                    }
                });
            })();
        </script>
    </main>
@endsection
