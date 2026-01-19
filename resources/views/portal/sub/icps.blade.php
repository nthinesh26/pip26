<section class="pip-box pip-box--icp" data-show-for="rakanip" id="pipBoxICP1" style="display: none1;">
    <div class="pip-box-head">
        <h3 class="pip-box-title">Program Kolaborasi Industri Pertahanan</h3>
    </div>
    <div class="pip-box-body">

        <div class="pip-icp-empty" data-show-role="none">
            Tiada Rekod Program Kolaborasi Industri Pertahanan
        </div>
        <!-- PROVIDER -->
        <div class="pip-icp-section" data-show-role="provider">
            <div class="pip-icp-head">
                <span class="pip-icp-badge pip-icp-badge--provider">ICP PROVIDER</span>
            </div>

            <ul class="pip-icp-list">
                <!-- Example row (repeat) -->
                @if ($profile->icps)
                    @foreach ($profile->icps->where('ctg', 'Provider')->where('status', 'active') as $icp)
                        <li class="pip-icp-item">
                            <div class="pip-icp-title"></div>
                            <div class="pip-icp-meta">
                                <span>Kontrak: {{ $icp->name }}</span>
                                <span>Tahun: - {{ $icp->start_year }}</span>
                            </div>
                        </li>
                    @endforeach
                @endif
                <!--  -->
            </ul>
        </div>
        <!-- RECIPIENT -->
        <div class="pip-icp-section" data-show-role="recipient">
            <div class="pip-icp-head">
                <span class="pip-icp-badge pip-icp-badge--recipient">ICP RECIPIENT</span>
            </div>
            <!--
              BACKEND NOTE:
              Render recipient items from icp_recipient_payload (JSON array):
              [{ icp_name, contract, start_year, end_year, provider_name }, ...]
    -->
            <ul class="pip-icp-list">
                <!-- Example row (repeat) -->
                @if ($profile->icps)
                    @foreach ($profile->icps->where('ctg', 'Recipient')->where('status', 'active') as $icp)
                        <li class="pip-icp-item">
                            <div class="pip-icp-title"></div>
                            <div class="pip-icp-meta">
                                <span>Kontrak: {{ $icp->name }}</span>
                                <span>Tahun: - {{ $icp->start_year }}</span>
                                <span>Penyedia: {{ $icp->props }}</span>
                            </div>
                        </li>
                    @endforeach
                @endif
                <!--  -->
            </ul>
        </div>
        <!-- If BOTH, show both sections above (handled by CSS/JS via data-icp-role="both") -->
    </div>
</section>
