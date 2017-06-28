@extends('cms.layouts.default')
@section('content')
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4>Create new category</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              {!! Form::open(['method' => 'POST', 'route' => 'categories.store', 'class' => 'add']) !!}
                @include('cms.categories.forms.create_category')
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
