@extends('cms.layouts.default')
@section('content')
<div class="col-md-12">
			<a href="{!! route('articles.create') !!}" class="btn btn-xs btn-success pull-right"><i class="material-icons">add</i>Add article</a>
	<div class="card">
		<div class="card-header" data-background-color="purple">
			<h4 class="title">Articles</h4>
		</div>
	@if($articles->count() === 0)
	<div class="card-content table-responsive">
		<div class="alert alert-warning text-center">
			<b>No articles found</b>
		</div>
	</div>
    @else
	<div class="card-content table-responsive">
		<table class="table">
			<thead class="text-primary">
				<tr>
					<th>id</th>
					<th>title</th>
					<th>seen</th>
					<th>active</th>
					<th class="text-right">actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($articles as $article)
				<tr>
					<td>{!! $article->id !!}</td>
					<td><a href="{!! route('articles.edit', [$article->id]) !!}">{!! $article->title !!}</a></td>
					<td>{!! $article->seen !!}</td>
					<td>{!! $article->active !!}</td>
					<td class="text-primary">
						<form class="pull-right" method="post" action="{!! url('articles/'.$article->id) !!}">
	                        {!! csrf_field() !!}
	                        {!! method_field('DELETE') !!}
							<a type="button" rel="tooltip" title="" class="del-article btn btn-danger btn-simple btn-xs pull-right" data-original-title="Delete article">
								<i class="material-icons">close</i>
							</a>
						</form>
						<a href="{!! route('articles.edit', [$article->id]) !!}" type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs pull-right" data-original-title="Edit article">
							<i class="material-icons">edit</i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
	</div>
</div>
@stop
