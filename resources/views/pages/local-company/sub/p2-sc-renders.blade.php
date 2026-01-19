<script>
    $(document).ready(function(e) {
        $(".remove-dirs").click(function(e) {
            let dir = $(this).attr('data-dir');
            $.ajax({
                type: 'POST',
                url: '/pip/local/remove/bord-directors',
                data: {
                    _token: '{{ csrf_token() }}',
                    r: dir,
                },
                beforeSend: function(e) {
                    $('#res').html('Loading...');
                }
            }).done(function(e) {
                $('#res').html(e).show();
            });
        });
    });
</script>
