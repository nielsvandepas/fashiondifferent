@extends('master')

@section('title')
	Register @ Fashion Different
@stop

@section('main')
	@include('partials.forms.profile', ['profile' => new FashionDifferent\User, 'target' => 'profile/register', 'method' => null])
@stop
