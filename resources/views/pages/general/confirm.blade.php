@if ($local_flash != '0')
    @if ($local_flash)
        <div class='modal fade' id='boot' tabindex='-1'>
            <div class='modal-dialog modal-dialog modal-xl'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>BORANG PENDAFTARAN BAGI SYARIKAT TEMPATAN</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                    </div>

                    <div class='modal-body'>
                        <p>Dear {{ $local_flash->company_name }},</p>
                        <p>Your registration has been completed successfully. You will recive an login Email please
                            check
                            and access the Portal.</p>
                        <p>Thank you.</p>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(e) {
                $("#boot").modal('show');
            });
        </script>
    @else
        <div class='modal fade' id='boot' tabindex='-1'>
            <div class='modal-dialog modal-dialog modal-xl'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>BORANG PENDAFTARAN BAGI SYARIKAT TEMPATAN</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                    </div>

                    <div class='modal-body'>
                        <p>Dear Applicant,</p>
                        <p>Somthing went wrong in the application please check and proceed the registration again or
                            contact
                            our admin.</p>
                        <p>Thank you.</p>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(e) {
                $("#boot").modal('show');
            });
        </script>
    @endif
@endif
