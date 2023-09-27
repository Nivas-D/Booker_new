@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'roles',
    'elementName' => 'roles-index'
])


@section('content')

    <h1 class="mb-3">Roles</h1>

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            @if(Auth::user()->can('role-create'))
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
            @endif
        </div>



        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                @if(Auth::user()->can('role-show'))
                <td>

                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>

                </td>
                @endif
                @if(Auth::user()->can('role-edit'))
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                </td>
                @endif
                @if(Auth::user()->can('role-delete'))
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection
