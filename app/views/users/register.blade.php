@extends('layouts.main')

@section('content')

{{ Form::open(array('action'=>'UsersController@postCreate', 'class'=>'form-signup')) }}
<h2 class="form-signup-heading">Please Register</h2>

{{--{{ ErrorDisplay::DisplayAll($errors) }}--}}

<div class="form-group">{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "firstname") }}
</div>
<div class="form-group">{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "lastname") }}
</div>
<div class="form-group">{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "username") }}
</div>
<div class="form-group">{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "email") }}
</div>
<div class="form-group">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "password") }}
</div>
<div class="form-group">{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
    {{ ErrorDisplay::DisplayIndividual($errors, "password_confirmation") }}
</div>

{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@stop