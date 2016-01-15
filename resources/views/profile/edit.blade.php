@extends('master')

@section('title')
	Edit Profile
@stop

@section('main')
	@include('partials.forms.profile', ['profile' => $user, 'target' => 'profile/' . $user->id, 'method' => 'PATCH'])
@stop