<!DOCTYPE html>
<html>
    <head>
        <title>Youth Screen</title>

        <link href="{{ asset('assets/images/logo.png') }}" rel="Shortcut Icon" type="image/ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">
        <!-- Custome Design -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <!-- Custome JS -->
        <script src="{{ asset('js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    </head>
    <body>
        <div class="app app-default">

            <aside class="app-sidebar" id="sidebar">
                <div class="sidebar-header">
                    <a class="sidebar-brand" href="{{url('admin')}}"><span class="highlight">Youth Screen</span></a>
                    <button type="button" class="sidebar-toggle">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="sidebar-menu">
                    <ul class="sidebar-nav">
                        @if ($userRoles[0]->dashboard == 1)
                        <li id="nav-home">
                            <a href="{{url('admin')}}">
                                <div class="icon">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                </div>
                                <div class="title">Dashboard</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->users == 1)
                        <li id="nav-users">
                            <a href="{{url('userList')}}">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="title">Users</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->pages == 1)
                        <li id="nav-pages">
                            <a href="{{url('pages')}}">
                                <div class="icon">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                </div>
                                <div class="title">Pages</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->websites == 1)
                        <li id="nav-website">
                            <a href="{{url('websites')}}">
                                <div class="icon">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                </div>
                                <div class="title">Websites</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->categories == 1)
                        <li id="nav-category">
                            <a href="{{url('categories')}}">
                                <div class="icon">
                                    <i class="fa fa-retweet" aria-hidden="true"></i>
                                </div>
                                <div class="title">Categories</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->posts == 1)
                        <li id="nav-post">
                            <a href="{{url('posts')}}">
                                <div class="icon">
                                    <i class="fa fa-retweet" aria-hidden="true"></i>
                                </div>
                                <div class="title">Posts</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->pending == 1)
                        <li id="nav-pending">
                            <a href="{{url('pending')}}">
                                <div class="icon">
                                    <i class="fa fa-retweet" aria-hidden="true"></i>
                                </div>
                                <div class="title">Pending Posts</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->subscription == 1)
                        <li id="nav-subscribe">
                            <a href="{{url('usersubscription')}}">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="title">Subscription</div>
                            </a>
                        </li>
                        @endif 

                        @if ($userRoles[0]->subscription == 1)
                        <li id="nav-subscribe">
                            <a href="{{url('emailToSubscribers')}}">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="title">Send Mails</div>
                            </a>
                        </li>
                        @endif
                        @if ($userRoles[0]->permissions == 1)
                        <li id="nav-permissions">
                            <a href="{{url('permissions')}}">
                                <div class="icon">
                                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                </div>
                                <div class="title">Permissions</div>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </aside>
            <?php
            $proImg = $userImg != '' ? asset('assets/images/users') . '/' . $userImg : asset('assets/images/profile.png');
            ?>
            <div class="app-container">

                <nav class="navbar navbar-default" id="navbar">
                    <div class="container-fluid">
                        <div class="navbar-collapse collapse in">
                            <ul class="nav navbar-nav navbar-mobile">
                                <li>
                                    <button type="button" class="sidebar-toggle">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </li>
                                <li class="logo">
                                    <a class="navbar-brand" href="#"><span class="highlight">Youth Screen</span> Admin</a>
                                </li>
                                <li>
                                    <button type="button" class="navbar-toggle">
                                        <img class="profile-img" src="{{$proImg}}">
                                    </button>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="navbar-title">{{ $pageheader }}</li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown profile">
                                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                        <img class="profile-img" src="{{$proImg}}">
                                        <div class="title">Profile</div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="profile-info">
                                            <h4 class="username">{{ $userName }}</h4>
                                        </div>
                                        <ul class="action">
                                            <li>
                                                <a href="{{url('profile')}}">
                                                    Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{url('logout')}}">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>

                <footer class="app-footer"> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="footer-copyright">
                                Copyright © 2019 <a href="http://halfonyx.com/" target="_blank">Halfonyx</a>.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('assets/js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
        <link rel="stylesheet" media="screen" type="text/css" href="{{ asset('js/colorpicker/css/colorpicker.css') }}" />
        <script type="text/javascript" src="{{ asset('js/colorpicker/js/colorpicker.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}"/>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
    </body>
</html>