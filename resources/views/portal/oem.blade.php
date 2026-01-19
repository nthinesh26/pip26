@extends('portal.index')

@section('content-main')
    <!-- CTA -->

    <!-- Gambaran Keseluruhan -->
    <section class="pip-box" id="pipBoxOverview" style="display: none">
        <div class="pip-box-head">
            <h3 class="pip-box-title">Gambaran Keseluruhan Syarikat</h3>
        </div>
        <div class="pip-box-body">
            <p class="pip-overview-text">
                {{ $profile->nyatakan_kepakaran }}
            </p>
        </div>
    </section>
    <!-- Program Kolaborasi Industri Pertahanan (RAKAN IP only) -->
    @include('portal.sub.icps')

    @include('portal.sub.wish-list-view')
@endsection
