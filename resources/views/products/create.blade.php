@extends('layouts.base')
@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Product Storage</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include('partials.selectpicker', ['name' => 'category_id', 'model' => 'products.category_id',  'horizontal' => 'true','label' => 'Category', 'options' => [], 'useKeys' => true,  'useOld' => ''])
                                    @include('partials.bs_text', ['name' => 'product_name', 'label' => 'Product Name', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'product_code', 'label' => 'Product Code', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'unit_price', 'label' => 'Price', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])

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
                    <button type="submit" class="btn btn-fill btn-danger">Save</button>
                    <a href="{{ route('products.index') }}"
                       class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('scripts')
<script>

    $(document).ready(function () {
        category_select();
    });


    function category_select() {
        $.ajax({
            url: "{{ route('ajax.category') }}",
            type: "get",
            success: function (result) {
                for (i = 0; i < result.length; i++) {
                    $('#category_id').append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
                }
                /*
                 $('#category_id')
                 .select2();*/
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
</script>


@endpush