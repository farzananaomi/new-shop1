@extends('layouts.base')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoices</span>
                <a href="{{ route('invoices.index') }}"
                               class="btn btn-fill btn-warning pull-right" style="width: 100px">Create</a>

            </div>
        </div>
        <div class="panel-body">
            @if($invoices->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Invoice No.</th>
                        <th>Grand Total</th>
                        <th>Client</th>
                        <th>Invoice Date</th>
                        <th colspan="2">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->invoice_no}}</td>
                            <td>{{$invoice->grand_total}}</td>
                            <td>{{$invoice->customer->customer_name}}</td>
                            <td>{{$invoice->invoice_date}}</td>
                            <td>{{$invoice->created_at->diffForHumans()}}</td>
                            <td class="text-right">
                                <a href="{{route('invoices.show', $invoice)}}" class="btn btn-fill btn-default btn-sm">View</a>
                                <a href="{{route('invoices.edit', $invoice)}}" class="btn  btn-fill btn-primary btn-sm">Edit</a>
                                <form class="form-inline" method="post"
                                      action="{{route('invoices.destroy', $invoice)}}"
                                      onsubmit="return confirm('Are you sure?')">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="Delete" class="btn btn-fill btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $invoices->render() !!}
            @else
                <div class="invoice-empty">
                    <p class="invoice-empty-title">
                        No Invoices were created.
                        <a href="{{route('invoices.create')}}">Create Now!</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection