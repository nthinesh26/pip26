@foreach (Permission::distinct()->where('guard_name', 'web')->get(['group_name']) as $group)
    <h5 class="mt-3 mb-3"><i class="fa fa-users"></i>&nbsp;{{ $group->group_name }}</h5>
    @foreach (Permission::where('group_name', $group->group_name)->where('guard_name', 'web')->get() as $permission)
        <div class="mt-2 mb-2">
            <input type='checkbox' class='checkbox permission-check' data-permission = "{{ $permission->name }}"
                name='chk_{{ $permission->id }}' id='chk_{{ $permission->id }}'
                value='{{ $permission->name }}' />&nbsp;&nbsp;&nbsp;
            <label class="point" for="chk_{{ $permission->id }}">{{ $permission->description }}
                <small>({{ $permission->name }})</small></label>
        </div>
    @endforeach
    <hr />
@endforeach

<div id="result"></div>
<div id="result-role-selector"></div>


<script>
    function tracePermission() {
        $(document).ready(function(e) {
            $(".permission-check").prop('checked', false);

            let role = $("#selector option:selected").attr('data-role');

            $.ajax({
                type: 'POST',
                url: '/portal/permission/fetch-in-box',
                data: {
                    _token: '{{ csrf_token() }}',
                    user: role,
                },
                beforeSend: function(e) {
                    $('#result-role-selector').html('Loading...');
                }
            }).done(function(e) {
                $('#result-role-selector').html(e).show();
            });
        });
    }



    $(document).ready(function(e) {
        tracePermission();

        $("#selector").change(function(e) {
            tracePermission();
        });

        $(".permission-check").change(function(e) {
            let flag = $(this).is(':checked') ? 1 : 0;
            let permission = $(this).attr('data-permission');
            $.ajax({
                type: 'POST',
                url: '/portal/permission/sync',
                data: {
                    _token: '{{ csrf_token() }}',
                    role: $("#selector :selected").val(),
                    permission: permission,
                    flag: flag,
                },
                beforeSend: function(e) {
                    $('#result').html('Loading...');
                }
            }).done(function(e) {
                $('#result').html(e).show();
            });
        });
    });
</script>
