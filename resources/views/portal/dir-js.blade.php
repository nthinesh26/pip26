<script>
    $(document).ready(function(e) {
        $("#dir-sorting").change(function(e) {
            let v = $(this).val();

        });

        $("#kategori_entiti").change(function(e) {
            if ($(this).val() != 'all')
                window.location.href = '/pip/directory/list/' + $(this).val();
            else
                window.location.href = '/pip/directory';
        });
    });
</script>
