<div class="container">
    <p><h2>Profile of {{ user.name|e }}:</h2></p>
</div>
<div class="container">
	<ul class="list-group">
	  <li class="list-group-item">ID: {{ user.id }}</li>
	  <li class="list-group-item">GitHub ID: {{ user.github_id }}</li>
	  <li class="list-group-item">Name: {{ user.name|e }}</li>
	  <li class="list-group-item">URL: {{ user.html_url|e }}</li>
	  <li class="list-group-item">Avatar: <img src="{{ user.avatar_url|e }}" alt="Avatar" height="42" width="42"></li>
	  <li class="list-group-item" style="word-wrap: break-word">Bearer Token: {{ user.token }}</li>
	</ul>
</div>

