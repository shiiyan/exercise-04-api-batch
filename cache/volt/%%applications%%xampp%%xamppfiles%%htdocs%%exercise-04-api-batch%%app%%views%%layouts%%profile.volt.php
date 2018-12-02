<div class="container" align="right">
	<nav class="navbar-right bg-light">
	<?= $this->tag->linkTo(['profile/summaryall', 'Show all summaries']) ?>&nbsp;&nbsp;
	<?= $this->tag->linkTo(['profile/summarybydate', 'Search summary by date']) ?>&nbsp;&nbsp;
	<?= $this->tag->linkTo([['for' => 'show-profile', 'name' => $name], 'Show Profile']) ?>&nbsp;&nbsp;
	<?= $this->tag->linkTo(['logout', 'Logout']) ?>
	</nav>
</div>

<?= $this->getContent() ?>