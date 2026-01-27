<html lang="ms">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pendaftaran Pengguna Baharu - Portal Industri Pertahanan</title>
    <style></style>

    <link rel="stylesheet" href="/pip/assets/css/vendors/pip-form.css?x=19" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/cassiopeia-colors_standard.min.css?x=55" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/cassiopeia-template.min.css?x=45" />

    <link rel="stylesheet" href="/pip/assets/css/vendors/joomla-fontawesome.min.css?x=16" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/magnific-popup.css?x=79" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppagebuilder.min.css?x=14" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-animate.min.css?x=75" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-color-switcher.min.css?x=33" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-dynamic-content.min.css?x=75" />
    <style>
        .pip-hero-logo {
            display: none !important;
        }
    </style>
    </head>

<body class="site">

    <!-- NAVBAR -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<style>
    .btn {
        --btn-padding-x: 1rem;
        --btn-padding-y: .6rem;
        --btn-font-family: ;
        --btn-font-size: 1rem;
        --btn-font-weight: 400;
        --btn-line-height: 1.5;
        --btn-color: var(--body-color);
        --btn-bg: transparent;
        --btn-border-width: var(--border-width);
        --btn-border-color: transparent;
        --btn-border-radius: .25rem;
        --btn-hover-border-color: transparent;
        --btn-box-shadow: inset 0 1px 0 #ffffff26, 0 1px 1px #00000013;
        --btn-disabled-opacity: .65;
        --btn-focus-box-shadow: 0 0 0 .25rem rgba(var(--btn-focus-shadow-rgb), .5);
        padding: var(--btn-padding-y) var(--btn-padding-x);
        font-family: var(--btn-font-family);
        font-size: var(--btn-font-size);
        color: #fff !important;
        font-weight: var(--btn-font-weight);
        line-height: var(--btn-line-height);
        color: var(--btn-color);
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        border: var(--btn-border-width) solid var(--btn-border-color);
        border-radius: var(--btn-border-radius);
        background-color: var(--btn-bg);
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        display: inline-block;
    }

    .progress-bar,
    .btn.btn-primary,
    .btn-outline-primary {
        background: #003a8f !important;
    }

    .btn-outline-secondary {
        border: 1px solid #ccc;
        color: #000 !important;
    }

    .btn-outline-secondary :hover {
        color: #fff !important;
    }
</style>

<script>
    function setValueByName(name, value, context = document) {
        $(document).ready(function(e) {
            const $elements = $(context).find('[name="' + name + '"]');
            if (!$elements.length) return;

            const tagName = $elements.prop('tagName').toLowerCase();
            const type = ($elements.attr('type') || '').toLowerCase();

            if (type === 'radio') {
                $elements.each(function() {
                    $(this).prop('checked', $(this).val() === String(value));
                });
                return;
            }

            if (type === 'checkbox') {
                if (Array.isArray(value)) {
                    $elements.each(function() {
                        $(this).prop('checked', value.includes($(this).val()));
                    });
                } else {
                    $elements.prop('checked', Boolean(value));
                }
                return;
            }

            $elements.val(value);
        });
    }
</script>

<header class="pip-navbar">
    <div class="pip-navbar-inner">
        <div class="pip-logo">
    <a class="pip-logo-link" href="/">
        <img src="/pip/assets/img/jata_negara_20x20.png" alt="Portal Industri Pertahanan" />
        Portal Industri Pertahanan<br />
        Kementerian Pertahanan Malaysia<br />
    </a>
</div>

        <nav class="pip-menu" aria-label="Menu utama">
            <ul>
                <li><a href="{{ env('JOOMLA_WEB') }}" target="_blank">Laman Utama</a></li>
                <li><a href="{{ env('JOOMLA_WEB') }}/mengenai-portal">Mengenai Portal</a></li>
                <li><a href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank">Hubungi Kami</a></li>
            </ul>
        </nav>

        <div class="pip-actions">
            <div class="pip-lang" role="group" aria-label="Bahasa">
                <a href="#" data-lang="en" id="btn-en">EN</a>
                <span aria-hidden="true">|</span>
                <a href="#" class="active" id="btn-ms" data-lang="bm">MY</a>
            </div>
                            <a href="/login" class="pip-login" target="_blank" rel="noopener">Log Masuk</a>
                    </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="vFgiqF5smxQUVrbijFl7mX8XzSxIt1SwO185Rp1o">

        <main class="pip-main">
<div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Mesej: </h1>
                <p>Maaf atas kesulitan. Sistem tidak dapat memproses permintaan anda pada masa ini.</p>

                <h3>Makluman:</h3>
                <p>Gangguan ini mungkin bersifat sementara. Tiada data pengguna terjejas.</p>

                <h3>Tindakan:</h3>
                Sila cuba semula, atau kembali ke Laman Utama. Sekiranya masalah berterusan, sila hubungi pihak pentadbir
                sistem dengan menyertakan ID rujukan di bawah.

                <h3>Butang:</h3>
                <a href="javascript:void(0)" onclick="history.back()">Kembali</a>&nbsp;&nbsp;|&nbsp;&nbsp;|&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/">Kembali</a>&nbsp;&nbsp;|&nbsp;&nbsp;|&nbsp;&nbsp;|&nbsp;&nbsp;<a
                    href="">Cuba Semula</a>
            </div>
        </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Title: </h1>
                <p>System Service Interruption.</p>

                <h3>Message:</h3>
                <p>We apologise for the inconvenience. The system is currently unable to process your request.</p>

                <h3>Notice:</h3>
                This may be a temporary interruption. No user data has been affected.
                <h3>Action: </h3>
                <p>Please try again, or return to the Home page. If the issue persists, contact the system administrator and
                    quote the reference ID below. </p>
                <h3>Buttons:</h3>
                <a href="javascript:void(0)" onclick="history.back()">Back</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/">Home&nbsp;&nbsp;</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                    href="">Retry</a>&nbsp;&nbsp;Reference ID: {{ WebTool::encode(date('ymdhis')) }}
            </div>
        </div>
    </div>
</main>
 <script>
        let x = 0;
    </script>

        <footer class="pip-footer">
    <div class="container pip-footer-inner">
        <img class="pip-footer-logo" src="/pip/assets/img/footer-logo-portal.png" alt="MINDEF">
        <a href="{{ env('JOOMLA_WEB') }}/polisi-privasi" target="_blank">
            <h3 class="pip-footer-link">POLISI PRIVASI</h3>
        </a>
        <a href="{{ env('JOOMLA_WEB') }}/terma-pengunaan" target="_blank">
            <h3 class="pip-footer-link">TERMA PENGUNAAN</h3>
        </a>
        <a href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank">
            <h3 class="pip-footer-link">HUBUNGI KAMI</h3>
        </a>
    </div>
    <div class="pip-footer-bar"></div>
</footer>








    <script src="/pip/assets/js/portal-form.js?x=846" defer></script>
    {{-- <script src="/pip/assets/js/content-dictionary-i18n.js?x=230" defer></script> --}}
    <script src="/pip/assets/js/portal-form-validation.js" defer></script>
    <script src="/pip/assets/js/portal-i18n.v1.0.js?x=505" defer></script>
    <script src="/pip/assets/js/portal-form-validation.js?x=391" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="/pip/assets/js/pip-flatpickr-init.js" defer></script>
    <script>
        $(document).ready(function(e) {
            $('input[type="date"]').val("2026-01-20");
        });
    </script>
</body>

</html>
