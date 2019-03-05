@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Setting
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body">
        <form enctype="multipart/form-data" id="updateProfileForm" class="form form-horizontal" method="POST" action="{{ URL::route('updateProfile') }}">
            {{ csrf_field() }}
            <div class="section">
                <div class="section-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name *</label>
                        <div class="col-md-9">
                            <input type="hidden" id="userId" name="userId" value="{{ $users[0]->id }}">
                            <input type="hidden" id="redirectTo" name="redirectTo" value="{{ $redirectTo }}">
                            <input required="" type="text" id="name" name="name" class="form-control" value="{{ $users[0]->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email *</label>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" class="form-control" readonly="" value="{{ $users[0]->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Password</label>
                            <p class="control-label-help">( Leave Blank if you don't want to update Password. )</p>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm Password</label>
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
                                    <option {{{ ($users[0]->userRole == $permissionsRow->roleId) ? 'selected' : '' }}} value="{{ $permissionsRow->roleId }}">{{ $permissionsRow->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-9">
                            <input type="text" id="userPhone" name="userPhone" class="form-control" value="{{ $users[0]->userPhone }}">
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Profile Image</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="profileImg" id="profileImg">
                        </div>
                        @if ($users[0]->profileImg != '')
                        <div class="col-md-offset-3 col-md-6">
                            <img src="{{ asset('assets/images/users') }}/{{ $users[0]->profileImg }}" alt="Image Not Found" width="100" height="80"> 
                        </div>
                        @endif
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
