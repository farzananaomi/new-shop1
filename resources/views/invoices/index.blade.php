@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">Invoice List</div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">Customer Information</div>
                            <div class="content">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <div class="col-xs-6">

{{--
                                            @include('partials.bs_static', ['label' => ' Customer Name', 'value' => $invoice->customer_name])
--}}

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush