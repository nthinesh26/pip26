<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Portal Industri Pertahanan</title>
    <link href="/pip/assets/css/pip-login.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/cassiopeia-colors_standard.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/cassiopeia-template.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/joomla-alert.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/joomla-fontawesome.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/magnific-popup.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppagebuilder.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-animate.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-color-switcher.min.css" rel="stylesheet" />
    <link href="/pip/assets/css/vendors/sppb-dynamic-content.min.css" rel="stylesheet" />
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
</head>

<body>

    <!-- HEADER -->

    <header class="pip-navbar">
        <div class="pip-navbar-inner">
            @include('pip.logo')

            <nav class="pip-menu" aria-label="Menu utama">
                <ul>
                    <li><a href="{{ env('JOOMLA_WEB') }}" target="_blank">Laman Utama</a></li>
                    <li><a href="{{ env('JOOMLA_WEB') }}/mengenai-portal">Mengenai Portal</a></li>
                    <li><a href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank">Hubungi Kami</a></li>
                </ul>
            </nav>

            <div class="pip-actions">
                <div class="pip-lang" role="group" aria-label="Bahasa">
                    <a href="#" data-lang="en">EN</a>
                    <span aria-hidden="true">|</span>
                    <a href="#" class="active" data-lang="bm">MY</a>
                </div>
                <span aria-hidden="true"> </span>
            </div>
        </div>
    </header>

    <!-- LOGIN BOX -->

    <!-- ================= MAIN ================= -->
    <main class="pip-main pip-main--wallpaper">
        <section class="pip-section pip-login-page">
            <div class="pip-login-center">
                <div class="pip-card pip-login-card">

                    <h2 class="pip-h2">Log Masuk</h2>
                    <p class="pip-muted">Sila masukkan maklumat anda</p>
                    <form method='POST' action='/login' enctype='multipart/form-data' class="pip-login-form"
                        autocomplete="off">
                        @csrf
                        <div class="pip-form-group">
                            <label for="email">Nama Akaun / Email</label>
                            <input class="pip-input" type="text" id="email" name="email" required />
                        </div>

                        <div class="pip-form-group">
                            <label for="password">Kata Laluan</label>
                            <div class="pip-input-wrap">
                                <input class="pip-input" type="password" id="password" name="password" required />
                            </div>
                        </div>

                        <button type="submit" class="pip-btn-primary">Log Masuk</button>

                        <div class="pip-login-links">
                            <a href="/forgot-password">Lupa Kata Laluan?</a>
                            <span aria-hidden="true">|</span>
                            <a href="{{ env('JOOMLA_WEB') }}/daftar-organisasi"  id="reg" target="_blank">Daftar</a>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {!! session('status') !!}
                            </div>
                        @endif
                        @if ($errors->any())
                            <ul style="margin-top: 10px !important">
                                @foreach ($errors->all() as $error)
                                    <li style="color: red !important; list-style: none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                    </form>

                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="pip-footer">
        <div class="container pip-footer-inner">
            @include('pip.fl')
            <a class="pip-footer-link" href="{{ env('JOOMLA_WEB') }}/polisi-privasi"><span data-i18n="footer_privacy">POLISI PRIVASI</span></a>
            <a class="pip-footer-link" href="javascript:void(0)"><span data-i18n="footer_terms">TERMA PENGGUNAAN</span></a>
            <a class="pip-footer-link" href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank" data-i18n="nav_contact">HUBUNGI KAMI</a>
        </div>
        <div class="pip-footer-bar"></div>
    </footer>


    <script src="/pip/assets/js/portal-form.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/content-dictionary-i18n.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/portal-i18n.v1.0.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/portal-form-validation.js?x={{ rand(111, 999) }}" defer></script>

    <script>
            $(document).ready(function(e){
                if($("#reg").html() == "Daftar")
                    $("#reg").attr('href', '{{ env('JOOMLA_WEB') }}/daftar-organisasi');
                else
                    $("#reg").attr('href', '{{ env('JOOMLA_WEB') }}/register-organization');
            });

            document.addEventListener("click", function (e) {
              const btn = e.target && e.target.closest ? e.target.closest("[data-lang],[data-lang-switch]") : null;
              if (!btn) return;

              const v = (btn.getAttribute("data-lang") || btn.getAttribute("data-lang-switch") || "").toLowerCase();

              if(v == 'en')
                $("#reg").attr('href', '{{ env('JOOMLA_WEB') }}/register-organization');
              else
                $("#reg").attr('href', '{{ env('JOOMLA_WEB') }}/daftar-organisasi');
              e.preventDefault();
              //setLanguage(v);
        });

    </script>

</body>

</html>
