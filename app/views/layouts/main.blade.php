<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Authentication App With Laravel 4</title>

    {{ HTML::style('asset/css/bootstrap.min.css') }}
    {{ HTML::style('asset/css/main.css')}}
</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                    <li>{{ link_to_action('UsersController@getRegister', 'Register') }}</li>
                    <li>{{ link_to_action('UsersController@getLogin', 'Login') }}</li>
                @else
                    <li>{{ link_to_action('UsersController@getLogout', 'Logout') }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    @yield('content')

</div>

<footer class="navbar navbar-default navbar-fixed-bottom">
        Laravel 4 Prototype - Copyright By: Nguyen Trung Thanh
</footer>
</body>
</html>