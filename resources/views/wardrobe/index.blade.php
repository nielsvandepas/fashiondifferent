@extends('master')

@section('title')
	Wardrobe @ Fashion Different
@stop

@section('main')
	<h2>Wardrobe</h2>

	<div id="wardrobe-container">
		<a href="javascript:void(0)" title="Previous" @click.prevent="previous" class="previous">
			<img :src="previousElement.image" :alt="previousElement.name" />
		</a>
		<a :href="element.url" :title="element.name" class="current">
			<img :src="element.image" :alt="element.name" />
		</a>
		<a href="javascript:void(0)" title="Next" @click.prevent="next" class="next">
			<img :src="nextElement.image" :alt="nextElement.name" />
		</a>
		<a :href="element.url" title="view details">view details</a>
		<a href="{{ route('mixandmatch.index') }}" title="Mix and match">mix and match</a>
	</div>
@stop

@section('scripts')
	<script>
		wardrobeInit();
	</script>
@stop