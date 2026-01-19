<!DOCTYPE html>
<html lang="en">

<head>

    <!-- begin::{{ env('APP_NAME') }} Meta Basic -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#316AFF">
    <meta name="robots" content="index, follow">
    <meta name="author" content="LayoutDrop">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords"
        content="hr dashboard, admin template, {{ env('APP_NAME') }}, employee management, hr admin panel, {{ env('APP_NAME') }} bootstrap dashboard, hr software ui, hrm dashboard, bootstrap hr template, responsive, bootstrap hr template, light mode, dark mode">
    <meta name="description"
        content="{{ env('APP_NAME') }} is a professional and modern {{ env('APP_NAME') }} Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
    <!-- end::{{ env('APP_NAME') }} Meta Basic -->

    <!-- begin::{{ env('APP_NAME') }} Meta Social -->
    <meta property="og:url" content="https://{{ env('APP_NAME') }}.layoutdrop.com/demo/">
    <meta property="og:site_name" content="{{ env('APP_NAME') }} | {{ env('APP_NAME') }} Admin Dashboard Template">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_us">
    <meta property="og:title" content="{{ env('APP_NAME') }} | {{ env('APP_NAME') }} Admin Dashboard Template">
    <meta property="og:description"
        content="{{ env('APP_NAME') }} is a professional and modern {{ env('APP_NAME') }} Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
    <meta property="og:image" content="https://{{ env('APP_NAME') }}.layoutdrop.com/demo/preview.png">
    <!-- end::{{ env('APP_NAME') }} Meta Social -->

    <!-- begin::{{ env('APP_NAME') }} Meta Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="https://{{ env('APP_NAME') }}.layoutdrop.com/demo/">
    <meta name="twitter:creator" content="@layoutdrop">
    <meta name="twitter:title" content="{{ env('APP_NAME') }} | {{ env('APP_NAME') }} Admin Dashboard Template">
    <meta name="twitter:description"
        content="{{ env('APP_NAME') }} is a professional and modern {{ env('APP_NAME') }} Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
    <!-- end::{{ env('APP_NAME') }} Meta Twitter -->
    <!-- jQuery (Slim – without AJAX & Effects) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Or: Full jQuery (with AJAX & Effects) -->

    <!-- begin::{{ env('APP_NAME') }} Website Page Title -->
    <title>{{ env('APP_NAME') }} | {{ env('APP_NAME') }} Admin Dashboard Template</title>
    <!-- end::{{ env('APP_NAME') }} Website Page Title -->

    <!-- begin::{{ env('APP_NAME') }} Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end::{{ env('APP_NAME') }} Mobile Specific -->

    <!-- begin::{{ env('APP_NAME') }} Favicon Tags -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <!-- end::{{ env('APP_NAME') }} Favicon Tags -->
    <script src="/assets/libs/global/global.min.js"></script>
    <!-- begin::{{ env('APP_NAME') }} Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <!-- end::{{ env('APP_NAME') }} Google Fonts -->
    <style>
        .form-control::placeholder {
            color: #6c757d !important;
            opacity: 1;
            /* Important for Firefox */
        }

        label {
            margin-top: 5px;
        }

        .form-control {
            margin-top: 5px;
            --bs-body-color: #000 !important;
        }

        .modal-content {
            --bs-modal-color: #000;
        }

        .point {
            cursor: pointer;
        }

        .card {
            --bs-body-color: #000;
        }
    </style>
    <!-- CSS Stylesheet Link -->
    <link rel="stylesheet" href="/assets/libs/node-waves/waves.css">
    <link rel="stylesheet" href="/assets/libs/flaticon/css/all/all.css">
    <link rel="stylesheet" href="/assets/libs/highlight/default.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">

</head>

<body>
    <div class="main-wrapper">

        <header class="app-header">
            <div class="app-header-inner">
                <button class="app-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="app-header-end">
                    <div class="px-lg-3 px-2 ps-0 d-flex align-items-center">
                        <div class="dropdown">
                            <button
                                class="btn btn-icon btn-action-gray rounded-circle waves-effect waves-light position-relative"
                                id="ld-theme" type="button" data-bs-auto-close="outside" aria-expanded="false"
                                data-bs-toggle="dropdown" aria-label="Theme (light)">
                                <i class="fi fi-rr-brightness scale-1x theme-icon-active"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button type="button" class="dropdown-item d-flex gap-2 align-items-center active"
                                        data-bs-theme-value="light" aria-pressed="true">
                                        <i class="fi fi-rr-brightness scale-1x" data-theme="light"></i> Light
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex gap-2 align-items-center"
                                        data-bs-theme-value="dark" aria-pressed="false">
                                        <i class="fi fi-rr-moon scale-1x" data-theme="dark"></i> Dark
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex gap-2 align-items-center"
                                        data-bs-theme-value="auto" aria-pressed="false">
                                        <i class="fi fi-br-circle-half-stroke scale-1x" data-theme="auto"></i> Auto
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ms-2">
                        <a href="https://{{ env('APP_NAME') }}.layoutdrop.com/demo/" target="_blank"
                            class="btn btn-primary waves-effect waves-light">
                            Check demo
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- begin::{{ env('APP_NAME') }} Sidebar Menu -->
        <aside class="app-menubar" id="menubar">
            <div class="app-navbar-brand">
                <a class="navbar-brand-logo" href="index.html">
                    <img src="/assets/images/logo.svg" alt="logo">
                </a>
                <a class="navbar-brand-mini visible-light" href="index.html">
                    <img src="/assets/images/logo-text.svg" alt="logo">
                </a>
                <a class="navbar-brand-mini visible-dark" href="index.html">
                    <img src="/assets/images/logo-text-white.svg" alt="logo">
                </a>
            </div>
            @include('layouts.nav')
        </aside>
        <!-- end::{{ env('APP_NAME') }} Sidebar Menu -->

        <main class="app-wrapper" data-bs-spy="scroll" data-bs-target="#navbarSideMenu"
            data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
            <div class="container-fluid black" style="color: #000 !important">
                @yield('content')
            </div>
        </main>

        <footer class="footer-wrapper bg-body text-center">
            <div class="container">
                <small class="text-primary">Copyright © {{ date('Y') }} Design & Developed by <a
                        href="javascript:void();" class="text-primary">Scicom</a></small>
            </div>
        </footer>

    </div>

    <!-- Link to All JS -->

    <script src="/assets/libs/highlight/highlight.min.js"></script>
    <script src="/assets/js/appSettings.js"></script>
    <script src="/assets/js/script.js"></script>
    @if (isset($message))
        {!! $message !!}
    @endif
    <script>
        hljs.highlightAll();
    </script>
</body>

</html>
