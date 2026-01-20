<script>
    $(document).ready(function(e) {
        @if (auth()->user()->profile()->contact_officer != '[]')
            @php
                $requests = ['contact_name', 'contact_id_passport', 'contact_nationality', 'contact_position', 'contact_mobile_phone', 'contact_official_email'];
                $val = json_decode(auth()->user()->profile()->contact_officer);
            @endphp
            @foreach ($requests as $request)
                $("#{{ $request }}").val("{{ $val->$request }}");
            @endforeach
        @endif

        $("#btn_add_director").click(function(e) {
            let status = $("input[name='director_status']:checked").val();
            let q0 = $("#director_status_awam").prop('checked');
            let q1 = $("#director_status_pesara_awam").prop('checked');
            let q2 = $("#director_status_pesara_tentera").prop('checked');
            let valid = false;
            if(q0 || q1 || q2)
                valid = true;
            console.log(valid);
            if($("#director_name").val() != '' &&  $("#director_id_passport").val() != '' && $("#director_nationality").val() != '' && $("#director_position").val() != '' && $("#director_shareholding_pct").val() != '' && valid){
                $.ajax({
                    type: 'POST',
                    url: '/pip/local/post/bord-directors',
                    data: {
                        _token: '{{ csrf_token() }}',
                        n: $("#director_name").val(),
                        i: $("#director_id_passport").val(),
                        z: $("#director_nationality").val(),
                        p: $("#director_position").val(),
                        h: $("#director_shareholding_pct").val(),
                        s: status,
                        r: "{{ WebTool::enc(auth()->user()->profile()->id) }}"
                    },
                    beforeSend: function(e) {
                        $('#res').html('Loading...');
                    }
                }).done(function(e) {
                    $('#res').html(e).show();
                });
            }else{

            }
        });
    });
</script>
