@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div>
                <div class='card'>
                    <div class='card-body'>
                        <h5>Create Internal User</h5>
                        <form method='POST' action='/portal/add/new-user' enctype='multipart/form-data'>
                            @csrf
                            <div class="row mt-3">
                                <div class='form-group col-lg-6 col-md-12'>
                                    <label for='name_of_user'><i class='fa fa-tag'></i>&nbsp;Name of User</label>
                                    <input type='text' class='form-control' id='name_of_user' name='name_of_user'
                                        required='required' placeholder='Enter Name of User' />
                                    <small class='form-text text-muted'>e.g. Jhon Doe</small>
                                </div>
                                <div class='form-group col-lg-6 col-md-12'>
                                    <label for='email'><i class='fa fa-building'></i>&nbsp;Email</label>
                                    <input type='text' class='form-control' id='email' name='email'
                                        required='required' placeholder='Enter Email' />
                                    <small class='form-text text-muted'>e.g. jhon@example.com</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class='form-group col-lg-6 col-md-12'>
                                    <label for='user_roles'><i class='fa fa-building'></i>&nbsp;User Roles</label>
                                    <select class='form-control' id='user_roles' name='user_roles'>
                                        @foreach (Role::where('guard_name', 'web')->get() as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-2"><a href="javascript:void(0)" id="role">Manage Roles</a></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <input type='submit' class='btn btn-primary' name='user' id='user'
                                        value='Create User' />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-7">
            <div>
                @include('admin.users.permission')
            </div>
        </div>
    </div>


    @include('admin.users.boot-modal')
@endsection
