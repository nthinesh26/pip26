{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}
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
                <a href="#" data-lang="en" id="btn-en">EN</a>
                <span aria-hidden="true">|</span>
                <a href="#" class="active" id="btn-ms" data-lang="bm">MY</a>
            </div>
            @if (!\Auth::check())
                <a href="/login" class="pip-login" target="_blank" rel="noopener">Log Masuk</a>
            @else
                <a href="/" class="pip-login" rel="noopener">Portal</a>
            @endif
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
