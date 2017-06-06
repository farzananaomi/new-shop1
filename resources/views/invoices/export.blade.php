<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600">
    <style>
        body {
            width: 8.27in;
            margin: auto;
            padding: 0.25in;

            font-family: "Raleway", sans-serif;
            font-size: 11pt;

            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0 !important;
        }

        table {
            width: 100%;
            table-layout: fixed;
            text-align: left;
            border-collapse: collapse;
            page-break-inside:avoid;
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

        .no-top-border, .no-top-border  > td {
            border-top-width: 0;
        }
        .no-bottom-border, .no-bottom-border > td {
            border-bottom-width: 0;
        }

        table:last-of-type, table:last-of-type tr:last-child,
        table:last-of-type tr:last-child > td {
            border-bottom-width: 1px !important;
        }

        .page-title {
            width: 100%;
            text-align: center;
        }

        .profile-image {
            height: 2.2in;
            width: 2in;
            float: right;
            border: 1px solid #2e2e2e;
            margin-left: 0.1in;
            margin-top: 0.25in;
            margin-bottom: 0.1in;
        }
    </style>
</head>
<body>





<h1 class="page-title" style="padding-left: 1.15in;">Employee Information</h1>

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
            <td class="table-price">${{$item->unit_price}}</td>
            <td class="table-qty">{{$item->quantity}}</td>
            <td class="table-total text-right">${{$item->quantity * $item->unit_price}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label" style="border:0">Sub Total</td>
        <td class="table-amount">${{$invoice->sub_total}}</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Discount</td>
        <td class="table-amount">{{$invoice->discount}} Tk</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2" style="border:0"></td>
        <td class="table-label">Grand Total</td>
        <td class="table-amount">${{$invoice->ground_total}}</td>
    </tr>
    </tfoot>
</table>
</body>
</html>
