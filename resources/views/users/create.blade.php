@extends('layouts.base')

@section('content')

    <div class="card ">
        <div class="header">
            <div class="btn-group pull-right">
                <button type="button" role="button" class="btn btn-info" data-toggle="modal" data-target="#user-modal">
                    <i class="fa fa-plus"></i>
                    Add User
                </button>
            </div>
            <h4 class="title inline-block">Listing Users</h4>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            {!! $dataTable->table() !!}
        </div>
    </div>

@endsection

@section('end-content')
    <div class="modal fade" id="user-modal" tabindex="-1" role="dialog"
         aria-labelledby="user-form-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="user-form-title">
                        Add new Form
                    </h4>
                </div>
                <form role="form" action="{{ route('users.store') }}" method="post" id="user-form">
                {!! csrf_field() !!}
                <!-- Modal Body -->
                    <div class="modal-body">
                        @include('partials.bs_text', ['name' => 'name', 'label' => 'Name', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.bs_email', ['name' => 'email', 'label' => 'Email', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.bs_text', ['name' => 'contact', 'label' => 'Contact', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.bs_text', ['name' => 'additional_no', 'label' => 'Additinal COntact', 'extras' => 'required="required"', 'useOld' => ''])

                        @include('partials.bs_textarea', ['name' => 'address', 'label' => 'Address', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.selectpicker', ['name' => 'role', 'label' => 'User Type', 'options' =>['admin', 'salesman', 'supplier', 'employee'], 'useKeys' => 'true', 'extras' => 'required="required"'])
                        @include('partials.bs_text', ['name' => 'username', 'label' => 'Username', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.bs_password', ['name' => 'password', 'label' => 'Password', 'extras' => 'required="required"', 'useOld' => ''])
                        @include('partials.bs_password', ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'extras' => 'required="required"', 'useOld' => ''])

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-default btn-success btn-fill">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
