@extends('master')

@section('title')
    Chat @ Fashion Different
@stop

@section('main')
    <h2>chat</h2>
    <div id="chat-list-container">
		<section class="chat-listing" v-for="chat in chats">
				<h3>
					<a href="@{{ '/chat/' + chat.user.id.toString() }}">
						@{{ chat.user.name }}
					</a>
				</h3>
				<p>
					<a href="@{{ '/chat/' + chat.user.id.toString() }}">
						@{{ chat.body }}
					</a>
				</p>
		</section>
	</div>
@stop

@section('scripts')
	@parent

	<script>
		chatIndexInit( '{{ route('chat.latest') }}' );
	</script>
@stop