@extends('portal.index')

@section('content-main')
<!-- CTA -->


<!-- Gambaran Keseluruhan -->
<section class="pip-box" id="pipBoxOverview">
    <div class="pip-box-head">
        <h3 class="pip-box-title" data-i18n="org_mandate_heading">Overview of the Organization's Mandate / Key Roles</h3>
    </div>
    <div class="pip-box-body">
        <p class="pip-overview-text">
           {{ $profile->mandat ?? '' }}
        </p>
    </div>
</section>

@include('portal.sub.wish-list-view')
@endsection

