<div class="container" align="right">
	<nav class="navbar-right bg-light">
	{{ link_to('profile/summaryall', 'Show all summaries') }}&nbsp;&nbsp;
	{{ link_to('profile/summarybydate', 'Search summary by date') }}&nbsp;&nbsp;
	{{ link_to(['for': 'show-profile', 'name': name],'Show Profile') }}&nbsp;&nbsp;
	{{ link_to('logout', 'Logout') }}
	</nav>
</div>

{{ content() }}