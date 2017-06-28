@extends('cms.layouts.default')
@section('content')
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4>Edit tag</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'patch', 'class' => 'edit']) !!}
                @include('cms.tags.forms.edit_tag')
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
