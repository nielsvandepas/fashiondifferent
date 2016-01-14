<div class="profile-info">
	<h2>{{ $user->name }}</h2>
	<a href="{{ 'mailto:' . $user->email }}" title="Send mail">{{ $user->email }}</a>
	<p>{{ 'active since ' . $user->created_at->format('j F Y') }}</p>
	<p>{{ 'uploaded ' . strval($user->elements->count()) . ' elements' }}</p>
	<br />
	<p>{{ $user->level() . ' (' . strval($user->points()) . ' points)' }}</p>
	@if (Auth::check() && $user == Auth::user())
		<a href="{{ url('profile/logout') }}" title="Logout">logout</a>
	@endif
	@include('partials.profile.image')
</div>