@extends('layouts.main')

@section('content')

{{ Form::open(array('action'=>'UsersController@postSignin', 'class'=>'form-signin')) }}
<h2 class="form-signin-heading">Please Login</h2>

<div class="form-group">{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}</div>
<div class="form-group">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}</div>

{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@stop