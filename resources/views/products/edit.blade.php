@extends('layouts.base')
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data"
          class="form-horizontal">
        {!! csrf_field() !!}
        {!! method_field('put') !!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-xs-12">

                        @include('partials.bs_text', ['name' => 'category_id', 'label' => 'Category',  'useOld' => old('category_id', $product->category->name), 'horizontal' => 'true', 'extras' => 'required="required"'])
                    @include('partials.bs_text', ['name' => 'product_name', 'label' => 'Product Name',  'useOld' => old('product_name', $product->product_name), 'horizontal' => 'true', 'extras' => 'required="required"'])
                    @include('partials.bs_textarea', ['name' => 'description', 'label' => 'Product Description', 'useOld' => old('description', $product->description), 'horizontal' => 'true', 'extras' => 'required="required"'])
                    @include('partials.bs_text', ['name' => 'size', 'label' => 'Size', 'useOld' => old('size', $product->size), 'horizontal' => 'true', 'extras' => 'required="required"'])




                        </div>
                    </div>


        <div class="row">
            <div class="form-group">
                <label class="col-md-3"></label>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-fill btn-info">Update Product</button>
                    <a href="{{ route('products.show' ,$product->id) }}"
                       class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection