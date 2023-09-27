


@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'permission',
    'elementName' => 'permission-edit'
])

@section('content')
    <div class=" p-4 rounded">
        <h1>Update role</h1>
        <div class="lead">
            Edit role and manage permissions.
        </div>

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $role->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>
                </div>

                <label for="permissions" class="form-label">Assign Permissions</label>

                <table class="table table-striped">
                    <thead>

                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="20%">Create</th>
                        <th scope="col" width="20%">Edit</th>
                        <th scope="col" width="20%">Delete</th>
                        <th scope="col" width="20%">Show</th>
                        <th scope="col" width="20%">List</th>

                        <th scope="col" width="1%">Guard</th>
                    </thead>
<?php
$checkarry = array();
?>
                    @foreach($permissions as $permission)
                    <?php
                    $name = explode('-',$permission->name );
                    if(!in_array($name[0],$checkarry)){
                        $checkarry[]= $name[0];
                        $listcreate = $name[0].'-create';
                        $listlist = $name[0].'-list';
                        $listedit = $name[0].'-edit';
                        $listdelete = $name[0].'-delete';
                        $listshow = $name[0].'-show';


                    ?>


                        <tr>
                            <td>{{ $permission->name }}</td>
                            @php
                            $permission_list= \Spatie\Permission\Models\Permission::where('name', $listlist)->first();
                            $permission_create= \Spatie\Permission\Models\Permission::where('name', $listcreate)->first();
                            $permission_edit= \Spatie\Permission\Models\Permission::where('name', $listedit)->first();
                            $permission_delete= \Spatie\Permission\Models\Permission::where('name', $listdelete)->first();
                            $permission_show= \Spatie\Permission\Models\Permission::where('name', $listshow)->first();
                        @endphp
                            <?php if( $permission_create != ''){ ?>
                            <td>
                                <input type="checkbox"
                                name="permission[{{ $listcreate }}]"
                                value="{{ $permission_create->name }}"
                                class='permission'
                                {{ in_array($permission_create->id, $rolePermissions)
                                    ? 'checked'
                                    : '' }}>
                            </td>
                            <?php } else { ?>
                                <td>
                                    <input type="checkbox"
                                    name="permission[{{  $listcreate }}]"
                                    value="{{ $listcreate }}"
                                    class='permission'
                                    {{ in_array($permission->id, $rolePermissions)
                                        ? 'checked'
                                        : '' }}>
                                </td>

                            <?php } if( $permission_edit != ''){ ?>
                                <td>
                                    <input type="checkbox"
                                    name="permission[{{ $listedit }}]"
                                    value="{{ $permission_edit->name }}"
                                    class='permission'
                                    {{ in_array($permission_edit->id, $rolePermissions)
                                        ? 'checked'
                                        : '' }}>
                                </td>
                                <?php } else {  ?>
                                    <td>
                                        <input type="checkbox"
                                        name="permission[{{$listedit  }}]"
                                        value="{{ $listedit }}"
                                        class='permission'
                                        {{ in_array($permission->id, $rolePermissions)
                                            ? 'checked'
                                            : '' }}>
                                    </td>
                                <?php  } if( $permission_delete != ''){ ?>
                                    <td>
                                        <input type="checkbox"
                                        name="permission[{{ $listdelete }}]"
                                        value="{{ $permission_delete->name }}"
                                        class='permission'
                                        {{ in_array($permission_delete->id, $rolePermissions)
                                            ? 'checked'
                                            : '' }}>
                                    </td>
                                    <?php } else { ?>
                                        <td>
                                            <input type="checkbox"
                                            name="permission[{{ $listdelete }}]"
                                            value="{{  $listdelete  }}"
                                            class='permission'
                                            {{ in_array($permission->id, $rolePermissions)
                                                ? 'checked'
                                                : '' }}>
                                        </td>
                                    <?php } if( $permission_show != ''){ ?>
                                        <td>
                                            <input type="checkbox"
                                            name="permission[{{ $listshow }}]"
                                            value="{{ $permission_show->name }}"
                                            class='permission'
                                            {{ in_array($permission_show->id, $rolePermissions)
                                                ? 'checked'
                                                : '' }}>
                                        </td>
                                        <?php } else {?>
                                            <td>

                                            </td>
                                            <?php }  if( $permission_list != ''){ ?>
                                                <td>
                                                    <input type="checkbox"
                                                    name="permission[{{ $listlist }}]"
                                                    value="{{ $permission_list->name }}"
                                                    class='permission'
                                                    {{ in_array($permission_list->id, $rolePermissions)
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <?php } else {?>
                                                    <td>

                                                    </td>
                                                    <?php } ?>



                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                        <?php } ?>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection

