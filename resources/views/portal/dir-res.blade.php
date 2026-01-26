<div class="container">
    <div class="row g-4">
        @php
            if (isset($type)) {
                $users = User::whereIn('type', $type)->where('status', '<>', 'del')->get();
            } else {
                $users = User::whereIn('type', ['local', 'royal', 'institute', 'oem'])
                    ->where('status', '<>', 'del')
                    ->get();
            }
        @endphp
        @foreach ($users as $user)
            @php
                $profile = $user->profile();
            @endphp
            @if ($profile)
                <div class="col-12 col-lg-6">
                    <div class="pip-card p-0 h-100">
                        <div class="row g-0 h-100">

                            <!-- LEFT PANEL: Logo from DB (replaces colourful box) -->
                            <div class="col-5 col-md-4 d-flex align-items-center justify-content-center p-3"
                                style="border-right:1px solid #eee;background:#fff;">
                                @if ($profile->logo)
                                   <img alt="Logo" class="img-fluid"
                                        src="{{ ($profile->logo == 'not-submitted' || $profile->logo == 'error' || $profile->logo == '/pip/assets/img/userProfileBotak.png') ? '/pip/assets/img/userProfileBotak.png' : '/' . $profile->logo }}"
                                        style="max-height:140px;object-fit:contain;" />
                                @else
                                    <img alt="Logo [[NAMA_SYARIKAT_FROM_DB]]" class="img-fluid"
                                        src="/pip/assets/img/userProfileBotak.png"
                                        style="max-height:140px;object-fit:contain;" />
                                @endif
                            </div>
                            @php
                                $col_name = $user->companyName();
                                $type = $col_type = $user->displayType();
                                $desc = $user->desc();
                                $desc_render = $user->desc_render();

                            @endphp
                            @php
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
                            @endphp
                            <!-- RIGHT PANEL: Details from DB -->
                            <div class="col-7 col-md-8 p-3">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div>
                                        <div style="font-weight:700;">{{ $profile->$col_name }}</div>
                                        <div class="pip-muted" style="font-size:0.95rem;">{{ $col_type }}</div>
                                    </div>
                                </div>

                                <div class="mt-2 d-flex flex-wrap gap-2">
                                    @if ($profile->exps != 'null' && $profile->exps)
                                        @if ($user->type == 'local')
                                            @php
                                                $arr = ['danger', 'success', 'primary', 'warning'];
                                                $exps = json_decode($profile->exps);
                                                // dd($exps);
                                            @endphp
                                            @foreach ($exps as $exp)
                                                <span class="badge rounded-pill text-bg-{{ $arr[rand(0, 3)] }}">
                                                    {{ $exp }}</span>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>

                                <p class="mt-2 mb-2" style="font-size:0.95rem;">
                                    @if ($desc != '_')
                                        {{ $profile->$desc_render }}
                                    @endif
                                </p>

                                <div class="pip-muted" style="font-size:0.95rem;">
                                    <i aria-hidden="true" class="fas fa-map-marker-alt me-2"></i>
                                    {{ $city }}, {{ $state }}
                                </div>
                                <p class="mt-2 mb-2" style="font-size:0.95rem;">
                                    <a href="/pip/access/{{ WebTool::encode($user->id) }}"><span
                                            data-i18n="dir_view_details">View Details</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- END DB TEMPLATE CARD -->
    </div>
</div>
@include('portal.dict-js-sorting')
