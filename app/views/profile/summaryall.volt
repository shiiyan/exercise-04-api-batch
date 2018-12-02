
<div class="container">
    <p><h2>Summary of Products:</h2></p>
</div>

<div class="container">
  {% for summary in summaries %}
  	{% if loop.first %}
  		<table CELLPADDING="5" class="table table-striped">
  			<tr>
  				<th>Date</th>
  				<th>Created Count</th>
  				<th>Created Name List</th>
  				<th>Created ID List</th>
  				<th>Deleted Count</th>
  				<th>Deleted Name List</th>
  				<th>Deleted ID List</th>
  			</tr>
  	{% endif %}
  			<tr>
  				<td>{{summary.date}}</td>
  				<td>{{summary.count_created}}</td>
  				<td>{{summary.name_list_created|e}}</td>
  				<td>{{summary.id_list_created}}</td>
  				<td>{{summary.count_deleted}}</td>
  				<td>{{summary.name_list_deleted|e}}</td>
  				<td>{{summary.id_list_deleted}}</td>
  			</tr>
  	{% if loop.last %}
  		</table>
  	{% endif %}
  {% endfor %}
</div>
