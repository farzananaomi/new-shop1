@extends('layouts.base')


@section('styles')
    <style>
        .mdl-card__actions {
            display: flex;
            box-sizing:border-box;
            align-items: center;
            border-top: 1px solid rgba(0,0,0,.1);
        }
    </style>
@endsection

@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <legend>List of Category</legend>
            <div class="btn-group pull-right" role="group">
                <a class="btn btn-success" href="{{ route('categories.create') }}"><span class="glyphicons glyphicons-plus"></span>Add New Category</a>
            </div>

        </div>
    </div>

    <div class="mdl-grid">
        @foreach($categories as $category)
            <div class="mdl-card mdl-cell mdl-cell--3-col mdl-cell--6-col-tablet mdl-cell--12-col-phone mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">{{ $category->name }}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    {{ $category->description }}
                </div>

            </div>
        @endforeach
    </div>
@endsection