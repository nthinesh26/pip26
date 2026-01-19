<nav class="app-navbar" data-simplebar>
    <ul class="menubar" id="navbarSideMenu">
        @php
            $menus = [
                [
                    'title' => 'Home',
                    'link' => '/',
                ],
                [
                    'title' => 'User Management',
                    'link' => '/portal/user/management',
                ],
                [
                    'title' => 'Label Translator',
                    'link' => '/portal/translator',
                ],
                [
                    'title' => 'Services',
                    'link' => '/portal/services',
                ],
            ];
        @endphp
        @foreach ($menus as $menu)
            <li class="menu-item">
                <a class="menu-link" href="{{ $menu['link'] }}">
                    <i class="fi fi-rr-tag"></i>
                    <span class="menu-label">{{ $menu['title'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>


