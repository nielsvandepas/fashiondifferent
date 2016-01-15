@extends('master')

@section('title')
	My Profile
@stop

@section('main')
	<h2>My profile</h2><a href="{{ route('profile.edit') }}" title="Edit profile">edit</a>
	@include('flash::message')

	@include('partials.profile.info')

	<h3>My elements</h3>
	@if ($mine->count() > 0)
		@include('partials.profile.elements', ['elements' => $mine])
	@else
		<p>You haven't created any element yet. You can do so <a href="{{ route('element.create') }}" title="Create element">here</a>.</p>
	@endif

	<h3>My favourites</h3>
	@if ($favourites->count() > 0)
		@include('partials.profile.elements', ['elements' => $favourites])
	@else
		<p>You have no favourites yet. You can add some <a href="{{ route('wardrobe.index') }}" title="Add favourites">here</a>.</p>
	@endif

	<h3>My collections</h3>
	@if ($collections->count() > 0)
		<ul>
			@foreach($collections as $collection)
				<li>
					<a href="{{ route('mixandmatch.show', ['collection' => $collection->id]) }}" title="{{ $collection->name }}">{{ $collection->name }}</a>
				</li>
			@endforeach
		</ul>
	@else
		<p>You haven't created any collection yet. You can do so <a href="{{ route('mixandmatch.index') }}" title="Create collection">here</a>.</p>
	@endif
@stop