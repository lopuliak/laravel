@extends('cms.layouts.default')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="deleteModalLabel">Delete Blog</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure want to delete this article?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
			<a href="{!! route('articles.create') !!}" class="btn btn-xs btn-success pull-right"><i class="material-icons">add</i>Add article</a>
	<div class="card">
		<div class="card-header" data-background-color="purple">
			<h4 class="title">Articles</h4>
		</div>
	@if($articles->count() === 0)
        <div class="well text-center">No articles found</div>
    @else
	<div class="card-content table-responsive">
		<table class="table">
			<thead class="text-primary">
				<tr>
					<th class="text-center">id</th>
					<th class="text-center">title</th>
					<th class="text-center">seen</th>
					<th class="text-center">active</th>
					<th class="text-center">actions</th>
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
						<form method="post" action="{!! url('articles/'.$article->id) !!}">
	                        {!! csrf_field() !!}
	                        {!! method_field('DELETE') !!}
						</form>
						<a href="" class="btn btn-xs btn-danger pull-right"><i class="material-icons">delete</i> del</a>
						<a href="{!! route('articles.edit', [$article->id]) !!}" class="btn btn-xs btn-primary pull-right"><i class="material-icons">mode_edit</i> edit</a>
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
