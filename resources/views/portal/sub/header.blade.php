<style>
    .pip-navbar,
    .pip-navbar-inner,
    .pip-actions,
    .pip-lang {
        pointer-events: auto;
    }

    .pip-actions {
        position: relative;
        z-index: 9999;
    }

    .pip-lang a {
        pointer-events: auto;
        cursor: pointer;
        display: inline-block;
    }
</style>

<header class="pip-navbar">
    <div class="pip-navbar-inner pip-navbar-inner--wide">
        @include('pip.logo')
        <nav aria-label="Menu utama" class="pip-menu pip-menu--mock">
            <ul>
                <li class="[[NAV_ACTIVE_HOME]]"><a href="{{ env('JOOMLA_WEB') }}/" data-i18n="nav_home" target="_blank">Laman Utama</a></li>
                @if(auth()->user()->type == 'admin')
                <li class="[[NAV_ACTIVE_DIR]]" data-i18n="nav_directory" style="display: none;"><a
                        href="@if (auth()->user()->type == 'admin') {{ '/pip/directory' }} @else {{ '#' }} @endif">DIREKTORI</a>
                </li>
                @endif
                <li class="[[NAV_ACTIVE_ABOUT]]"><a href="{{ env('JOOMLA_WEB') }}/mengenai-portal" target='_blank' data-i18n="nav_about">Mengenai Portal</a>
                </li>
                <li class="[[NAV_ACTIVE_CONTACT]]"><a href="{{ env('JOOMLA_WEB') }}/hubungi-kami" target="_blank" data-i18n="nav_contact">Hubungi Kami</a>
                </li>
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
