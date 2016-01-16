@extends('master')

@section('title')
	Page Not Found
@stop

@section('main')
	<h2>Page not found</h2>

	<p>The page that you requested couldn't be found. Please check that you've entered the URL correctly. The page may also be deleted.</p>

	@include('partials.quote')
@stop