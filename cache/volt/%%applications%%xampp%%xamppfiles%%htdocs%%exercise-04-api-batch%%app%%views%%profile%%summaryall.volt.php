
<div class="container">
    <p><h2>Summary of Products:</h2></p>
</div>

<div class="container">
  <?php $v168718240817771918241iterator = $summaries; $v168718240817771918241incr = 0; $v168718240817771918241loop = new stdClass(); $v168718240817771918241loop->self = &$v168718240817771918241loop; $v168718240817771918241loop->length = count($v168718240817771918241iterator); $v168718240817771918241loop->index = 1; $v168718240817771918241loop->index0 = 1; $v168718240817771918241loop->revindex = $v168718240817771918241loop->length; $v168718240817771918241loop->revindex0 = $v168718240817771918241loop->length - 1; ?><?php foreach ($v168718240817771918241iterator as $summary) { ?><?php $v168718240817771918241loop->first = ($v168718240817771918241incr == 0); $v168718240817771918241loop->index = $v168718240817771918241incr + 1; $v168718240817771918241loop->index0 = $v168718240817771918241incr; $v168718240817771918241loop->revindex = $v168718240817771918241loop->length - $v168718240817771918241incr; $v168718240817771918241loop->revindex0 = $v168718240817771918241loop->length - ($v168718240817771918241incr + 1); $v168718240817771918241loop->last = ($v168718240817771918241incr == ($v168718240817771918241loop->length - 1)); ?>
  	<?php if ($v168718240817771918241loop->first) { ?>
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
  	<?php } ?>
  			<tr>
  				<td><?= $summary->date ?></td>
  				<td><?= $summary->count_created ?></td>
  				<td><?= $this->escaper->escapeHtml($summary->name_list_created) ?></td>
  				<td><?= $summary->id_list_created ?></td>
  				<td><?= $summary->count_deleted ?></td>
  				<td><?= $this->escaper->escapeHtml($summary->name_list_deleted) ?></td>
  				<td><?= $summary->id_list_deleted ?></td>
  			</tr>
  	<?php if ($v168718240817771918241loop->last) { ?>
  		</table>
  	<?php } ?>
  <?php $v168718240817771918241incr++; } ?>
</div>
