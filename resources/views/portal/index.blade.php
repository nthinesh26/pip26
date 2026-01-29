<!DOCTYPE html>
<!-- saved from url=(0073)/pip/UserProfile-SyarikatTempatan.html -->
<html lang="ms">

<head>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>
    @include('portal.sub.head')

    @php
        if ($flag) {
            // die(var_dump($user));
            $address = '';
            if ($user->type == 'local') {
                $txt = json_decode($profile->company_address);
                $address .= $txt->line_1;
                $address .= $txt->line_2;
                $address .= $txt->city;
                $address .= $txt->state;
                $city = $txt->city;
                $state = $txt->state;
            } else {
                $address = $profile->fetchAddress()['general'];
                $city = $profile->fetchAddress()['city'];
                $state = $profile->fetchAddress()['state'];
            }
        } else {
            // dd($user);
            $profile = $user->profile();
            // $user = $tag;

            $address = '';
            if ($user->type == 'local') {
                $txt = json_decode($profile->company_address);
                $address .= $txt->line_1;
                $address .= $txt->line_2;
                $address .= $txt->city;
                $address .= $txt->state;
                $city = $txt->city;
                $state = $txt->state;
            } else {
                $address = $profile->fetchAddress()['general'];
                $city = $profile->fetchAddress()['city'];
                $state = $profile->fetchAddress()['state'];
            }
        }
    @endphp
</head>

