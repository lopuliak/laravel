@extends('cms.layouts.default')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="deleteModalLabel">Delete User</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <a class="btn btn-primary pull-right" href="{!! route('users.create') !!}">Add New</a>
    <h1 class="page-header">Users</h1>
</div>

<div class="row">

    @if($users->count() === 0)
        <div class="well text-center">No users found.</div>
    @else
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>

                <th width="200px" class="text-right">Actions</th>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td><a href="{!! route('users.edit', [$user->id]) !!}">{!! $user->name !!}</a></td>
                    <td class="raw-m-hide">{!! $user->email !!}</td>

                    <td class="text-right">
                        <form method="post" action="{!! url('users/'.$user->id) !!}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="{!! route('users.edit', [$user->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@stop
