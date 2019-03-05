@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" onclick="location.href = '{{ URL::route('addUser') }}';">
            <span class="fa fa-plus"></span> Add User
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access</th>
                    <th>Profile Image</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $userRow)
                <tr>
                    <td><a href="editUser/{{ $userRow->id }}">{{ $userRow->name }}</a></td>
                    <td>{{ $userRow->email }}</td>
                    <td>{{ $userRow->roleName }}</td>
                    <td>
                        @if ($userRow->profileImg != '')
                        <img width="100" height="100" src="{{ asset('assets/images/users') }}/{{ $userRow->profileImg }}">
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="deleteUser/{{ $userRow->id }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
    $(".sidebar-menu li").removeClass("active");
    $('#nav-users').addClass('active');
    });
</script>
@endsection
