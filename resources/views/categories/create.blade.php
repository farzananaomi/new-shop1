@extends('layouts.base')

@section('content')
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Create Category</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include('partials.bs_text', ['name' => 'name', 'label' => 'Category Name', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_textarea', ['name' => 'description', 'label' => 'Description', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="form-group">
                <label class="col-md-3"></label>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-fill btn-danger">Create Category</button>
                    <a href="{{ route('categories.index') }}"
                       class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </div>


    </form>

@endsection