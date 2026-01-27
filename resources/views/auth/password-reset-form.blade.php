<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title data-i18n="reset_form_page_title">Tetapkan semula kata laluan | Portal Industri Pertahanan</title>

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
            color: #dc3545;
            font-size: 0.9rem;
        }

        .pip-input.is-invalid {
            border-color: #dc3545;
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

    <main class="pip-main pip-main--wallpaper">
        <section class="pip-section pip-login-page">
            <div class="pip-login-center">
                <div class="pip-card pip-login-card">

                    <h3 class="pip-h2" data-i18n="reset_form_h1">Tetapkan Semula Kata Laluan</h3>
                    <p class="pip-muted" data-i18n="reset_form_subtitle">Sila masukkan kata laluan yang baharu</p>

                    <form action="/pip/reset-password" method="post" autocomplete="off" class="pip-login-form"
                        novalidate>
                        @csrf
                        <input type='hidden' class='btn btn-primary' name='email' id='email'
                            value='{{ WebTool::enc($email) }}' required />
                        <input type='hidden' class='btn btn-primary' name='flag' id='flag'
                            value='{{ WebTool::enc(request()->token) }}' required />
                        <div class="pip-form-group">
                            <label for="password" data-i18n="reset_form_pwd_label">Kata Laluan Baharu</label>
                            <div class="pip-input-wrap">
                                <input class="pip-input" type="password" id="password" name="password" required
                                    minlength="8" autocomplete="new-password" />
                            </div>
                            <small id="passwordHelp" class="pip-muted" data-i18n="reset_form_pwd_help">
                                Minimum 8 aksara, huruf besar, huruf kecil dan nombor.
                            </small>
                            <div id="passwordError" class="pip-error" style="display:none;"></div>
                        </div>

                        <div class="pip-form-group">
                            <label for="confirm_password" data-i18n="reset_form_confirm_label">Sahkan Kata
                                Laluan</label>
                            <div class="pip-input-wrap">
                                <input class="pip-input" type="password" id="confirm_password" name="confirm_password"
                                    required minlength="8" autocomplete="new-password" />
                            </div>
                            <div id="confirmError" class="pip-error" style="display:none;"></div>
                        </div>

                        <button type="submit" class="pip-btn-primary" id="submitBtn"
                            data-i18n="reset_form_submit">Hantar</button>

                    </form>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {!! session('status') !!}
                                </div>
                            @endif

                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
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
                <a class="pip-footer-link" href="{{ env('JOOMLA_WEB') }}/polisi-privasi"><span data-i18n="footer_privacy">POLISI PRIVASI</span></a>
                <a class="pip-footer-link" href="javascript:void(0)"><span data-i18n="footer_terms">TERMA PENGGUNAAN</span></a>
                <a class="pip-footer-link" href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank" data-i18n="nav_contact">HUBUNGI KAMI</a>
            </div>
        </div>
    </footer>

    <!-- Keep defer -->
    <script defer src="/pip/assets/js/pip-i18n.js"></script>

    <script>
        (function() {
            'use strict';

            // Joomla/SP Page Builder safety: bind after DOM is ready
            document.addEventListener('DOMContentLoaded', function() {

                const form = document.querySelector('.pip-login-form');
                if (!form) return;

                const pwd = document.getElementById('password');
                const cpwd = document.getElementById('confirm_password');
                const pwdErr = document.getElementById('passwordError');
                const cpwdErr = document.getElementById('confirmError');

                if (!pwd || !cpwd || !pwdErr || !cpwdErr) return;

                // Rule: min 8 chars, at least 1 lowercase, 1 uppercase, 1 digit
                const rule = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

                function t(key, fallback) {
                    // Works whether pip-i18n loaded or not; uses fallback if not available
                    if (window.PIP_I18N && typeof window.PIP_I18N.t === 'function') return window.PIP_I18N.t(
                        key, fallback);
                    return fallback || key;
                }

                function normalize(v) {
                    return String(v || '').trim();
                }

                function showError(input, el, msg) {
                    if (msg) {
                        el.textContent = msg;
                        el.style.display = 'block';
                        input.classList.add('is-invalid');
                        input.setAttribute('aria-invalid', 'true');
                    } else {
                        el.textContent = '';
                        el.style.display = 'none';
                        input.classList.remove('is-invalid');
                        input.removeAttribute('aria-invalid');
                    }
                }

                function validatePassword(showMessages) {
                    const v = normalize(pwd.value);

                    if (v.length === 0) {
                        showError(
                            pwd,
                            pwdErr,
                            showMessages ? t('reset_form_err_pwd_required',
                                'Sila masukkan kata laluan baharu.') : ''
                        );
                        return false;
                    }

                    if (!rule.test(v)) {
                        showError(
                            pwd,
                            pwdErr,
                            showMessages ? t('reset_form_err_pwd_rule',
                                'Minimum 8 aksara dengan huruf besar, kecil dan nombor.') : ''
                        );
                        return false;
                    }

                    showError(pwd, pwdErr, '');
                    return true;
                }

                function validateConfirm(showMessages) {
                    const p = normalize(pwd.value);
                    const c = normalize(cpwd.value);

                    if (c.length === 0) {
                        showError(
                            cpwd,
                            cpwdErr,
                            showMessages ? t('reset_form_err_confirm_required',
                                'Sila sahkan kata laluan.') : ''
                        );
                        return false;
                    }

                    if (p.length === 0) {
                        showError(
                            cpwd,
                            cpwdErr,
                            showMessages ? t('reset_form_err_pwd_required',
                                'Sila masukkan kata laluan baharu.') : ''
                        );
                        return false;
                    }

                    if (p !== c) {
                        showError(
                            cpwd,
                            cpwdErr,
                            showMessages ? t('reset_form_err_mismatch', 'Kata laluan tidak sepadan.') : ''
                        );
                        return false;
                    }

                    showError(cpwd, cpwdErr, '');
                    return true;
                }

                // Softer live validation: do not “lock” the button; just provide feedback
                pwd.addEventListener('input', function() {
                    // only show messages after user has started typing
                    validatePassword(false);
                    if (normalize(cpwd.value).length > 0) validateConfirm(false);
                });

                cpwd.addEventListener('input', function() {
                    validateConfirm(false);
                });

                pwd.addEventListener('blur', function() {
                    validatePassword(true);
                    if (normalize(cpwd.value).length > 0) validateConfirm(true);
                });

                cpwd.addEventListener('blur', function() {
                    validateConfirm(true);
                });

                form.addEventListener('submit', function(e) {
                    const ok1 = validatePassword(true);
                    const ok2 = validateConfirm(true);

                    if (!ok1 || !ok2) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (!ok1) pwd.focus();
                        else cpwd.focus();
                    }
                });

            });
        })();
    </script>

</body>

</html>
