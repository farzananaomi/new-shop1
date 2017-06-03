@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="header">Basic Information</div>
                <div class="content">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-xs-12">
                                @if($invoice->items->count() > 0)
                                    @foreach($invoice->items as $idx => $item)
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title" style="text-align: center">Invoice{{  $idx + 1 }} </h4>
                                                </div>
                                                <div class="card-content">
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->product_id])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->quantity])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->unit_price])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->vat_rate])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->vat_total])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->discount])
                                                    @include('partials.bs_static', ['label' => 'Tilte Of Story', 'value' => $item->ground_total])
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <a href="{{ route('invoices.edit', $invoice->id) }}"
               class="btn btn-fill btn-info"><i class="fa fa-pencil"></i> Edit Member Info</a>
            <a href="{{ route('invoices.show', [$invoice->id, 'download' => 'pdf']) }}" rel="tooltip" title="" class="btn btn-info" target="_blank"
               data-original-title="Export PDF"><i class="material-icons"></i> Export</a>
            <a href="{{ route('invoices.index') }}"
               class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
@endsection

