<!DOCTYPE html>
<!-- saved from url=(0073)/pip/UserProfile-SyarikatTempatan.html -->
<html lang="ms">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>Profil Organisasi (Syarikat Tempatan)</title>
    <link href="/pip/assets/css/pip-profile.css" rel="stylesheet">
    <!-- Vendor styles (keep) -->
    <link href="/pip/assets/css/vendors/cassiopeia-colors_standard.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/cassiopeia-template.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/cassiopeia-template.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/joomla-alert.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/joomla-fontawesome.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/magnific-popup.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/sppagebuilder.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/sppb-animate.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/sppb-color-switcher.min.css" rel="stylesheet">
    <link href="/pip/assets/css/vendors/sppb-dynamic-content.min.css" rel="stylesheet">
</head>

<body data-icp-role="none" data-org-status="terhad">
    <!-- DEV ONLY: STATUS TOGGLE (remove in production) -->
    <div aria-label="Dev status toggle" class="pip-dev-toggle">
        <span>DEV VIEW:</span>
        <button data-state="terhad" type="button">MAKLUMAT ASAS</button>
        <button data-state="rakanip" type="button">RAKAN IP</button>
        <span class="pip-dev-sep">|</span>
        <span>ICP ROLE:</span>
        <button data-icp="none" type="button">NONE</button>
        <button data-icp="provider" type="button">PROVIDER</button>
        <button data-icp="recipient" type="button">RECIPIENT</button>
        <button data-icp="both" type="button">BOTH</button>
    </div>
    <header class="pip-navbar">
        <div class="pip-navbar-inner pip-navbar-inner--wide">
            <div class="pip-logo">
                <a class="pip-logo-link" href="/pip/%7B%7BHOME_URL%7D%7D">
                    <img alt="Portal Industri Pertahanan" src="/pip/assets/img/LogoArrowDown.png">
                    <span translate="no">Portal Industri Pertahanan</span>
                </a>
            </div>
            <nav aria-label="Menu utama" class="pip-menu pip-menu--mock">
                <ul>
                    <li class=""><a href="/pip/%7B%7BHOME_URL%7D%7D">LAMAN UTAMA</a></li>
                    <li class=""><a href="/pip/%7B%7BDIRECTORY_URL%7D%7D">DIREKTORI</a></li>
                    <li class=""><a href="/pip/%7B%7BABOUT_URL%7D%7D">MENGENAI PIP</a></li>
                    <li class=""><a href="/pip/%7B%7BCONTACT_URL%7D%7D">HUBUNGI KAMI</a></li>
                </ul>
            </nav>
            <div class="pip-actions pip-actions--mock">
                <div aria-label="Bahasa" class="pip-lang pip-lang--mock" role="group">
                    <a class="active" data-lang="bm" href="/pip/UserProfile-SyarikatTempatan.html#">BM</a>
                    <span aria-hidden="true">|</span>
                    <a data-lang="en" href="/pip/UserProfile-SyarikatTempatan.html#">EN</a>
                </div>
                <a aria-label="Log keluar" class="pip-dash-edit pip-dash-edit--outline"
                    href="/pip/%7B%7BLOGOUT_URL%7D%7D">LOGOUT</a>
            </div>
        </div>
    </header>
    <main class="pip-profile-page">
        <section aria-label="Banner organisasi" class="pip-profile-banner-wrap">
            <div aria-label="Banner organisasi" class="pip-profile-banner" role="img"
                style="background-image:url(&#39;assets/img/userProfileBanner.png&#39;);"></div>
        </section>
        <section aria-label="Profil Organisasi" class="pip-profile-wrap">
            <div class="pip-profile-card">
                <div class="pip-profile-body">
                    <div class="pip-profile-avatar">
                        <img alt="Logo Organisasi" src="/pip/assets/img/userProfileBotak.png">
                        <button class="pip-avatar-edit pip-avatar-edit--overlay" id="pipAvatarEditBtn" type="button"
                            aria-label="Edit Profile">
                            <span class="pip-avatar-edit__label" aria-hidden="true">Edit Profile</span>
                        </button>
                    </div>
                    <div class="pip-profile-row">
                        <div class="pip-profile-info">
                            <div class="pip-profile-title">
                                <h1 class="pip-profile-name"></h1>
                                <!-- TERHAD and RAKAN IP badge -->
                                <span class="pip-profile-badge" data-badge="terhad">MAKLUMAT ASAS</span>
                                <span class="pip-profile-badge pip-profile-badge--full" data-badge="rakanip">RAKAN
                                    IP</span>
                            </div>

                            <p class="pip-profile-desc"></p>
                            IF form_type = "syarikat_tempatan"
                            ENTITY_TYPE_DISPLAY = "Syarikat Tempatan"
                            ELSE IF form_type = "oem"
                            ENTITY_TYPE_DISPLAY = "OEM"
                            ELSE IF form_type = "akademia"
                            ENTITY_TYPE_DISPLAY = "Institusi Penyelidikan &amp; Akademia"
                            ELSE IF form_type = "agensi"
                            ENTITY_TYPE_DISPLAY = "Agensi Kerajaan"
                            <p></p>
                            <p class="pip-profile-desc">
                                ,
                            </p>
                        </div>
                        <div class="pip-profile-actions">
                            <div class="pip-profile-actions-inner">
                                <button class="pip-profile-btn" data-access="" data-href="" data-lock-mode="never"
                                    id="pipProfileBtn" type="button">
                                    <span class="pip-profile-btn-text">ISI CADANGAN PROJEK ICP ATAU R&amp;D</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section aria-label="Dashboard pengguna" class="pip-dash-wrap pip-dash-wrap--mock">
            <div class="pip-dash-container">
                <div class="pip-dash-head pip-dash-head--mock">
                    <div class="pip-dash-head-left">
                        <h2 class="pip-dash-title pip-dash-title--bm">

                        </h2>
                        <p class="pip-dash-sub" id="pipDashMessage">
                            Tahniah! Profil organisasi anda telah lengkap dan kini mempunyai akses penuh ke Portal
                            Industri Pertahanan.
                        </p>
                    </div>
                    <div class="pip-dash-head-right">
                    </div>
                </div>
                <div class="pip-dash-grid pip-dash-grid--mock">
                    <!-- LEFT COLUMN -->
                    <div class="pip-dash-col">
                        <section class="pip-box pip-box--status" data-show-for="terhad" id="pipBoxStatusProfile">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title">Status Profil</h3>
                            </div>
                            <div class="pip-box-body">
                                <p class="pip-box-muted">
                                    Sila lengkapkan profil organisasi anda untuk mengakses ekosistem pertahanan penuh.
                                </p>
                                <!--
      NOTE FOR BACKEND:
      Percentage below (30%) is a DEFAULT UI value.
      Actual percentage MUST be calculated based on:
      (Completed Maklumat Lengkap forms / Total required forms for entity) * 100
          -->
                                <!-- Progress -->
                                <div class="pip-status-progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="30"
                                        class="pip-status-progress-bar" role="progressbar">
                                        <div class="pip-status-progress-fill" style="width:30%;"></div>
                                    </div>
                                    <div class="pip-status-progress-pill">
                                        30% LENGKAP
                                    </div>
                                </div>
                                <!-- Status list (ONLY 2 ROWS FOR TERHAD) -->
                                <ul class="pip-status-list">
                                    <!-- DONE -->
                                    <li class="pip-status-item is-done">
                                        <span aria-hidden="true" class="pip-ico pip-ico--done">
                                            <!-- check circle -->
                                            <svg height="18" viewBox="0 0 24 24" width="18">
                                                <path
                                                    d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm-1.2 14.2-3.2-3.2 1.4-1.4 1.8 1.8 4.6-4.6 1.4 1.4-6 6Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>Pendaftaran dan Maklumat Asas</span>
                                    </li>
                                    <!-- NOT DONE -->
                                    <li class="pip-status-item is-warn">
                                        <span aria-hidden="true" class="pip-ico pip-ico--warn">
                                            <!-- x circle -->
                                            <svg height="18" viewBox="0 0 24 24" width="18">
                                                <path
                                                    d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm3.6 13.2-1.4 1.4L12 13.4l-2.2 2.2-1.4-1.4 2.2-2.2-2.2-2.2 1.4-1.4L12 10.6l2.2-2.2 1.4 1.4-2.2 2.2 2.2 2.2Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>Profil dan Keupayaan Syarikat</span>
                                    </li>
                                </ul>
                                <!-- CTA -->
                                <div class="pip-status-cta">
                                    <a class="pip-btn-primary" href="/pip/%7B%7BCOMPLETE_PROFILE_URL%7D%7D">
                                        LENGKAPKAN MAKLUMAT
                                    </a>
                                </div>
                            </div>
                        </section>
                        <!-- Bidang Kepakaran (Status Profil card removed for RAKAN IP) -->
                        <section class="pip-box" id="pipBoxExpertise">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title">Bidang Kepakaran</h3>
                            </div>
                            <div class="pip-box-body">
                                <div class="pip-pill">Syarikat Tempatan)_from_db}}</div>
                                <!-- It is possible to have multiple tags, backend can render more pills here -->
                                <!--  -->
                            </div>
                        </section>
                        <!-- Gambaran Keseluruhan -->
                        <section class="pip-box" id="pipBoxOverview">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title">Gambaran Keseluruhan Syarikat</h3>
                            </div>
                            <div class="pip-box-body">
                                <p class="pip-overview-text">
                                    yarikatTempatan_FROM_DB}}
                                </p>
                            </div>
                        </section>
                        <!-- Program Kolaborasi Industri Pertahanan (RAKAN IP only) -->
                        <section class="pip-box pip-box--icp" data-show-for="rakanip" id="pipBoxICP"
                            style="display: none;">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title">Program Kolaborasi Industri Pertahanan</h3>
                            </div>
                            <div class="pip-box-body">
                                <!--
      BACKEND NOTE:
      Source data comes from Maklumat Lengkap (Program Kolaborasi Industri) page 3 of Syarikat Tempatan Form:

      - icp_provider_status (Ya/Tidak) + icp_provider_payload (JSON array)
      - icp_recipient_status (Ya/Tidak) + icp_recipient_payload (JSON array)

      Suggested backend mapping:
      - If provider payload length > 0 => role includes "provider"
      - If recipient payload length > 0 => role includes "recipient"

      Then set ONE of these:
      body[data-icp-role="none|provider|recipient|both"]
      OR render flags below:
      , , ,
        -->
                                <!-- NONE -->
                                <div class="pip-icp-empty" data-show-role="none">
                                    Tiada Rekod Program Kolaborasi Industri Pertahanan
                                </div>
                                <!-- PROVIDER -->
                                <div class="pip-icp-section" data-show-role="provider">
                                    <div class="pip-icp-head">
                                        <span class="pip-icp-badge pip-icp-badge--provider">ICP PROVIDER</span>
                                    </div>
                                    <!--
        BACKEND NOTE:
        Render provider items from icp_provider_payload (JSON array):
        [{ icp_name, contract, start_year, end_year }, ...]
    -->
                                    <ul class="pip-icp-list">
                                        <!-- Example row (repeat) -->
                                        <li class="pip-icp-item">
                                            <div class="pip-icp-title"></div>
                                            <div class="pip-icp-meta">
                                                <span>Kontrak: </span>
                                                <span>Tahun: - </span>
                                            </div>
                                        </li>
                                        <!--  -->
                                    </ul>
                                </div>
                                <!-- RECIPIENT -->
                                <div class="pip-icp-section" data-show-role="recipient">
                                    <div class="pip-icp-head">
                                        <span class="pip-icp-badge pip-icp-badge--recipient">ICP RECIPIENT</span>
                                    </div>
                                    <!--
              BACKEND NOTE:
              Render recipient items from icp_recipient_payload (JSON array):
              [{ icp_name, contract, start_year, end_year, provider_name }, ...]
    -->
                                    <ul class="pip-icp-list">
                                        <!-- Example row (repeat) -->
                                        <li class="pip-icp-item">
                                            <div class="pip-icp-title"></div>
                                            <div class="pip-icp-meta">
                                                <span>Kontrak: </span>
                                                <span>Tahun: - </span>
                                                <span>Penyedia: </span>
                                            </div>
                                        </li>
                                        <!--  -->
                                    </ul>
                                </div>
                                <!-- If BOTH, show both sections above (handled by CSS/JS via data-icp-role="both") -->
                            </div>
                        </section>
                        <!-- Cadangan Wishlist (always show; if none, show Tiada cadangan) -->
                        <section class="pip-box pip-box--wishlist" data-show-for="rakanip" id="pipBoxWishlist">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title">Cadangan Wishlist</h3>
                            </div>
                            <div class="pip-box-body">
                                <!--
                BACKEND NOTE:
                If wishlist exists -> render card fields and description.
                If no wishlist -> render "Tiada cadangan".
      -->
                                <div class="pip-wishlist-empty" data-show="">
                                    Tiada cadangan buat masa ini.
                                </div>
                                <div class="pip-wishlist-card" data-show="">
                                    <!-- Top meta -->
                                    <div class="pip-wc-top">
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label">NAMA SYARIKAT</div>
                                            <div class="pip-wc-value"></div>
                                        </div>
                                        <div class="pip-wc-field pip-wc-field--right">
                                            <div class="pip-wc-label">NOMBOR CADANGAN</div>
                                            <div class="pip-wc-value"></div>
                                        </div>
                                    </div>
                                    <!-- Pills + tempoh -->
                                    <div class="pip-wc-meta">
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label">KATEGORI</div>
                                            <span class="pip-pill pip-pill--kategori"></span>
                                        </div>
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label">SEKTOR</div>
                                            <span class="pip-pill pip-pill--sektor"></span>
                                        </div>
                                        <div class="pip-wc-field">
                                            <div class="pip-wc-label">BIDANG KEUTAMAAN</div>
                                            <span class="pip-pill pip-pill--bidang"></span>
                                        </div>
                                        <div class="pip-wc-field pip-wc-field--tempoh">
                                            <div class="pip-wc-label">TEMPOH PROJEK</div>
                                            <div class="pip-wc-value"></div>
                                        </div>
                                    </div>
                                    <h4 class="pip-wc-subtitle">Penerangan Terperinci Projek</h4>
                                    <div class="pip-wc-desc">

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- RIGHT COLUMN -->
                    <div class="pip-dash-col">
                        <!-- Maklumat Organisasi (UNCHANGED from TERHAD) -->
                        <section class="pip-box" id="pipBoxOrgDetails">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title pip-box-title--right">Maklumat Organisasi</h3>
                            </div>
                            <div class="pip-box-body">
                                <div class="pip-orgmeta">
                                    <div class="pip-orgmeta-row">
                                        <div class="pip-orgmeta-label">NAMA SYARIKAT</div>
                                        <div class="pip-orgmeta-value">
                                            <div class="pip-orgmeta-strong"></div>
                                        </div>
                                    </div>
                                    <div class="pip-orgmeta-row">
                                        <div class="pip-orgmeta-label">NO PENDAFTARAN SSM</div>
                                        <div class="pip-orgmeta-value"></div>
                                    </div>
                                    <div class="pip-orgmeta-row">
                                        <div class="pip-orgmeta-label">TARIKH DITUBUHKAN</div>
                                        <div class="pip-orgmeta-value"></div>
                                    </div>
                                    <div class="pip-orgmeta-row">
                                        <div class="pip-orgmeta-label">JENIS SYARIKAT</div>
                                        <div class="pip-orgmeta-value"></div>
                                    </div>
                                    <div class="pip-orgmeta-row">
                                        <div class="pip-orgmeta-label">STATUS PEMILIKAN</div>
                                        <div class="pip-orgmeta-value"></div>
                                    </div>
                                    <hr class="pip-orgmeta-divider">
                                    <!-- Contact icons (SVG) -->
                                    <div class="pip-orgmeta-contact">
                                        <div class="pip-orgmeta-contact-item">
                                            <span aria-hidden="true" class="pip-ico pip-ico--muted">
                                                <svg height="18" viewBox="0 0 24 24" width="18">
                                                    <path
                                                        d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="pip-orgmeta-contact-text"><span
                                                    class="pip-orgmeta-contact-text">yarikatTempatan)_FROM_DB}}
                                                    yarikatTempatan)_FROM_DB}} <br> yarikatTempatan)_FROM_DB}}
                                                    yarikatTempatan)_FROM_DB}} <br>yarikatTempatan)_FROM_DB}} <br>
                                                    Telefon Syarikat_FROM_DB}}</span></span>
                                        </div>

                                        <div class="pip-orgmeta-contact-item">
                                            <span aria-hidden="true" class="pip-ico pip-ico--muted">
                                                <svg height="18" viewBox="0 0 24 24" width="18">
                                                    <path
                                                        d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm6.93 9H15.7a15.9 15.9 0 0 0-1.08-6.02A8.02 8.02 0 0 1 18.93 11ZM12 4c.9 1.29 1.63 3.72 1.86 7H10.14C10.37 7.72 11.1 5.29 12 4ZM5.07 13h3.23c.18 2.18.63 4.12 1.31 5.55A8.02 8.02 0 0 1 5.07 13Zm3.23-2H5.07a8.02 8.02 0 0 1 4.54-6.02A15.9 15.9 0 0 0 8.3 11ZM12 20c-.9-1.29-1.63-3.72-1.86-7h3.72c-.23 3.28-.96 5.71-1.86 7Zm2.39-1.45c.68-1.43 1.13-3.37 1.31-5.55h3.23a8.02 8.02 0 0 1-4.54 5.55ZM15.7 13c.12-1.02.2-2.08.22-3H19a8.15 8.15 0 0 1 0 6h-3.3ZM8.3 13H5a8.15 8.15 0 0 1 0-6h3.52c.02.92.1 1.98.22 3Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="pip-orgmeta-contact-text">yarikat Tempatan)_FROM_DB}}</span>
                                        </div>


                                        <div class="pip-orgmeta-contact-item">
                                            <span aria-hidden="true" class="pip-ico pip-ico--muted">
                                                <svg height="18" viewBox="0 0 24 24" width="18">
                                                    <path
                                                        d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="pip-orgmeta-contact-text"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Dokumen Muat Turun -->
                        <section class="pip-box pip-box--docs" data-show-for="rakanip" id="pipBoxDocs">
                            <div class="pip-box-head">
                                <h3 class="pip-box-title pip-box-title--right">Dokumen Muat Turun</h3>
                            </div>
                            <div class="pip-box-body">
                                <ul class="pip-doc-list">
                                    <li class="pip-doc-item">
                                        <a class="pip-doc-link" href="/pip/%7B%7BDOC_PROFIL_SYARIKAT_URL%7D%7D"
                                            rel="noopener" target="_blank">

                                        </a>
                                    </li>
                                    <li class="pip-doc-item">
                                        <a class="pip-doc-link" href="/pip/%7B%7BDOC_ISO27001_URL%7D%7D"
                                            rel="noopener" target="_blank">

                                        </a>
                                    </li>
                                </ul>
                                <!-- Optional: if no docs -->
                                <div class="pip-doc-empty" data-show="">
                                    Tiada dokumen dimuat naik.
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer aria-label="Footer" class="pip-footer pip-footer--mock">
        <div class="pip-footer-inner pip-footer-inner--mock">
            <div class="pip-footer-brand">
                @include('pip.fl')
            </div>
            <div class="pip-footer-links">
                <a class="pip-footer-link" href="/pip/%7B%7BPRIVACY_URL%7D%7D">POLISI PRIVASI</a>
                <a class="pip-footer-link" href="/pip/%7B%7BTERMS_URL%7D%7D">TERMA PENGGUNAAN</a>
                <a class="pip-footer-link" href="/pip/%7B%7BCONTACT_URL%7D%7D">HUBUNGI KAMI</a>
            </div>
        </div>
    </footer>
    <script defer="" src="/pip/assets/js/pip-profile.js"></script>
    <script>
        // DEV ONLY: Toggle TERHAD / RAKAN IP preview + ICP role
        (function() {
            const wrap = document.querySelector(".pip-dev-toggle");
            if (!wrap) return;

            wrap.addEventListener("click", function(e) {
                const statusBtn = e.target.closest("button[data-state]");
                if (statusBtn) {
                    document.body.setAttribute("data-org-status", statusBtn.dataset.state);
                    return;
                }

                const icpBtn = e.target.closest("button[data-icp]");
                if (icpBtn) {
                    document.body.setAttribute("data-icp-role", icpBtn.dataset.icp);
                }
            });
        })();
    </script>
    <script>
        // ICP Role visibility (Recipient/Provider/Both/None)
        (function() {
            const icpBox = document.getElementById("pipBoxICP");
            if (!icpBox) return;

            function isTruthy(v) {
                return String(v || "").trim() === "1" || String(v || "").toLowerCase() === "true";
            }

            function syncICP() {
                const isRakanIP = document.body.getAttribute("data-org-status") === "rakanip";
                if (!isRakanIP) {
                    icpBox.style.display = "none";
                    return;
                }

                const isRecipient = isTruthy(icpBox.dataset.icpRecipient);
                const isProvider = isTruthy(icpBox.dataset.icpProvider);

                const recipientEl = icpBox.querySelector('[data-icp-role="recipient"]');
                const providerEl = icpBox.querySelector('[data-icp-role="provider"]');

                if (recipientEl) recipientEl.style.display = isRecipient ? "" : "none";
                if (providerEl) providerEl.style.display = isProvider ? "" : "none";

                // If none selected, hide whole card
                icpBox.style.display = (isRecipient || isProvider) ? "" : "none";
            }

            // Run once on load
            syncICP();

            // If you use DEV toggle, re-run on state change
            const devToggle = document.querySelector(".pip-dev-toggle");
            if (devToggle) {
                devToggle.addEventListener("click", function() {
                    // small delay so body attribute updates first
                    setTimeout(syncICP, 0);
                });
            }
        })();
    </script>
    <div aria-hidden="true" aria-labelledby="pipAvatarModalTitle" aria-modal="true" class="pip-modal"
        id="pipAvatarModal" role="dialog">
        <div class="pip-modal__backdrop" data-pip-close="true"></div>
        <div class="pip-modal__dialog" role="document">
            <div class="pip-modal__header">
                <h3 class="pip-modal__title" id="pipAvatarModalTitle">Kemaskini Gambar Profil</h3>
                <button aria-label="Tutup" class="pip-modal__close" data-pip-close="true" type="button">×</button>
            </div>
            <form action="/pip/UserProfile-SyarikatTempatan.html#" class="pip-modal__body"
                enctype="multipart/form-data" method="post" novalidate="">
                <p class="pip-muted mb-2">Muat naik imej logo/profil baharu. Format dibenarkan: JPG, PNG. Saiz
                    maksimum: 1MB.</p>
                <div class="pip-avatar-uploader">
                    <div class="pip-avatar-uploader__preview">
                        <img alt="Pratonton gambar profil" id="pipAvatarPreview"
                            src="/pip/assets/img/userProfileBotak.png">
                    </div>
                    <div class="pip-avatar-uploader__controls">
                        <label class="form-label" for="profile_image_upload">Pilih fail</label>
                        <input accept="image/png,image/jpeg" class="form-control" id="profile_image_upload"
                            name="profile_image_upload" type="file">
                        <div class="form-text">Pastikan imej jelas dan berlatar belakang sesuai.</div>
                        <div class="pip-error mt-2" id="pipAvatarUploadError" style="display:none;"></div>
                    </div>
                </div>
                <div class="pip-modal__footer">
                    <button class="btn btn-outline-secondary" data-pip-close="true" type="button">Batal</button>
                    <button class="btn btn-primary" type="submit">Muat Naik</button>
                </div>
            </form>
        </div>
    </div>
    <script id="pipAvatarInlineScript">
        (function() {
            "use strict";
            var openBtn = document.getElementById("pipAvatarEditBtn");
            var modal = document.getElementById("pipAvatarModal");
            if (!openBtn || !modal) return;

            var fileInput = document.getElementById("profile_image_upload");
            var previewImg = document.getElementById("pipAvatarPreview");
            var errBox = document.getElementById("pipAvatarUploadError");
            var MAX_MB = 5;

            function showError(msg) {
                if (!errBox) return;
                errBox.textContent = msg;
                errBox.style.display = msg ? "block" : "none";
            }

            function openModal() {
                modal.setAttribute("aria-hidden", "false");
                document.documentElement.style.overflow = "hidden";
                showError("");
                // reset input value (so choosing same file triggers change)
                if (fileInput) fileInput.value = "";
            }

            function closeModal() {
                modal.setAttribute("aria-hidden", "true");
                document.documentElement.style.overflow = "";
                showError("");
            }

            openBtn.addEventListener("click", openModal);

            modal.addEventListener("click", function(e) {
                var t = e.target;
                if (t && t.getAttribute("data-pip-close") === "true") closeModal();
            });

            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape" && modal.getAttribute("aria-hidden") === "false") closeModal();
            });

            if (fileInput) {
                fileInput.addEventListener("change", function() {
                    showError("");
                    var file = fileInput.files && fileInput.files[0];
                    if (!file) return;

                    var isOkType = /image\/(jpeg|png)/i.test(file.type);
                    if (!isOkType) {
                        showError("Format fail tidak dibenarkan. Sila pilih JPG atau PNG.");
                        fileInput.value = "";
                        return;
                    }

                    var maxBytes = MAX_MB * 1024 * 1024;
                    if (file.size > maxBytes) {
                        showError("Saiz fail melebihi had " + MAX_MB + "MB.");
                        fileInput.value = "";
                        return;
                    }

                    // Preview
                    var reader = new FileReader();
                    reader.onload = function(evt) {
                        if (previewImg && evt && evt.target) previewImg.src = evt.target.result;
                    };
                    reader.readAsDataURL(file);
                });
            }
        })();
    </script>
</body>

</html>
