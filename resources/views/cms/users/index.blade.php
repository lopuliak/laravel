@extends('cms.layouts.default')
@section('content')
<div class="col-md-12">
			<a href="{!! route('users.create') !!}" class="btn btn-xs btn-success pull-right"><i class="material-icons">add</i>Add user</a>
	<div class="card">
		<div class="card-header" data-background-color="purple">
			<h4 class="title">Users</h4>
		</div>
	@if($users->count() === 0)
		<div class="card-content table-responsive">
			<div class="alert alert-warning text-center">
				<b>No users found</b>
			</div>
	    </div>
    @else
	<div class="card-content table-responsive">
		<table class="table">
			<thead class="text-primary">
				<tr>
					<th>Name</th>
					<th>Email</th>
                    <th>Provider</th>
					<th class="text-right">actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td><a href="{!! route('users.edit', [$user->id]) !!}">{!! $user->name !!}</a></td>
					<td>{!! $user->email !!}</td>
                    <td>{!! $user->provider !!}</td>
					<td class="text-primary">
						<form class="pull-right" method="post" action="{!! url('users/'.$user->id) !!}">
	                        {!! csrf_field() !!}
	                        {!! method_field('DELETE') !!}
							<a type="button" rel="tooltip" title="" class="del-article btn btn-danger btn-simple btn-xs pull-right" data-original-title="Delete user">
								<i class="material-icons">close</i>
							</a>
						</form>
						<a href="{!! route('users.edit', [$user->id]) !!}" type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs pull-right" data-original-title="Edit user">
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
