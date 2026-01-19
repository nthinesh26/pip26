<style>
    nav .shadow-sm.rounded-md {
        display: none !important;
    }

    .links div p {
        margin-top: 10px;
        font-size: 10px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class='card'>
            <div class='card-body'>
                <table class="table table-bordered table-txt-small">
                    <thead>
                        <tr>
                            <th class="text-dark">#</th>
                            <th class="text-dark">Root (MY)</th>
                            <th class="text-dark">Translated (EN)</th>
                            <th class="text-dark">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $tr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tr->root }}</td>
                                <td>{{ $tr->tranlated }}</td>
                                <td class="text-center"><a href="/portal/translate/remove/{{ $tr->id }}"><i
                                            class="fa fa-trash point"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt3">
                    <div class="row">
                        <div class="col-lg-4 links">
                            {!! $records->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