<body data-icp-role="none" data-org-status="terhad">
    <!-- DEV ONLY: STATUS TOGGLE (remove in production) -->
    <div aria-label="Dev status toggle" class="pip-dev-toggle" style="display: none">
        <span>DEV VIEW:</span>
        <button data-state="terhad" type="button">MAKLUMAT ASAS</button>
        <button data-state="rakanip" id="ipc" type="button">RAKAN IP</button>
        <span class="pip-dev-sep">|</span>
        <span>ICP ROLE:</span>
        <button data-icp="none" type="button">NONE</button>
        <button data-icp="provider" type="button">PROVIDER</button>
        <button data-icp="recipient" type="button">RECIPIENT</button>
        <button data-icp="both" type="button">BOTH</button>
    </div>
    @include('portal.sub.header')
    <main class="pip-profile-page">
        @php
            if($flag)
                $com = auth()->user()->companyName();
            else
                $com = $user->companyName();

        @endphp
        <section aria-label="Banner organisasi" class="pip-profile-banner-wrap">
            <div aria-label="Banner organisasi" class="pip-profile-banner" role="img"
                style="background-image:url('/pip/assets/img/userProfileBanner.png');"></div>
        </section>

        <section aria-label="Profil Organisasi" class="pip-profile-wrap">
            <div class="pip-profile-card">
                <div class="pip-profile-body">
                    <div class="pip-profile-avatar">
                        <img alt="Logo Organisasi"
                            @if ($flag) src="{{ auth()->user()->profile()->logo == 'not-submitted' ? '/pip/assets/img/userProfileBotak.png' : '/' . auth()->user()->profile()->logo }}"
                            @else 
                                src="{{ $user->profile()->logo == 'not-submitted' ? '/pip/assets/img/userProfileBotak.png' : '/' . $user->profile()->logo }}"
                            @endif />
                        @if ($flag)
                            <button class="pip-avatar-edit pip-avatar-edit--overlay" id="pipAvatarEditBtn"
                                type="button" aria-label="Edit Profile" data-i18n-aria="avatar_edit">
                                <span class="pip-avatar-edit__label" aria-hidden="true" data-i18n="avatar_edit">Edit
                                    Profile</span>
                            </button>
                        @endif
                    </div>
                    <div class="pip-profile-row">
                        <div class="pip-profile-info">
                            <div class="pip-profile-title">
                                @if ($flag)
                                    <h1 class="pip-profile-name">{{ auth()->user()->profile()->$com }}</h1>
                                @else
                                    <h1 class="pip-profile-name">{{ $user->profile()->$com }}</h1>
                                @endif
                                <!-- TERHAD and RAKAN IP badge -->
                                <span class="pip-profile-badge" data-badge="terhad" data-i18n="badge_basic">MAKLUMAT
                                    ASAS</span>
                                <span class="pip-profile-badge pip-profile-badge--full" data-badge="rakanip"
                                    data-i18n="badge_partner">RAKAN IP</span>
                            </div>
                            <p class="pip-profile-desc">
                            @if($flag)
                                <h6>{{ auth()->user()->displayType() }}, {{ $city }} . {{ $state }}</h6>
                            @else
                                <h6>{{ $user->displayType() }}, {{ $city }} . {{ $state }}</h6>
                            @endif
                            </p>
                        </div>
                        <div class="pip-profile-actions">
                            <div class="pip-profile-actions-inner">
                                @if ($flag)
                                    <button class="pip-profile-btn" data-access="/pip/profile/create-wishlist"
                                        data-href="/pip/profile/create-wishlist" data-lock-mode="never"
                                        id="pipProfileBtn" type="button">

                                        <span class="pip-profile-btn-text" data-i18n="cta_submit_icp_rd">ISI CADANGAN
                                            PROJEK
                                            ICP ATAU R&amp;D</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="Dashboard pengguna" class="pip-dash-wrap pip-dash-wrap--mock">
            <div class="pip-dash-container">
                <div class="pip-dash-head pip-dash-head--mock">
                    <div class="pip-dash-head-left">
                        <h2 class="pip-dash-title">
                            <span data-i18n="dash_welcome_html"></span>
                            <span>&nbsp;</span>
                            @if (!$tag)
                                {!! ' '.auth()->user()->name !!}
                            @else
                                {!! ' '.$user->name !!}
                            @endif
                        </h2>
                        <p class="pip-dash-sub" id="pipDashMessage" data-i18n="dash_message_full">
                            Tahniah! Profil organisasi anda telah lengkap dan kini mempunyai akses penuh ke Portal
                            Industri Pertahanan.
                        </p>
                    </div>
                    <div class="pip-dash-head-right">
                    </div>
                </div>
                <div class="pip-dash-grid pip-dash-grid--mock">
                    <!-- LEFT COLUMN -->
                    <div class="pip-dash-col">
                        @if ($flag)
                            <section class="pip-box pip-box--status" data-show-for="terhad" id="pipBoxStatusProfile">
                                <div class="pip-box-head">
                                    <h3 class="pip-box-title" data-i18n="box_status_title">Status Profil</h3>
                                </div>
                                <div class="pip-box-body">
                                    @php
                                        $color = '';
                                        if ($profile->completionStatus() >= 30 && $profile->completionStatus() < 50) {
                                            $color = '#b10974 !important';
                                        } elseif (
                                            $profile->completionStatus() >= 50 &&
                                            $profile->completionStatus() < 75
                                        ) {
                                            $color = '#f59e0b !important';
                                        } elseif (
                                            $profile->completionStatus() >= 75 &&
                                            $profile->completionStatus() <= 100
                                        ) {
                                            $color = '#09b10f !important';
                                        }
                                    @endphp
                                    <style>
                                        .pip-status-progress-fill,
                                        .pip-status-progress-pill {
                                            background: {{ $color }};
                                        }
                                    </style>
                                    @if (auth()->user()->type == 'local')
                                        <p class="pip-box-muted">
                                            <span data-i18n="box_status_desc">Sila lengkapkan profil organisasi anda
                                                untuk
                                                mengakses ekosistem pertahanan penuh.</span>
                                        </p>
                                        <div class="pip-status-progress">
                                            <div aria-valuemax="100" aria-valuemin="0"
                                                aria-valuenow="{{ $profile->completionStatus() }}"
                                                class="pip-status-progress-bar" role="progressbar">
                                                <div class="pip-status-progress-fill"
                                                    style="width:{{ $profile->completionStatus() }}%; "></div>
                                            </div>
                                            <div class="pip-status-progress-pill ">{{ $profile->completionStatus() }}%
                                            </div>
                                        </div>

                                        <!-- Status list (ONLY 2 ROWS FOR TERHAD) -->
                                        <ul class="pip-status-list">
                                            <!-- DONE -->
                                            <li class="pip-status-item is-done">
                                                <span aria-hidden="true" class="pip-ico pip-ico--done">
                                                    <!-- check circle -->
                                                    <svg height="18" viewBox="0 0 24 24" width="18">
                                                        <path
                                                            d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm-1.2 14.2-3.2-3.2 1.4-1.4 1.8 1.8 4.6-4.6 1.4 1.4-6 6Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span data-i18n="status_item_basic">Pendaftaran dan Maklumat
                                                    Asas</span>
                                            </li>
                                            <!-- NOT DONE -->
                                            @if ($profile->status != 'completed')
                                                <li class="pip-status-item is-warn">
                                                    <span aria-hidden="true" class="pip-ico pip-ico--warn">
                                                        <!-- x circle -->
                                                        <svg height="18" viewBox="0 0 24 24" width="18">
                                                            <path
                                                                d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm3.6 13.2-1.4 1.4L12 13.4l-2.2 2.2-1.4-1.4 2.2-2.2-2.2-2.2 1.4-1.4L12 10.6l2.2-2.2 1.4 1.4-2.2 2.2 2.2 2.2Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>

                                                    <span data-i18n="status_item_profile_syarikat">Profil dan Keupayaan
                                                        Syarikat</span>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                    <!-- CTA -->
                                    @if ($user->type == 'local')
                                        @if ($profile->status != 'completed')
                                            <div class="pip-status-cta">
                                                <a class="pip-btn-primary" href="/profile/application/fill">
                                                    <span data-i18n="cta_complete_profile">LENGKAPKAN MAKLUMAT</span>
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <ul class="pip-status-list">
                                            <!-- DONE -->
                                            <li class="pip-status-item is-done">
                                                <span aria-hidden="true" class="pip-ico pip-ico--done">
                                                    <!-- check circle -->
                                                    <svg height="18" viewBox="0 0 24 24" width="18">
                                                        <path
                                                            d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm-1.2 14.2-3.2-3.2 1.4-1.4 1.8 1.8 4.6-4.6 1.4 1.4-6 6Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span data-i18n="status_item_basic">Pendaftaran dan Maklumat
                                                    Asas</span>
                                            </li>
                                            <!-- NOT DONE -->
                                            <li class="pip-status-item is-warn">
                                                <span aria-hidden="true" class="pip-ico pip-ico--warn">
                                                    <!-- x circle -->

                                                </span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </section>
                        @endif
                        <!-- Bidang Kepakaran (Status Profil card removed for RAKAN IP) -->
                        @yield('content-main')
                    </div>
                    <!-- RIGHT COLUMN -->
                    @include('portal.sub.right-col-' . $user->type)
        </section>
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
    @include('portal.sub.script')

    <script defer="" src="/pip/assets/js/pip-profile.js"></script>
    <script defer src="/pip/assets/js/pip-i18n.js"></script>
    @yield('script-inject')
    <script>
        $(document).ready(function(e) {

        });
    </script>
</body>

</html>
