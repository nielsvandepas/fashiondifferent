@extends('master')

@section('title')
    Chat with {{ $partner->name }} @ Fashion Different
@stop

@section('main')
	<h2>chat</h2>

	<aside id="chat-meta">
		@include('partials.profile.image', ['user' => $partner])
		<h4>{{ $partner->name }}</h4>
	</aside>

	<div id="chat-container">
		<div id="message-container">
			<p :class="message.class" v-for="message in messages">@{{ message.body }}</p>
		</div>
		{!! Form::open(['url' => route('chat.create', ['partner' => $partner->id]), '@submit.prevent' => 'sendMessage' ]) !!}
			{!! Form::textarea('message', null, ['placeholder' => 'message', 'class' => 'form-control', 'v-model' => 'newMessage', '@keydown.enter.prevent' => 'sendMessage']) !!}
			{!! Form::submit('send', ['class' => 'btn btn-primary', ':disabled' => '!newMessage']) !!}
		{!! Form::close() !!}
	</div>
@stop

@section('scripts')
	<script>
		chatInit( '{{ route('chat.fetch', ['partner' => $partner->id]) }}', '{{ route('chat.create', ['partner' => $partner->id]) }}', {{ $partner->id }} );
	</script>
@stop