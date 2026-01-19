<script>
    $(document).ready(function(e) {
        @foreach ($permissions as $permission)
            $("#chk_{{ $permission }}").prop('checked', true);
        @endforeach
    });
</script>
