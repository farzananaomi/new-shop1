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
                                <div class="col-xs-4">
                                    @include('partials.bs_text', ['name' => 'customer_name', 'label' => 'Full Name', 'useOld' => '', 'horizontal' => 'false'])
                                </div>

                                <div class="col-xs-4">
                                    @include('partials.bs_text', ['name' => 'mobile_no', 'label' => 'Contact', 'useOld' => '', 'horizontal' => 'false'])
                                </div>
                                <div class="col-xs-4">
                                    @include('partials.bs_text', ['name' => 'address', 'label' => 'Address', 'useOld' => '', 'horizontal' => 'false'])
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
                    <div class="header">Search Product By Barcode ID Only</div>
                    <div class="content">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-xs-6">
                                    @include('partials.bs_text', ['name' => 'barcode_id', 'label' => 'Barcode', 'useOld' => '', 'horizontal' => 'false'])
                                </div>
                                <div class="col-xs-4">
                                    <input type="button" id="2" class="btn btn-default" value="+ Add More"
                                           onclick="addExp()"/>
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
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Discount %</th>
                                                <th>Sub Total</th>
                                                <th>Vat %</th>

                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody id="exp" name="exp"></tbody>
                                            <tfoot>
                                            <tr>

                                                <td class="table-empty" colspan="5" style=" border: 0"></td>
                                                <td class="table-label"><input type="text" class="form-control" value="0" id="sub_total"
                                                                               name="sub_total" readonly/></td>
                                                <td class="table-amount"><input type="text" class="form-control" value="0" id="vat_total"
                                                                                name="vat_total" readonly/></td>
                                                <td class="table-amount"><input type="text" class="form-control" value="0" id="total_amount"
                                                                                name="total_amount" readonly/></td>


                                            </tr>


                                            <tr>
                                                <td class="table-empty" colspan="3" style=" border: 0"></td>
                                                <td class="table-label">Discount</td>

                                                <td><input type="text" value="0" id="discount" name="discount"
                                                           class="form-control" onchange="calculate_total();"/></td>
                                                <td class="table-label"></td>
                                                <td class="table-label">Grand Total</td>
                                                <td>
                                                    <input type="text" value="0" id="grand_total" name="grand_total"
                                                           class="form-control" readonly/></td>
                                            </tr>
                                            <tr>
                                                <td class="table-empty" colspan="6" style=" border: 0">In words <span
                                                            id="in_words"></span></td>
                                                <td class="table-label">Total Payable</td>
                                                <td>
                                                    <input type="text" value="0" id="total_payable" name="total_payable"
                                                           class="form-control" readonly/></td>
                                            </tr>


                                            </tfoot>
                                            <input type="hidden" value="1" id="countexp" name="countexp"/>
                                            <input type="hidden" value="" id="in_words_h" name="in_words_h"/>

                                        </table>

                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    @include('partials.bs_date', ['name' => 'invoice_date',  'label' => 'Invoice Date', 'useOld' => date('Y-m-d'),'horizontal' => 'false', 'extras' => 'data-bind="text: dob"',])
                                </div>
                                <div class="col-xs-4">
                                    @include('partials.selectpicker', ['name' => 'payment_type',  'label' => 'Payment Type',  'options' =>['Cash', 'Card', 'Both'], 'horizontal' => 'false','useKeys' => false,'useOld' => '',])

                                </div>


                                <div class="col-xs-2">
                                    @include('partials.bs_text', ['name' => 'card_type', 'useOld' => '','placeholder'=>'Card Details'])
                                </div>
                                <div class="col-xs-2">
                                    @include('partials.bs_text', ['name' => 'bank_amount',   'useOld' => '','placeholder'=>'Card amount'])
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
    var countBox = 1;

    $(document).ready(function () {
        $("#card_type").hide();
        $("#bank_amount").hide();
    });

    $(document).on('change', '#payment_type', function () {
        // Does some stuff and logs the event to the console
        var payment_type = $("#payment_type").val();
        if (payment_type == 'Card') {
            $("#card_type").show();
            $("#bank_amount").hide();
        } else if (payment_type == 'Both') {
            $("#card_type").show();
            $("#bank_amount").show();
            $("#bank_amount").val('');
        } else {
            $("#card_type").hide();
            $("#bank_amount").hide();
        }


    });
    function addExp() {
        var barcode_id = document.getElementById("barcode_id").value;
        if (barcode_id.length > 5) {
            $.ajax({
                url: "{{ route('ajax.get_product_details') }}",
                data: {id: barcode_id},
                type: "get",
                success: function (result) {
                    if (result.length != 0) {
                        var sub = result.sell_price - result.sell_price * result.discount_percent / 100 - result.flat_discount;
                        document.getElementById("countexp").value = countBox;
                        var newChild = document.createElement("tr");
                        document.getElementById("countexp").value = countBox;
                        $("#exp").append(
                            "<tr>" +
                            "<td><input type='text'  class='form-control'  id='items" + countBox + "_product_id' name='items[" + countBox + "][product_id]' value='" + result.barcode_id + "' readonly /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_name' name='items[" + countBox + "][name]' value='" + result.name + "' readonly /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_quantity' name='items[" + countBox + "][quantity]'  value='1' onchange='discount_change(this);'/></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_unit_price' name='items[" + countBox + "][unit_price]' value='" + result.sell_price + "' readonly /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_discount_percent' name='items[" + countBox + "][discount_percent]' value='" + result.discount_percent + "'  onchange='discount_change(this);' /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_sub_total' name='items[" + countBox + "][sub_total]' value='" + sub + "' readonly   /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_vat_rate' name='items[" + countBox + "][vat_rate]' value='" + result.vat_rate + "' onchange='discount_change(this);' /><input type='hidden'  class='form-control'  id='items_" + countBox + "_vat_total' name='items[" + countBox + "][vat_total]' value='" + (result.sub_total - sub) + "'    /></td>" +
                            "<td><input type='text'  class='form-control'  id='items_" + countBox + "_total' name='items[" + countBox + "][total]' value='" + result.sub_total + "' readonly /></td>" +
                            "</tr>");

                        countBox += 1;
                        document.getElementById("barcode_id").value = "";

                    }

                },
                error: function (xhr) {
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });


        }

        setTimeout(function () {
            calculate_total();
        }, 1000);
    }

    function discount_change(ev) {
        var id_number = ev.id.replace(/\D/g, '');

        var discount = $("#items_" + id_number + "_discount_percent").val();
        discount = convert_decimal(discount);
        discount = parseFloat(discount);
        var qty = $("#items_" + id_number + "_quantity").val();
        qty = parseInt(qty);
        var unit_price = $("#items_" + id_number + "_unit_price").val();
        unit_price = convert_decimal(unit_price);
        unit_price = parseFloat(unit_price);
        var vat = $("#items_" + id_number + "_vat_rate").val();

        vat = convert_decimal(vat);
        vat = parseFloat(vat);


        var total = $("#items_" + id_number + "_total").val();
        total = convert_decimal(total);
        total = parseFloat(total);
        var sub_total = $("#items_" + id_number + "_sub_total").val();
        sub_total = convert_decimal(sub_total);
        sub_total = parseFloat(sub_total);
        unit_price = unit_price * 100;
        sub_total = unit_price - unit_price * discount / 100;
        sub_total = sub_total * qty / 100;
        $("#items_" + id_number + "_sub_total").val(sub_total);

        // alert("Sub total " + sub_total + " vat " + vat + " total " + total);
        sub_total = sub_total * 100;
        total = sub_total + sub_total * vat / 100;
        var vat_total= sub_total * vat / 100;
        $("#items_" + id_number + "_vat_total").val(vat_total);
        //  alert("Sub total 2 " + sub_total + " vat 2 " + vat + " total 2 " + total);
        total = total / 100;
        total = convert_decimal(total);
        $("#items_" + id_number + "_total").val(total);

        // alert(" qty " + qty + " u price " + unit_price + "Sub total " + sub_total + " vat " + vat + " total " + total);
        calculate_total();
    }
    function calculate_total() {

        var n = countBox - 1;
        var sub_total = 0;
        var total = 0;
        var vat_total = 0;
        for (i = n; i >= 1; i--) {
            try {
                sub_total = sub_total + parseFloat(convert_decimal($("#items_" + i + "_sub_total").val()));
            } catch (exp) {

            }

            try {
                total = total + parseFloat(convert_decimal($("#items_" + i + "_total").val()));
            } catch (exp) {

            }
            //  alert("c sub " + sub_total + " c total " + total);
        }
        vat_total = total - sub_total;
        var flat_discunt = $("#discount").val();
        flat_discunt = convert_decimal(flat_discunt);
        flat_discunt = parseFloat(flat_discunt);
        var grand_total = total * 100 - flat_discunt * 100;
        // alert(total + " f " + flat_discunt);
        grand_total = grand_total / 100;
        grand_total = convert_decimal(grand_total);
        sub_total = convert_decimal(sub_total);
        vat_total = convert_decimal(vat_total);
        total = convert_decimal(total);
        $("#grand_total").val(grand_total);
        // $("#sub_total").html("= " + sub_total);
        // $("#vat_total").html("= " + vat_total);
        $("#vat_total").val(vat_total);
        $("#sub_total").val(sub_total);
        $("#total_amount").val( total);

        var total_payable = parseInt(grand_total);
        //  alert("c sub " + sub_total + " c total " + total + " p " + total_payable + " g " + grand_total);
        $("#total_payable").val(total_payable);
        var in_words = inWords(total_payable);
        $("#bank_amount").val(total_payable);
        $("#in_words").html("= " + in_words);
        $("#in_words_h").val(in_words);

    }
    function convert_decimal(num3) {
        try {
            num3 = parseFloat(num3);
        } catch (exp) {
            num3 = 0;
        }
        if (num3 == NaN) {
            return num3 = 0;
        }
        return parseFloat(Math.round(num3 * 100) / 100).toFixed(2);
    }


    var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
    var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];


    function inWords(num) {
        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + ' Taka only ' : '';
        return str;
    }
</script>
@endpush

