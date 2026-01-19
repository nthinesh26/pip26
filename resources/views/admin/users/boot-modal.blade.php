<div class='modal fade' id='user_page' tabindex='-1'>
    <div class='modal-dialog modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>User Role Page</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>

            <div class='modal-body'>
                <form method='POST' action='/portal/user/role/add' enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class='form-group col-lg-4 col-md-12'>
                            <label for='name'><i class='fa fa-tag'></i>&nbsp;Name of Role </label>
                            <input type='text' class='form-control' id='name' name='name' required='required'
                                placeholder='Enter Name of Role ' />
                        </div>
                        <div class='form-group col-lg-8 col-md-12'>
                            <label for='reason'><i class='fa fa-tag'></i>&nbsp;Reason</label>
                            <input type='tag' class='form-control' id='reason' name='reason' required='required'
                                placeholder='Enter Reason' />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="chk-confirm"><input type='checkbox' class='' name='chk' id='chk'
                                    required value='chk-confirm' /> I am Confiriming the above details are
                                Correct</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <input type='submit' class='btn btn-primary' name='post' id='post'
                                value='Post Now' />
                        </div>
                    </div>
                </form>
            </div>

            <div class='modal-footer'>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        $("#role").click(function(e) {
            $("#user_page").modal('show');
        });
    });
</script>
