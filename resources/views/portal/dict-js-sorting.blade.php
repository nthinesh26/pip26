<script>
    $(document).ready(function(e) {
        $('#dir-sorting').change(function(e) {
            let val = $(this).val();
            if (val == 'az' || val == 'za') {
                $.ajax({
                    type: 'POST',
                    url: '/pip/dict/sorting',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tag: val,
                        type: $("#kategori_entiti :selected").val(),
                    },
                    beforeSend: function(e) {
                        $('#directory-result').html('Loading...');
                    }
                }).done(function(e) {
                    $('#directory-result').html(e).show();
                });
            }
        });
    });
</script>
