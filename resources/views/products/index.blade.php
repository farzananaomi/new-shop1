@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">Listed Products</div>
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