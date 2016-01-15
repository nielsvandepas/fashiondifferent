@extends('master')

@section('title')
	Welcome
@stop

@section('main')
	<section id="home-section">
		<hr />
		<h2 class="tagline">Dress You.</h2>
		<a href="#down" title="Scroll down">scroll down</a>
	</section>
	<section id="inspire-section">
		<div id="home-image"></div>
		<nav><a href="{{ route('element.index') }}" title="Inspire me">inspire me</a></nav>
		<a name="down"></a>
	</section>
@stop