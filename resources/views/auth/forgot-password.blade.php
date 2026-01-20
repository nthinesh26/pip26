<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title data-i18n="reset_email_page_title">Tetapkan semula kata laluan | Portal Industri Pertahanan</title>

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

    <style>
        .pip-error {
            margin-top: 8px;
            font-size: 0.92rem;
            line-height: 1.3;
            color: #dc3545;
        }

        .pip-input.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .15);
        }
    </style>
</head>

<body>

    <header class="pip-navbar">
        <div class="pip-navbar-inner">
            @include('pip.logo')

            <nav class="pip-menu" aria-label="Menu utama">
                  <ul>
                <li><a href="https://myip.mod.gov.my" target="_blank">Laman Utama</a></li>
                <li><a href="https://myip.mod.gov.my/mengenai-portal">Mengenai Portal</a></li>
                <li><a href="https://myip.mod.gov.my/hubungi-kami" target="_blank">Hubungi Kami</a></li>
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

    <main class="pip-main pip-main--wallpaper">
        <section class="pip-section pip-login-page">
            <div class="pip-login-center">
                <div class="pip-card pip-login-card">

                    <h3 class="pip-h2" data-i18n="reset_email_h1">Lupa Kata Laluan</h3>
                    <p class="pip-muted" data-i18n="reset_email_subtitle">Sila masukkan maklumat berikut</p>

                    <form action="/pip/forgot-password" method="post" autocomplete="off" class="pip-login-form"
                        novalidate>
                        @csrf

                        <div class="pip-form-group">
                            <label for="email" data-i18n="reset_email_email_label">Emel</label>
                            <input class="pip-input" type="email" id="email" name="email" inputmode="email"
                                autocomplete="email" spellcheck="false" aria-describedby="emailHelp emailError"
                                required />
                        </div>

                        <small id="emailHelp" class="pip-muted" data-i18n="reset_email_email_help">Contoh:
                            nama@domain.com</small>
                        <div id="emailError" class="pip-error" role="alert" aria-live="polite" style="display:none;">
                        </div>

                        <button type="submit" class="pip-btn-primary" id="submitBtn"
                            data-i18n="reset_email_submit">Hantar</button>
                    </form>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
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
                <a class="pip-footer-link" href="https://myip.mod.gov.my/polisi-privasi"><span data-i18n="footer_privacy">POLISI PRIVASI</span></a>
                <a class="pip-footer-link" href="javascript:void(0)"><span data-i18n="footer_terms">TERMA PENGGUNAAN</span></a>
                <a class="pip-footer-link" href="https://myip.mod.gov.my/hubungi-kami" target="_blank" data-i18n="nav_contact">HUBUNGI KAMI</a>
            </div>
        </div>
    </footer>

    <script defer src="/pip/assets/js/pip-i18n.js"></script>

    <script>
        (function() {
            'use strict';

            const form = document.querySelector('.pip-login-form');
            if (!form) return;

            const emailInput = document.getElementById('email');
            const errorEl = document.getElementById('emailError');
            const submitBtn = document.getElementById('submitBtn');

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

            function t(key, fallback) {
                if (window.PIP_I18N && typeof window.PIP_I18N.t === 'function') return window.PIP_I18N.t(key, fallback);
                return fallback || key;
            }

            function setError(message) {
                if (!errorEl) return;
                if (message) {
                    errorEl.textContent = message;
                    errorEl.style.display = 'block';
                    emailInput.classList.add('is-invalid');
                    emailInput.setAttribute('aria-invalid', 'true');
                    if (submitBtn) submitBtn.disabled = true;
                } else {
                    errorEl.textContent = '';
                    errorEl.style.display = 'none';
                    emailInput.classList.remove('is-invalid');
                    emailInput.removeAttribute('aria-invalid');
                    if (submitBtn) submitBtn.disabled = false;
                }
            }

            function validateEmail() {
                const value = (emailInput.value || '').trim();

                if (!value) {
                    setError(t('reset_email_err_required', 'Sila masukkan alamat emel.'));
                    return false;
                }

                if (emailInput.validity && !emailInput.validity.valid) {
                    setError(t('reset_email_err_invalid',
                        'Sila masukkan alamat emel yang sah. Contoh: nama@domain.com'));
                    return false;
                }

                if (!emailRegex.test(value)) {
                    setError(t('reset_email_err_invalid',
                        'Sila masukkan alamat emel yang sah. Contoh: nama@domain.com'));
                    return false;
                }

                setError('');
                return true;
            }

            emailInput.addEventListener('input', () => {
                if (emailInput.value.length === 0) {
                    setError('');
                    return;
                }
                validateEmail();
            });

            emailInput.addEventListener('blur', validateEmail);

            form.addEventListener('submit', (e) => {
                if (!validateEmail()) {
                    e.preventDefault();
                    e.stopPropagation();
                    emailInput.focus();
                }
            });
        })();
    </script>


    <script>
            $(document).ready(function(e){
                if($("#reg").html() == "Daftar")
                    $("#reg").attr('href', 'https://myip.mod.gov.my/daftar-organisasi');
                else
                    $("#reg").attr('href', 'https://myip.mod.gov.my/register-organization');
            });

            document.addEventListener("click", function (e) {
              const btn = e.target && e.target.closest ? e.target.closest("[data-lang],[data-lang-switch]") : null;
              if (!btn) return;

              const v = (btn.getAttribute("data-lang") || btn.getAttribute("data-lang-switch") || "").toLowerCase();

              if(v == 'en')
                $("#reg").attr('href', 'https://myip.mod.gov.my/register-organization');
              else
                $("#reg").attr('href', 'https://myip.mod.gov.my/daftar-organisasi');
              e.preventDefault();
              //setLanguage(v);
        });

    </script>

</body>

</html>
