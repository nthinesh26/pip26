@extends('portal.index')

@section('content-main')
    <!-- CTA -->

    <section class="pip-box" id="pipBoxExpertise">
        <div class="pip-box-head">
            <h3 class="pip-box-title" data-i18n="box_expertise_title">Bidang Kepakaran</h3>
        </div>
        <div class="pip-box-body">

            @php
                if (!is_array($profile->exps)) {
                    $exps = [$profile->exps];
                } else {
                    $exps = $profile->exps;
                }
                // dd(auth()->user()->profile()->exps);
            @endphp

            @if ($user->profile()->exps != 'null' && $user->profile()->exps)
                @foreach (json_decode($profile->exps) as $exp)
                    <div class="pip-pill">{{ $exp }}</div>
                @endforeach
            @endif

            <!-- It is possible to have multiple tags, backend can render more pills here -->
            <!--  -->
        </div>
    </section>
    <!-- Gambaran Keseluruhan -->
    <section class="pip-box" id="pipBoxOverview">
        <div class="pip-box-head" data-i18n="box_overview_title">
            <h3 class="pip-box-title">Gambaran Keseluruhan Syarikat</h3>
        </div>
        <div class="pip-box-body">
            <p class="pip-overview-text">
                {{ $profile->nyatakan_kepakaran }}
            </p>
        </div>
    </section>

    @include('portal.sub.icps', ['profile' => $profile])

    @include('portal.sub.wish-list-view', ['profile' => $profile])
@endsection
