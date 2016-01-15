@extends('master')

@section('title')
	Mix and Match
@stop

@section('main')
	<p>Mix and match main content</p>
	<ol>
		<li>{{ $top->name }}</li>
		<li>{{ $trousers->name }}</li>
		<li>{{ $shoes->name }}</li>
		<li>{{ $accessory->name }}</li>
	</ol>
@stop