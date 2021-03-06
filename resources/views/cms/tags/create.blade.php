@extends('cms.layouts.default')
@section('content')
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4>Create new tag</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              {!! Form::open(['method' => 'POST', 'route' => 'tags.store', 'class' => 'add']) !!}
                @include('cms.tags.forms.create_tag')
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
