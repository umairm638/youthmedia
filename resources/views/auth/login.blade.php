<!DOCTYPE html>
<html>
    <head>
        <title>Youth Media</title>
        <link href="{{ asset('assets/images/logo.png') }}" rel="Shortcut Icon" type="image/ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">
        <!-- Custome Design -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="app app-default">

            <div class="app-container app-login">
                <div class="flex-center">
                    <div class="app-header"></div>
                    <div class="app-body">
                        <div class="loader-container text-center">
                            <div class="icon">
                                <div class="sk-folding-cube">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
                                </div>
                            </div>
                            <div class="title">Logging in...</div>
                        </div>
                        <div class="app-block">
                            <div class="app-form">
                                <div class="form-header">
                                    <div class="app-brand"><span class="highlight">Youth Media</span> Admin</div>
                                </div>
                                <form id="loginForm" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="fa fa-key" aria-hidden="true"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <div class="text-center">
                                        <input id="loginBtn" type="submit" class="btn btn-success btn-submit" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="app-footer">
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="{{ asset('assets/js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
        <script>
$(document).ready(function () {
    $('#loginBtn').click(function () {
        document.getElementById('loginForm').submit();
    });
});
        </script>
    </body>
</html>