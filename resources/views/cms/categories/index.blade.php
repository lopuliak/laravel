@extends('cms.layouts.default')

@section('content')
<div class="col-md-12">
			<a href="{!! route('categories.create') !!}" class="btn btn-xs btn-success pull-right"><i class="material-icons">add</i>Add category</a>
	<div class="card">
    <div class="card-header" data-background-color="purple">
    	<h4 class="title">Categories</h4>
    </div>
    @if($categories->count() === 0)
      <div class="card-content table-responsive">
        <div class="alert alert-warning text-center">
          <b>No categories found</b>
        </div>
      </div>
    @else
    <div class="card-content table-responsive">
      <table class="table">
        <thead class="text-primary">
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Parent id</th>
            <th>Sorted</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
              <tr>
                  <td>{!! $category->id !!}</td>
                  <td><a href="{!! route('categories.edit', [$category->id]) !!}">{!! $category->name !!}</a></td>
                  <td>{!! $category->pid !!}</td>
                  <td>{!! $category->sort !!}</td>
                  <td class="text-primary">
        						<form class="pull-right" method="post" action="{!! url('categories/'.$category->id) !!}">
        	                        {!! csrf_field() !!}
        	                        {!! method_field('DELETE') !!}
        							<a type="button" rel="tooltip" title="" class="del-article btn btn-danger btn-simple btn-xs pull-right" data-original-title="Delete category">
        								<i class="material-icons">close</i>
        							</a>
        						</form>
        						<a href="{!! route('categories.edit', [$category->id]) !!}" type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs pull-right" data-original-title="Edit category">
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
