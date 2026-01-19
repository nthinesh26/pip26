<script>
    $(document).ready(function(e) {
        @if (ICP::where('company_id', $company_id)->where('props', '<>', 'N.A')->where('ctg', $ctg)->where('status', 'active')->count() > 0)
            $("#icp_recipient_yes").click();
        @endif
    });
</script>
<div class="table-responsive mt-3">
    <table class="table table-sm align-middle" id="icp_recipient_table1">
        <thead>
            <tr>
                <th>Nama ICP</th>
                <th>Kontrak</th>
                <th>Mulai Tahun</th>
                <th>Hingga Tahun</th>
                <th>Penyedia ICP (ICP Provider)</th>
                <th class="text-end">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach (ICP::where('company_id', $company_id)->where('props', '<>', 'N.A')->where('ctg', $ctg)->where('status', 'active')->get() as $icp)
                <tr>
                    <td>{{ $icp->name }}</td>
                    <td>{{ $icp->contract }}</td>
                    <td>{{ $icp->start_year }}</td>
                    <td>{{ $icp->end_year }}</td>
                    <td>{{ $icp->props }}</td>
                    <td class="text-end"><a href="javascript:void(0)" class="remove-contract"
                            data-icp="{{ WebTool::enc($icp->id) }}" data-target="res2">Tindakan</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<p class="pip-muted mb-0">Gunakan “Klik untuk Tambah” untuk memasukkan lebih daripada satu
    rekod Penerima ICP.</p>
<input type="hidden" id="icp_recipient_payload" name="icp_recipient_payload" value="[]" />
@include('pages.local-company.p3-sets.p3-render')
