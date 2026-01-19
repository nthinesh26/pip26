<div class='card' style="border: 1px solid #ccc">
    <div class='card-body'>
        <h5>Permission Settings</h5>
        <div class="row mt-3 mb-4">
            <div class="col-lg-3 text-center">
                <h3 class="point" id="add-permission"><i class="fa fa-plus-circle text-primary"></i></h3>
                <small>Add Permission</small>
            </div>
            <div class='form-group col-lg-4 col-md-12'>
                <label for='selector'><i class='fa fa-building'></i>&nbsp;User Type </label>
                <select class='form-control' id='selector' name='selector'>
                    @foreach (Role::where('guard_name', 'web')->get() as $role)
                        <option value="{{ $role->name }}" data-role="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <small class='form-text text-muted'>i.e. Admin</small>
            </div>
        </div>
        <hr style="border: 0px; border-bottom: 1px solid #ccc">
        @include('admin.users.permission-list')
    </div>
</div>


@include('admin.users.permission-modal')
