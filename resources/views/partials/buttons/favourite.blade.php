@if (Auth::check())
	<a id="favourite-button" :class="class" href="javascript:void(0)" :title="text" @click.prevent="toggleFavourite">@{{ text }}</a>

	@section('scripts')
		@parent

		<script>
			favouriteInit( '{{ route('element.favourite', ['element' => $element->id]) }}' );
		</script>
	@stop
@endif