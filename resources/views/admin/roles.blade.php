@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRolesModel">
            <span class="fa fa-plus"></span> Add Roles
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <form action="{{ URL::route('set-module-permissions') }}" method="post" name="permissionsForm" id="permissionsForm">
            {{ csrf_field() }}
            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permissionsRow)
                    @if($permissionsRow->name != 'Admin')
                    <tr>
                        <td>{{ $permissionsRow->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a onclick="editRole({{ $permissionsRow->roleId }})" data-toggle="modal" data-target="#editRolesModel" href="javascript:void(0)">Edit</a></li>
                                    <li><a href="deleteRole/{{ $permissionsRow->roleId }}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
    <!-- Add Roles Modal -->
    <div class="modal fade" id="addRolesModel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Roles</h4>
                </div>
                <div class="modal-body images-form">
                    <form id="rolesAddForm" class="form form-horizontal" method="POST" action="{{ URL::route('saveRole') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-3 control-label">Role Name *</label>
                            <div class="col-md-9">
                                <input required="" type="text" id="roleName" name="roleName" class="form-control" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="rolesAddForm" id="save-roles-btn" type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Edit Roles Modal -->
    <div class="modal fade" id="editRolesModel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Roles</h4>
                </div>
                <div class="modal-body images-form">
                    <form id="rolesEditForm" class="form form-horizontal" method="POST" action="{{ URL::route('updateRole') }}">
                        <input type="hidden" name="editRoleId" id="editRoleId" value="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-3 control-label">Role Name *</label>
                            <div class="col-md-9">
                                <input required="" type="text" id="editRoleName" name="editRoleName" class="form-control" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="rolesEditForm" id="save-edit-roles-btn" type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-permissions').addClass('active');
    });
</script>
@endsection
