@extends('master')

@section('title')
    Edit {{ $element->id }} @ Fashion Different
@stop

@section('main')
    <h2>Edit fashion element</h2>

    @include('partials.forms.element', ['element' => $element, 'target' => 'element/' . $element->id, 'method' => 'PATCH'])
@stop