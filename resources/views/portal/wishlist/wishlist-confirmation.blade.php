@extends('portal.portal-general')

@section('content')
    <main class="pip-profile-page">
        <!-- BANNER (same pattern as userprofile) -->
        <section aria-label="Banner cadangan" class="pip-profile-banner-wrap">
            <div aria-label="Banner cadangan" class="pip-profile-banner" role="img"
                style="background-image:url('/pip/assets/img/userProfileBanner.png');"></div>
        </section>

        <!-- CONTENT STRIP -->
        <section class="pip-dash-wrap pip-dash-wrap--mock">
            <div class="pip-dash-container">

                <!-- Page header -->
                <div class="pip-dash-head pip-dash-head--mock">
                    <div class="pip-dash-head-left">
                        <h2 class="pip-dash-title pip-dash-title--bm" data-i18n="wishlist_view_title">Lihat Cadangan</h2>
                        <p class="pip-dash-sub" data-i18n="wishlist_view_sub">
                            Paparan penuh maklumat cadangan berdasarkan input pengguna.
                        </p>
                    </div>

                    <div class="pip-dash-head-right" data-i18n="box_wishlist_title">
                        {{-- <a class="pip-dash-edit pip-dash-edit--outline" href="javascript:void(0)" data-i18n="btn_back"
                            onclick="window.history.back();">KEMBALI</a> --}}
                    </div>
                </div>

                <!-- Single column layout -->
                <div class="pip-dash-grid pip-dash-grid--mock" style="grid-template-columns: 1fr;">
                    <div class="pip-dash-col">

                        <!-- Expanded Wishlist Card -->
                        <section class="pip-box pip-box--wishlist" id="pipWishlistView">
                            <div class="pip-box-head"
                                style="display:flex; justify-content:space-between; align-items:center;">
                                <h3 class="pip-box-title" data-i18n="box_wishlist_title">Cadangan Wishlist</h3>

                                <!-- Optional: show proposal number at header right (small) -->
                                <div style="text-align:right;">
                                    <div class="pip-wc-label" style="margin:0;" data-i18n="wishlist_refno">NOMBOR CADANGAN</div>
                                    <div class="pip-wc-value" style="font-size:13px;">{{ $wishilist->wishListID() }}</div>
                                </div>
                            </div>

                            <div class="pip-box-body">
                                <div class="pip-wishlist-card">

                                    <!-- Top meta -->
                                    <div class="pip-wc-top">
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label" data-i18n="wishlist_company">NAMA SYARIKAT</div>
                                            @php
                                                $com = auth()->user()->companyName();
                                            @endphp
                                            <div class="pip-wc-value">{{ auth()->user()->profile()->$com }}</div>
                                        </div>

                                        <div class="pip-wc-field pip-wc-field--right">
                                            <div class="pip-wc-label" data-i18n="wishlist_project_type">JENIS CADANGAN PROJEK</div>
                                            <div class="pip-wc-value">{!! $wishilist->project_type == 'RD' ? 'R&amp;D' : 'ICP' !!}</div>
                                        </div>
                                    </div>

                                    <!-- Pills + tempoh -->
                                    <div class="pip-wc-meta">
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label" data-i18n="wishlist_category">KATEGORI</div>
                                            <span class="pip-pill pip-pill--kategori">{{ $wishilist->category }}</span>
                                            <!-- Optional if kategori = "Lain-lain (Nyatakan)" -->
                                            <!-- <div class="pip-wc-value" style="margin-top:6px;">[kategori_lain_FROM_DB]</div> -->
                                        </div>

                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label" data-i18n="wishlist_sector">SEKTOR</div>
                                            <span class="pip-pill pip-pill--sektor">{{ $wishilist->sector }}</span>
                                        </div>

                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label" data-i18n="wishlist_priority">BIDANG KEUTAMAAN</div>
                                            <span class="pip-pill pip-pill--bidang">{{ $wishilist->technology }}</span>
                                        </div>

                                        <div class="pip-wc-field pip-wc-field--tempoh">
                                            <div class="pip-wc-label" data-i18n="wishlist_duration">TEMPOH PROJEK</div>
                                            <div class="pip-wc-value">{{ $wishilist->duration }}</div>
                                        </div>
                                    </div>

                                    <!-- Expanded sections -->
                                    <h4 class="pip-wc-subtitle" data-i18n="wishlist_desc_title">Penerangan Terperinci Projek</h4>
                                    <div class="pip-wc-desc">
                                        {{ $wishilist->description }}
                                    </div>

                                    <h4 class="pip-wc-subtitle" data-i18n="wishlist_tasks_title">Tugas dan Pencapaian Utama</h4>
                                    <div class="pip-wc-desc">
                                       {{ $wishilist->tasks }}
                                    </div>

                                    <h4 class="pip-wc-subtitle" data-i18n="wishlist_target_title">Sasaran</h4>
                                    <div class="pip-wc-desc">
                                        {{ $wishilist->target }}
                                    </div>

                                    <h4 class="pip-wc-subtitle" data-i18n="wishlist_output_title">Hasil Projek</h4>
                                    <div class="pip-wc-desc">
                                        {{ $wishilist->results }}
                                    </div>

                                    <h4 class="pip-wc-subtitle" data-i18n="wishlist_impact_title">Kesan dan Manfaat Projek kepada Malaysia</h4>
                                    <div class="pip-wc-desc">
                                        {{ $wishilist->benefits }}
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
