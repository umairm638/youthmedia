@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add User
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body">
        <form enctype="multipart/form-data" id="addUserForm" class="form form-horizontal" method="POST" action="{{ URL::route('insertUser') }}">
            {{ csrf_field() }}
            <div class="section">
                <div class="section-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name *</label>
                        <div class="col-md-9">
                            <input required="" type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email *</label>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password *</label>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm Password *</label>
                        <div class="col-md-9">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Role *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select required="" id="userRole" name="userRole" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    @foreach ($permissions as $permissionsRow)
                                    <option @if (old('userRole') == $permissionsRow->roleId) selected="selected" @endif value="{{ $permissionsRow->roleId }}">{{ $permissionsRow->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-9">
                            <input type="text" id="userPhone" name="userPhone" class="form-control" value="{{ old('userPhone') }}">
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Profile Image</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="profileImg" id="profileImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" onclick="location.href = '{{ URL::route('userList') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-users').addClass('active');
    });
</script>
@endsection
