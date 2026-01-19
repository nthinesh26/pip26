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
        $("#btn_add_icp_provider1").click(function(e) {
            if ($("#icp_provider_icp_name").val() != "" && $("#icp_provider_contract").val() != "" && $(
                    "#icp_provider_start_year").val() != "" && $("#icp_provider_end_year").val() !=
                "") {
                let target = $(this).attr('data-target');
                $.ajax({
                    type: 'POST',
                    url: '/pip/local/icp/provider/post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: $("#icp_provider_icp_name").val(),
                        contract: $("#icp_provider_contract").val(),
                        strat: $("#icp_provider_start_year").val(),
                        end: $("#icp_provider_end_year").val(),
                        flag: "{{ WebTool::enc('Provider') }}",
                        ticket: "{{ WebTool::enc(auth()->user()->profile()->id) }}"
                    },
                    beforeSend: function(e) {
                        $('#' + target).html('Loading...');
                    }
                }).done(function(e) {
                    $('#' + target).html(e).show();
                });
            } else {
                Swal.fire({
                    title: 'Please enter values to all fileds',
                    text: 'All fields are mandatory',
                    icon: 'warning'
                });
            }
        });

        $("#btn_add_icp_recipient1").click(function(e) {

            if ($("#icp_recipient_icp_name").val() != "" && $("#icp_recipient_contract").val() != "" &&
                $("#icp_recipient_start_year").val() != "" &&
                $("#icp_recipient_end_year").val() != "" && $("#icp_recipient_provider_name").val() !=
                "") {
                let target = $(this).attr('data-target');
                $.ajax({
                    type: 'POST',
                    url: '/pip/local/icp/reception/post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: $("#icp_recipient_icp_name").val(),
                        contract: $("#icp_recipient_contract").val(),
                        strat: $("#icp_recipient_start_year").val(),
                        end: $("#icp_recipient_end_year").val(),
                        props: $("#icp_recipient_provider_name").val(),
                        flag: "{{ WebTool::enc('Provider') }}",
                        ticket: "{{ WebTool::enc(auth()->user()->profile()->id) }}"
                    },
                    beforeSend: function(e) {
                        $('#' + target).html('Loading...');
                    }
                }).done(function(e) {
                    $('#' + target).html(e).show();
                });
            } else {
                Swal.fire({
                    title: 'Please enter values to all fileds for Recipient',
                    text: 'All fields are mandatory',
                    icon: 'warning'
                });
            }
        });
    });
</script>
