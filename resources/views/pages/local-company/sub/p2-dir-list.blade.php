<div class="mt-4">
    <div class="table-responsive">
        <table class="table table-sm align-middle" id="directors_table1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No Kad Pengenalan / Pasport</th>
                    <th>Warganegara</th>
                    <th>Jawatan</th>
                    <th>Pegangan Saham %</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->profile()->directors->where('active', 'active') as $director)
                    <tr>
                        <td>{{ $director->name }}</td>
                        <td>{{ $director->proof_id }}</td>
                        <td>{{ $director->citizen }}</td>
                        <td>{{ $director->position }}</td>
                        <td>{{ $director->shares }}%</td>
                        <td>{{ $director->status }}</td>
                        <th><a href="javascript:void(0)" class="remove-dirs"
                                data-dir="{{ WebTool::enc($director->id) }}">Buang</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <small class="text-muted">Gunakan “Klik untuk Tambah” untuk memasukkan lebih
        daripada seorang pengarah.</small>
</div>
@include('pages.local-company.sub.p2-sc-renders')
