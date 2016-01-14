<nav id="sidebar">
	<ul>
		<li id="menu-button"><a href="{{ route('home') }}" title="Home">home</a></li>
		<li id="wardrobe-button"><a href="{{ route('wardrobe.index') }}" title="Wardrobe">wardrobe</a></li>
		<li id="addelement-button"><a href="{{ route('element.create') }}" title="Add fashion element">add fashion element</a></li>
		<li id="chat-button"><a href="{{ route('chat.index') }}" title="Chat">chat</a></li>
		<li id="profile-button"><a href="{{ route('profile.index') }}" title="My profile">my profile</a></li>
		<li id="about-button"><a href="{{ route('about') }}" title="About">about</a></li>
		<li id="menu-social-buttons">
			<p>share the love</p>
			<a href="//facebook.com" title="Facebook" target="_blank">Facebook</a><a href="//twitter.com" title="Twitter" target="_blank">Twitter</a>
		</li>
	</ul>
</nav>