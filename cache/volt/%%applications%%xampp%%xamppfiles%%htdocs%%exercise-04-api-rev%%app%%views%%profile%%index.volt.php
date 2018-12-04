<div class="container">
    <p><h2>Profile of <?= $this->escaper->escapeHtml($user->name) ?>:</h2></p>
</div>
<div class="container">
	<ul class="list-group">
	  <li class="list-group-item">ID: <?= $user->id ?></li>
	  <li class="list-group-item">GitHub ID: <?= $user->github_id ?></li>
	  <li class="list-group-item">Name: <?= $this->escaper->escapeHtml($user->name) ?></li>
	  <li class="list-group-item">URL: <?= $this->escaper->escapeHtml($user->html_url) ?></li>
	  <li class="list-group-item">Avatar: <img src="<?= $this->escaper->escapeHtml($user->avatar_url) ?>" alt="Avatar" height="42" width="42"></li>
	  <li class="list-group-item" style="word-wrap: break-word">Bearer Token: <?= $user->token ?></li>
	</ul>
</div>

