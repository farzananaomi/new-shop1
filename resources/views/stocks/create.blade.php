@extends('layouts.base')
@section('content')
    <form action="{{ route('stocks.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Post Story</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include('partials.bs_text', ['name' => 'category_id', 'label' => 'category', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'product_id', 'label' => 'product_id', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'stock_in', 'label' => 'stock In', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'sold', 'label' => 'Sold', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])

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
                    <button type="submit" class="btn btn-fill btn-info">Post Story</button>
                    <a href="{{ route('stocks.index') }}"
                       class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection
