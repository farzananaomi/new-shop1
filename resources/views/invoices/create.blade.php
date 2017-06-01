@extends('layouts.base')

@section('content')
    <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Customer Information</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-6">
                                    @include('partials.bs_text', ['name' => 'customer_name', 'label' => 'Full Name', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_text', ['name' => 'customer_contact', 'label' => 'Contact', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_textarea', ['name' => 'customer_address', 'label' => 'Address', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                </div>
                                <div class="col-xs-6">
                                    @include('partials.bs_text', ['name' => 'invoice_no', 'label' => 'Invoice No', 'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])
                                    @include('partials.bs_date', ['name' => 'invoice_date',  'label' => 'Invoice Date', 'useOld' => '','horizontal' => 'true', 'extras' => 'data-bind="text: dob"',])
                                    @include('partials.selectpicker', ['name' => 'status',  'label' => 'Payment Type',  'options' =>['Cash', 'Card', 'Others'], 'horizontal' => 'true','useKeys' => false,'useOld' => '',])

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">Invoice Information</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card-content table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-primary">
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Vat(%)</th>
                                                <th>Discount(%)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>@include('partials.bs_table', ['name' => 'items[1][product_id]',  'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])</td>
                                                <td>@include('partials.bs_table', ['name' => 'items[1][quantity]',  'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])</td>
                                                <td>@include('partials.bs_table', ['name' => 'items[1][unit_price]',  'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])</td>
                                                <td>@include('partials.bs_table', ['name' => 'items[1][vat]',  'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])</td>
                                                <td>@include('partials.bs_table', ['name' => 'items[1][discount]',  'useOld' => '', 'horizontal' => 'true', 'extras' => 'required="required"'])</td>

                                            </tr>
                                            <input type="text" hidden="hidden" value="1" id="countexp" name="countexp"/>
                                            <tbody id="exp" name="exp"></tbody>

                                            <tr><td></td><td><input  type="button" id="2" value="+ Add More"  onclick="addExp()"/></td></tr>

                                            </tbody>
                                        </table>

                                    </div>
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
                    <a href="{{ route('invoices.index') }}"
                       class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Cancel</a>
                </div>
            </div>
        </div>


    </form>

@endsection
@push('scripts')
<script type="text/javascript">
    $('.datepicker').datetimepicker(
        {
            format: 'YYYY-MM-DD'
        }
    );
    var countBox =2;

    function addExp()
    {
        document.getElementById("countexp").value= countBox;

        var newChild = document.createElement("tr");
        document.getElementById("countexp").value= countBox;

        $("#exp").append(
            "<tr>" +
                "<td><input type='text' id='items["+ countBox +"][product_id]' name='items["+ countBox+"][product_id]'/></td>" +
                "<td><input type='text' id='items["+ countBox +"][quantity]' name='items["+ countBox +"][quantity]'/></td>" +
                "<td><input type='text' id='items["+ countBox +"][unit_price]' name='items["+ countBox +"][unit_price]'/></td>" +
                "<td><input type='text' id='items["+ countBox +"][vat]"+countBox +"' name='items["+ countBox +"][vat]'/></td>" +
                "<td><input type='text' id='items["+ countBox +"][discount]' name='items["+ countBox +"][discount]'/></td>" +
            "</tr>");

        countBox += 1;
    }
</script>
@endpush

