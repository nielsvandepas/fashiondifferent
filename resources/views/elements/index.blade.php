@extends('master')

@section('title')
    {{ $element->name }}
@stop

@section('main')
	@include('flash::message')

	@include('partials.buttons.favourite')

    <h2>{{ $element->name }}</h2>
	<h3><a href="{{ route('chat.show', ['partner' => $element->author->id]) }}" title="{{ $element->author->name }}">{{ $element->author->name }}</a></h3>
	<em>{{ $typeshop }}</em>
    <p>{!! nl2br(htmlspecialchars($element->description)) !!}</p>
	<img src="{{ '/uploads/element-images/cropsized/' . $element->image }}" alt="{{ $element->name }}" />
	<a id="comment-top" name="comment-top"></a>

	@include('partials.elements.comments')
@stop