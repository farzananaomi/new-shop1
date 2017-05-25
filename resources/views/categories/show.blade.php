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
                                @include('partials.bs_static', ['label' => 'Name', 'value' => $category->name])
                                @include('partials.bs_static', ['label' => 'Voter No', 'value' => $category->description])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <a href="{{ route('categories.edit', $category->id) }}"
               class="btn btn-fill btn-info"><i class="fa fa-pencil"></i> Edit Member Info</a>
            <a href="{{ route('invoices.show', [$category->id, 'download' => 'pdf']) }}" rel="tooltip" title="" class="btn btn-info" target="_blank"
               data-original-title="Export PDF"><i class="material-icons"></i> Export</a>
            <a href="{{ route('categories.index') }}"
               class="btn btn-fill btn-warning pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
@endsection

