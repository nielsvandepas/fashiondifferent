@extends('master')

@section('title')
	Register
@stop

@section('main')
	@include('partials.forms.profile', ['profile' => new FashionDifferent\User, 'target' => 'profile/register', 'method' => null, 'acceptButtonText' => 'register'])
@stop
