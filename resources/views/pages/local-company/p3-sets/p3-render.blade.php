<script>
    $(document).ready(function(e) {
        $(".remove-contract").click(function(e) {
            let icp = $(this).attr('data-icp');
            let target = $(this).attr('data-target');
            $.ajax({
                type: 'POST',
                url: '/pip/icp/remove/contract',
                data: {
                    _token: '{{ csrf_token() }}',
                    i: icp,
                },
                beforeSend: function(e) {
                    $('#' + target).html('Loading...');
                }
            }).done(function(e) {
                $('#' + target).html(e).show();
            });
        });
    });
</script>
