<div class='modal fade' id='permission-modal' tabindex='-1'>
    <div class='modal-dialog modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Permission Setting</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>

            <div class='modal-body'>
                <form method='POST' action='/portal/add/permission' enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class='form-group col-lg-4 col-md-12'>
                            <label for='group_name'><i class='fa fa-tag'></i>&nbsp;Name of Group</label>
                            <input type='text' class='form-control' id='group_name' name='group_name'
                                required='required' placeholder='Enter Name of Group' />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class='form-group col-lg-4 col-md-12'>
                            <label for='permission'><i class='fa fa-tag'></i>&nbsp;Name of Permission</label>
                            <input type='text' class='form-control' id='permission' name='permission'
                                required='required' placeholder='Enter Name of Permission' />
                        </div>
                        <div class='form-group col-lg-8 col-md-12'>
                            <label for='desc'><i class='fa fa-tag'></i>&nbsp;Description</label>
                            <input type='text' class='form-control' id='desc' name='desc' required='required'
                                placeholder='Enter Description' />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <input type='submit' class='btn btn-primary' name='post-permission' id='post-permission'
                                value='Craete Permisison' />
                        </div>
                    </div>
                </form>
            </div>

            <div class='modal-footer'>

            </div>
        </div>
    </div>
</div>
