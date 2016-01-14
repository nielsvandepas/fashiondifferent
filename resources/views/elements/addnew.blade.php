@extends('master')

@section('title')
    Add Fashion Element @ Fashion Different
@stop

@section('main')
    <h2>Add fashion element</h2>

    @include('partials.forms.element', ['element' => new FashionDifferent\Element(), 'target' => 'element', 'method' => null])
@stop