
@extends('layouts.base')
@section('content')
    <form action="{{ route('stocks.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Product Storage</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-12">
                                    {{-- @include('partials.selectpicker', ['name' => 'category_id', 'model' => 'stocks.category_id',  'horizontal' => 'true','label' => 'Category', 'options' => [], 'useKeys' => true,  'useOld' => ''])--}}
                                    <div class="form-group">
                                        <label for="category_id_h" class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-8">


                                            <select class="form-control select2" id="category_id_h" name="category_id_h"
                                                    onchange="load_subcategory();">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="sub_category">
                                        <label for="sub_category_id" class="col-sm-3 control-label">Sub Category</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" id="sub_category_id"
                                                    name="sub_category_id" onchange="set_category();">
                                            </select>
                                            <input type="hidden" name="category_id" id="category_id"
                                                   style="display: none" value="0">
                                        </div>
                                    </div>
                                    @include('partials.selectpicker', ['name' => 'product_id', 'model' => 'stocks.product_id',  'horizontal' => 'true','label' => 'Product Name', 'options' => [], 'useKeys' => true,  'useOld' => ''])
                                    @include('partials.selectpicker', ['name' => 'supplier_id', 'model' => 'stocks.supplier_id',  'horizontal' => 'true','label' => 'Supplier  Name', 'options' => [], 'useKeys' => true,  'useOld' => ''])
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
                    <button type="submit" class="btn btn-fill btn-danger">Save</button>
                    <a href="{{ route('stocks.index') }}"
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
        entity_select();
        Supplier_select();
    });



    function set_category() {
        var category_id = $("#sub_category_id").val();
        $("#category_id").val(category_id);
    }

    function category_select() {
        $("#sub_category").hide();
        $.ajax({
            url: "{{ route('ajax.category') }}",
            type: "get",
            success: function (result) {
                document.getElementById('category_id_h').innerHTML = "";
                for (i = 0; i < result.length; i++) {
                    $('#category_id_h').append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
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
    function load_subcategory() {
        var category_id = $("#category_id_h").val();
        $("#category_id").val(category_id);
        $("#sub_category").show();
        $.ajax({
            url: "{{ route('ajax.sub_category') }}",
            type: "get",
            data: {id: category_id},
            success: function (result) {
                document.getElementById('sub_category_id').innerHTML = "";
                for (i = 0; i < result.length; i++) {
                    $('#sub_category_id').append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
                }

                if (result.length == 0) {
                    $("#sub_category").hide();
                }

            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
    function entity_select() {
        $.ajax({
            url: "{{ route('ajax.entity') }}",
            type: "get",
            success: function (result) {
                for (i = 0; i < result.length; i++) {
                    $('#product_id').append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
                }
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }

    function Supplier_select() {
        $.ajax({
            url: "{{ route('ajax.supplier') }}",
            type: "get",
            success: function (result) {
                document.getElementById('supplier_id').innerHTML = "";
                for (i = 0; i < result.length; i++) {
                    $('#supplier_id').append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
                }
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
</script>


@endpush
