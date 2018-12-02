<div class="container" align="right">
	<nav class="navbar-right bg-light">
	<?= $this->tag->linkTo(['', 'Homepage']) ?>&nbsp;&nbsp;
	</nav>
</div>

<div class="container">
    <p><h2>Login page</h2></p>
</div>
<div class="container">
<p>
	<a href="https://github.com/login/oauth/authorize?scope=read:user&client_id=<?= $clientID ?>">Login with GitHub</a>
</p>
</div>



