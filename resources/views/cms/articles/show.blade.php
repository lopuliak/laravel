@extends('cms.layouts.default')
@section('content')
<div class="card">
		<div class="card-header" data-background-color="purple">
			<h4 class="title">{{ $article->title }}</h4>
		</div>
		<div class="card-content">
	        <div class="col-md-8">
	            <p class="lead">{!! $article->content !!}</p>
	        </div>
	        <div class="col-md-4">
	            <div class="well">
	                <dl class="dl-horizontal">
	                    <label>Created At:</label>
	                    <p>{{ date('M j, Y h:ia', strtotime($article->created_at)) }}</p>
	                </dl>

	                <dl class="dl-horizontal">
	                    <label>Last Updated:</label>
	                    <p>{{ date('M j, Y h:ia', strtotime($article->updated_at)) }}</p>
	                </dl>
	                <hr>
	                <div class="row">
	                    <div class="col-sm-6">
	                        {!! Html::linkRoute('articles.edit', 'Edit', array($article->id), array('class' => 'btn btn-primary btn-block')) !!}
	                    </div>
	                    <div class="col-sm-6">
	                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'DELETE']) !!}

	                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

	                        {!! Form::close() !!}
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-12">
	                        {{ Html::linkRoute('articles.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
	                    </div>
	                </div>

	            </div>
	        </div>
    	</div>
</div>
@stop
