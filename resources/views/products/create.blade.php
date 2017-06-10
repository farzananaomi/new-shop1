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
                                    <div class="form-group">
                                        <label for="category_id_h0" class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="category_id" id="category_id"
                                                   style="display: none"   value="1">
                                            <input type="hidden" name="increment_id" id="increment_id"
                                                   style="display: none" value="1">
                                            <select class="form-control select2" id="category_id_h0"
                                                    name="category_id_h[0]"
                                                    onchange="set_empty();set_category(this);">

                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_sub_category"></div>
                                    @include('partials.bs_text', ['name' => 'product_name', 'label' => 'Product Name', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_textarea', ['name' => 'description', 'label' => 'Product Description', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'size', 'label' => 'Size', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])

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
                    <button type="submit" class="btn btn-fill btn-danger" style="width: 100px">Save</button>
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

    var increment_id = 1;
    function set_empty() {
        document.getElementById('div_sub_category').innerHTML = "";
    }
    function set_category(evn) {
        var values = evn.value;
        //  alert('val ' + values);
        $("#category_id").val(values);
        load_subcategory();
    }

    function category_select() {
        $.ajax({
            url: "{{ route('ajax.category') }}",
            type: "get",
            success: function (result) {
                //  document.getElementById('category_id_h[0]').innerHTML = "";
                for (i = 0; i < result.length; i++) {
                    $("#category_id_h0").append('<option value="' + result[i].id + '">' + result[i].text + '</option>');
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
        var category_id = $("#category_id").val();
        $.ajax({
            url: "{{ route('ajax.sub_category') }}",
            type: "get",
            data: {id: category_id},
            success: function (result) {
                if (result.length != 0) {
                    var html_string = '<div class="form-group" id="sub_category">' +
                        '<label for="sub_category_id" class="col-sm-3 control-label">Sub Category</label>' +
                        '<div class="col-sm-8">' +
                        '<select class="form-control select2" id="category_id_h' + increment_id + '" name="category_id_h[' + increment_id + ']" onchange="set_category(this);">';

                    increment_id = increment_id + 1;
                    $("#increment_id").val(increment_id);

                    for (i = 0; i < result.length; i++) {
                        html_string = html_string + '<option value="' + result[i].id + '">' + result[i].text + '</option>';
                    }

                    html_string = html_string + ' </select> ' +
                        '</div> ' +
                        '</div>';

                    $("#div_sub_category").append(html_string);
                }else{
                    $("#div_sub_category").append('');
                }
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }

</script>


@endpush