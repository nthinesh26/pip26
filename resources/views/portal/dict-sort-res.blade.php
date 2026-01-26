@php

    $q1 = DB::table('local_companies as t1')
        ->join('users as u', 'u.id', '=', 't1.user_id')
        ->where('u.status', 'active')
        ->whereIn('u.type', $types)
        ->select(
            't1.company_name as name',
            'u.id as user_id',
            'u.type as user_type',
            DB::raw("'local_companies' as source"),
        );

    $q2 = DB::table('royals as t2')
        ->join('users as u', 'u.id', '=', 't2.user_id')
        ->where('u.status', 'active')
        ->whereIn('u.type', $types)
        ->select('t2.agensi_name as name', 'u.id as user_id', 'u.type as user_type', DB::raw("'royals' as source"));

    $q3 = DB::table('o_e_m_s as t3')
        ->join('users as u', 'u.id', '=', 't3.user_id')
        ->where('u.status', 'active')
        ->whereIn('u.type', $types)
        ->select('t3.company_name as name', 'u.id as user_id', 'u.type as user_type', DB::raw("'o_e_m_s' as source"));

    $q4 = DB::table('institutes as t4')
        ->join('users as u', 'u.id', '=', 't4.user_id')
        ->where('u.status', 'active')
        ->whereIn('u.type', $types)
        ->select(
            't4.organisation_name as name',
            'u.id as user_id',
            'u.type as user_type',
            DB::raw("'institutes' as source"),
        );

    // $query1 = \DB::table('local_companies')->select('company_name as name', 'user_id')->where('user_id', $user->id);

    // $query2 = \DB::table('royals')->select('agensi_name as name', 'user_id')->where('user_id', $user->id);
    // $query3 = \DB::table('o_e_m_s')->select('company_name as name', 'user_id')->where('user_id', $user->id);
    // $query4 = \DB::table('institutes')->select('organisation_name as name', 'user_id')->where('user_id', $user->id);

    $quiries = $q1->unionAll($q2)->unionAll($q3)->unionAll($q4)->orderBy('name', $order)->get();

    // die(var_dump($quiries));

@endphp
<div class="container">
    <section aria-label="Senarai Organisasi" class="pip-section" id="directory-result">
        <div class="row">
            @foreach ($quiries as $query)
                @php
                    $usr = $query->user_id;
                    $usr = User::find($usr);
                    // die(var_dump($usr));
                    $profile = $usr->profile();
                @endphp
                <div class="col-12 col-lg-6">
                    <div class="pip-card p-0 h-100">
                        <div class="row g-0 h-100">
                            <!-- LEFT PANEL: Logo from DB (replaces colourful box) -->
                            <div class="col-5 col-md-4 d-flex align-items-center justify-content-center p-3"
                                style="border-right:1px solid #eee;background:#fff;">
                                @if ($profile->logo)
                                    <img alt="Logo [[NAMA_SYARIKAT_FROM_DB]]" class="img-fluid"
                                        src="{{ $profile->logo == 'not-submitted' ? '/pip/assets/img/userProfileBotak.png' : '/' . $profile->logo }}"
                                        style="max-height:140px;object-fit:contain;" />
                                @else
                                    <img alt="Logo [[NAMA_SYARIKAT_FROM_DB]]" class="img-fluid"
                                        src="/pip/assets/img/userProfileBotak.png"
                                        style="max-height:140px;object-fit:contain;" />
                                @endif
                            </div>
                            @php
                                $col_name = $usr->companyName();
                                $type = $col_type = $usr->displayType();
                                $desc = $usr->desc();

                            @endphp
                            @php
                                $address = '';
                                if ($usr->type == 'local') {
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
                                    @if ($usr->exps != 'null' && $usr->exps)
                                        @if ($usr->type == 'local')
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
                                        {{ $profile->$desc }}
                                    @endif
                                </p>

                                <div class="pip-muted" style="font-size:0.95rem;">
                                    <i aria-hidden="true" class="fas fa-map-marker-alt me-2"></i>
                                    {{ $city }}, {{ $state }}
                                </div>
                                <p class="mt-2 mb-2" style="font-size:0.95rem;">
                                    <a href="/pip/profile/{{ WebTool::encode($usr->id) }}"><span
                                            data-i18n="dir_view_details">View Details</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
