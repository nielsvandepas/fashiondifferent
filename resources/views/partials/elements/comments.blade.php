<h3>Comments</h3>
<div id="comment-container">
	<div class="comment" v-for="comment in comments">
		<p class="comment-author-name">
			<a :href="comment.url" :title="comment.name">
				@{{ comment.name }}
			</a>
		</p>

		<a :href="comment.url" :title="comment.name">
			<img :src="comment.image" :alt="comment.name" />
		</a>

		<p>{{ '{' . '{' . '{ ' . 'comment.body' . ' }' . '}' . '}' }}</p>
	</div>

	@if (Auth::check())
		{!! Form::open(['url' => route('element.comment.store', ['element' => $element->id]), '@submit.prevent' => 'submitComment' ]) !!}
		{!! Form::textarea('body', null, ['placeholder' => 'your comment', 'class' => 'form-control', 'v-model' => 'message']) !!}
		{!! Form::submit('send', ['class' => 'btn btn-primary', ':disabled' => '!message']) !!}
		{!! Form::close() !!}
	@else
		<p>You are not logged in. Please <a href="{{ url('profile/login') }}" title="Log in">log in</a> or <a href="{{ url('profile/register') }}" title="Register">create an account</a>.</p>
	@endif
</div>

@section('scripts')
	@parent

	<script>
		@if (is_null($user))
			commentInitGuest( '{{ route('element.show', ['element' => $element->id]) . '/comment' }}' );
		@else
			commentInit( '{{ route('element.show', ['element' => $element->id]) . '/comment' }}', htmlDecode( '{{ $user }}' ) );
		@endif
	</script>
@stop