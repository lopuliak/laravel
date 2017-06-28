@extends('cms.layouts.default')

@section('content')
<div class="col-md-12">
			<a href="{!! route('tags.create') !!}" class="btn btn-xs btn-success pull-right"><i class="material-icons">add</i>Add tag</a>
	<div class="card">
    <div class="card-header" data-background-color="purple">
    	<h4 class="title">Tags</h4>
    </div>
    @if($tags->count() === 0)
      <div class="card-content table-responsive">
        <div class="alert alert-warning text-center">
          <b>No tags found</b>
        </div>
      </div>
    @else
    <div class="card-content table-responsive">
      <table class="table">
        <thead class="text-primary">
          <tr>
            <th>Tag name</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tags as $tag)
              <tr>
                  <td><a href="{!! route('tags.edit', [$tag->id]) !!}">{!! $tag->name !!}</a></td>
                  <td class="text-primary">
        						<form class="pull-right" method="post" action="{!! url('tags/'.$tag->id) !!}">
        	                        {!! csrf_field() !!}
        	                        {!! method_field('DELETE') !!}
        							<a type="button" rel="tooltip" title="" class="del-article btn btn-danger btn-simple btn-xs pull-right" data-original-title="Delete tag">
        								<i class="material-icons">close</i>
        							</a>
        						</form>
        						<a href="{!!  route('tags.edit', [$tag->id])  !!}" type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs pull-right" data-original-title="Edit tag">
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
