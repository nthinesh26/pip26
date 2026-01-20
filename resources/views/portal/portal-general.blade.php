<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1" name="viewport" />
    <title>Lihat Cadangan | Portal Industri Pertahanan</title>

    <!-- Reuse the SAME stylesheet as userprofile -->
    <link href="/pip/assets/css/pip-profile.css" rel="stylesheet" />

    <!-- Vendor styles (keep consistent with userprofile) -->
    <link href="/pip/assets/css/vendors/cassiopeia-colors_standard.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/cassiopeia-template.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/cassiopeia-template.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/joomla-alert.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/joomla-fontawesome.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/magnific-popup.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppagebuilder.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-animate.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-color-switcher.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-dynamic-content.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
</head>

<body class="site">
    <!-- NAVBAR (same as userprofile) -->
    <header class="pip-navbar">
        <div class="pip-navbar-inner pip-navbar-inner--wide">
            @include('pip.logo')

            <nav aria-label="Menu utama" class="pip-menu">
                <ul>
                    <li class="[[NAV_ACTIVE_HOME]]"><a href="https://myip.mod.gov.my/" data-i18n="nav_home">LAMAN UTAMA</a></li>
                    <li class="[[NAV_ACTIVE_DIR]]" style="display: none;"><a href="#" data-i18n="nav_directory">DIREKTORI</a>
                    </li>
                    <li class="[[NAV_ACTIVE_ABOUT]]"><a href="https://myip.mod.gov.my/mengenai-portal" data-i18n="nav_about">MENGENAI PIP</a></li>
                    <li class="[[NAV_ACTIVE_CONTACT]]"><a href="https://myip.mod.gov.my/hubungi-kami" data-i18n="nav_contact">HUBUNGI
                            KAMI</a></li>
                </ul>
            </nav>


            <div class="pip-actions">
                <div aria-label="Bahasa" class="pip-lang" role="group">
                    <a class="active" data-lang="bm" href="#">MY</a>
                    <span aria-hidden="true">|</span>
                    <a data-lang="en" href="#">EN</a>
                </div>
                <a aria-label="Log keluar" class="pip-dash-edit pip-dash-edit--outline" href="/logout"
                    data-i18n="logout">LOGOUT</a>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- FOOTER (same as userprofile) -->
    <footer aria-label="Footer" class="pip-footer">
        <div class="pip-footer-inner">
            <div class="pip-footer-brand">
                @include('pip.fl')
            </div>
            <div class="pip-footer-links">
                <a class="pip-footer-link" href="https://myip.mod.gov.my/polisi-privasi"><span data-i18n="footer_privacy">POLISI
                        PRIVASI</span></a>
                <a class="pip-footer-link" href="[[TERMS_URL]]"><span data-i18n="footer_terms">TERMA
                        PENGGUNAAN</span></a>
                <a class="pip-footer-link" href="https://myip.mod.gov.my/hubungi-kami"><span data-i18n="footer_contact">HUBUNGI
                        KAMI</span></a>
            </div>
        </div>
    </footer>

    <!-- Optional: reuse same JS if needed -->
    <script defer src="/pip/assets/js/pip-i18n.js"></script>
    <script defer src="/pip/assets/js/pip-profile.js"></script>
    {!! $message !!}
</body>

</html>
