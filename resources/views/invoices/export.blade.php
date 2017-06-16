<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600">
    <style>
       body {
            width: 8.27in;
            margin: auto;
            padding: 0.0in;
            line-height: 1.6;
        }

       /* table {
            width: 100%;
            table-layout: fixed;
            text-align: left;
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        caption, td {
            padding: 0.08in 0.1in 0.06in;
            height: 0.25in;
            border: 1px solid #2e2e2e;
        }

        caption {
            text-align: left;
            background: #d0cece;
            font-weight: bold;
            border-bottom: none;
            margin-right: -1px;
        }

        td.label {
            width: 1.6in;
            font-weight: bold;
        }

        td.label.label-xs {
            width: 0.4in;
        }

        td.label.label-sm {
            width: 1.4in;
        }

        td.label.label-md {
            width: 1.8in;
        }

        td.label.label-lg {
            width: 2in;
        }

        td.label.label-em {
            background-color: #ddd;
        }

        .no-top-border, .no-top-border > td {
            border-top-width: 0;
        }

        .no-bottom-border, .no-bottom-border > td {
            border-bottom-width: 0;
        }

        table:last-of-type, table:last-of-type tr:last-child,
        table:last-of-type tr:last-child > td {
            border-bottom-width: 1px !important;
        }*/

        .page-title {
            width: 100%;
            text-align: center;
        }


    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td align="center" >
            <h2 class="page-title">Shamuk Fashion</h2>
        </td>
    </tr>
    <tr>
        <td align="center"> Dhanmondi Dhaka

        </td>
    </tr>
    <tr>
        <td align="center"> Vat Reg No#12345678765432

        </td>
    </tr>
    <tr>
        <td align="center">
            <table width="100%">
                <tr >
                    <td>{{date('d/m/Y')}}</td>
                    <td></td>
                    <td></td>
                    <td>{{date('h-i-s A')}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td> Invoice No# {{$invoice->id}}</td>
    </tr>
    <tr>
        <td>Customer ID: {{$invoice->customer->id}}</td>
        <td>Customer Name: {{$invoice->customer->customer_name}}</td>
        <td>Salesman: {{Auth::user()->name}}</td>
    </tr>
</table>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoice->items as $item)
        <tr>
            <td class="table-name">{{$item->name}}</td>
            <td class="table-price">{{$item->unit_price}}</td>
            <td class="table-qty">{{$item->quantity}}</td>
            <td class="table-total text-right">{{$item->quantity * $item->unit_price}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Sub Total</td>
        <td class="table-amount">{{$invoice->sub_total}}</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Discount</td>
        <td class="table-amount">{{$invoice->discount}} Tk</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Vat</td>
        <td class="table-amount">{{$invoice->vat_total}} Tk</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Grand Total</td>
        <td class="table-amount">{{$invoice->grand_total}}</td>
    </tr>
    <hr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Pay Type:</td>
        <td class="table-amount">{{$invoice->payment_type}} </td>
    </tr>
    </tfoot>
</table>
</body>
</html>
