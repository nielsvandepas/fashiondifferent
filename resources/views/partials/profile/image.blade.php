@if (is_null($user->image))
	<img src="/images/avatar.png" alt="{{ $user->name }}" />
@else
	<img src="{{ '/uploads/profile-images/cropsized/' . $user->image }}" alt="{{ $user->name }}" />
@endif