@extends('layouts.base')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoice</span>
                <div class="pull-right">
                    <a href="{{route('invoices.index')}}" class="btn btn-default">Back</a>
                    <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary">Edit</a>
                    <form class="form-inline" method="post"
                          action="{{route('invoices.destroy', $invoice)}}"
                          onsubmit="return confirm('Are you sure?')"
                    >
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger">

                        <a href="{{ route('invoices.show', [$invoice->id, 'download' => 'pdf']) }}" rel="tooltip" title="" class="btn btn-info" target="_blank"
                           data-original-title="Export PDF"><i class="material-icons"></i> Export</a>

                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Invoice No.</label>
                        <p>{{$invoice->invoice_no}}</p>
                    </div>
                    <div class="form-group">
                        <label>Grand Total</label>
                        <p>${{$invoice->ground_total}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Client</label>
                        <p>{{$invoice->customer->customer_name}}</p>
                    </div>
                    <div class="form-group">
                        <label>Client Address</label>
                        <p>{{$invoice->customer->address}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>VAT</label>
                        <p>{{$invoice->vat_rate}}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Invoice Date</label>
                            <p>{{$invoice->invoice_date}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Vat total</label>
                            <p>{{$invoice->vat_total}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
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
                    <td class="table-label">Sub Total</td>
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
        </div>
    </div>

@endsection