@if (is_null($user->profile_image))
	<img src="/images/avatar.png" alt="{{ $user->name }}" />
@else
	<img src="{{ '/uploads/profile-images/cropsized/' . $user->profile_image }}" alt="{{ $user->name }}" />
@endif