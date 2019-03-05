@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="submit" form="permissionsForm" class="btn btn-success">
            <span class="fa fa-plus"></span> Save Permissions
        </button>
        <button type="button" class="btn btn-success margin-left-class" onclick="location.href = '{{ URL::route('manageRoles') }}';">
            <span class="fa fa-plus"></span> Manage Roles
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding" style="overflow-x:auto;">
        <form action="{{ URL::route('set-module-permissions') }}" method="post" name="permissionsForm" id="permissionsForm">
            {{ csrf_field() }}
            <table class="table table-striped primary table-responsive" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Dashboard</th>
                        <th>Users</th>
                        <th>Pages</th>
                        <th>Websites</th>
                        <th>Categories</th>
                        <th>Posts</th>
                        <th>Pending Posts</th>
                        <th>Subscription</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permissionsRow)
                    @if($permissionsRow->name != 'Admin')
                    <tr>
                        <td>{{ $permissionsRow->name }}</td>
                        <td><input type="checkbox" name="dashboard[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->dashboard == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="users[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->users == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="pages[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->pages == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="websites[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->websites == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="categories[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->categories == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="posts[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->posts == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="pending[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->pending == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="subscription[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->subscription == 1) ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="permissions[]" value="{{ $permissionsRow->roleId }}" {{ ($permissionsRow->permissions == 1) ? 'checked' : '' }}></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-permissions').addClass('active');
    });
</script>
@endsection
