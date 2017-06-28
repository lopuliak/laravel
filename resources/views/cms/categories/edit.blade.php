@extends('cms.layouts.default')
@section('content')
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4>Edit category</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'class' => 'edit']) !!}
                @include('cms.categories.forms.edit_category')
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
