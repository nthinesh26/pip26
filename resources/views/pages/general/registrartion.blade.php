<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pendaftaran Pengguna Baharu - Portal Industri Pertahanan</title>
    <style></style>
    {{-- <link rel="stylesheet" href="/pip/assets/css/pip-preregister.css?={{ rand(11, 99) }}" /> --}}
    <link rel="stylesheet" href="/pip/assets/css/vendors/pip-form.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/cassiopeia-colors_standard.min.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/cassiopeia-template.min.css?x={{ rand(11, 99) }}" />
    {{-- <link rel="stylesheet" href="/pip/assets/css/vendors/joomla-alert.min.css?x={{ rand(11, 99) }}" /> --}}
    <link rel="stylesheet" href="/pip/assets/css/vendors/joomla-fontawesome.min.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/magnific-popup.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppagebuilder.min.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-animate.min.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-color-switcher.min.css?x={{ rand(11, 99) }}" />
    <link rel="stylesheet" href="/pip/assets/css/vendors/sppb-dynamic-content.min.css?x={{ rand(11, 99) }}" />
    <style>
        .pip-hero-logo {
            display: none !important;
        }
    </style>
    @yield('header-inejct')
</head>

<body class="site">

    <!-- NAVBAR -->
    @include('pages.general.components.nav')

    @yield('content')
    <script>
        let x = 0;
    </script>
    @if (isset($message))
        {!! $message !!}
    @endif
    @include('pages.general.components.footer-and-js')

    @include('pages.general.confirm')
    @if (isset($pipInject))
        {!! $pipInject !!}
    @endif

    @include('pages.general.components.js-inject')
    @yield('script-inject')



    <script src="/pip/assets/js/portal-form.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/content-dictionary-i18n.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/portal-form-validation.js" defer></script>
    <script src="/pip/assets/js/portal-i18n.v1.0.js?x={{ rand(111, 999) }}" defer></script>
    <script src="/pip/assets/js/portal-form-validation.js?x={{ rand(111, 999) }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="/pip/assets/js/pip-flatpickr-init.js" defer></script>
    <script>
        $(document).ready(function(e) {
            $('input[type="date"]').val("{{ date('Y-m-d') }}");
        });
    </script>
</body>

</html>
