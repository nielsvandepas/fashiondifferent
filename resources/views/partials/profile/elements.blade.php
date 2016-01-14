<div class="elements-list">
	@foreach ($elements as $element)
		<a href="{{ route('element.show', ['element' => $element->id]) }}" title="{{ $element->name }}">
			<img src="{{ '/uploads/element-images/thumbs/' . $element->image }}" alt="{{ $element->name }}" />
		</a>
	@endforeach
</div>