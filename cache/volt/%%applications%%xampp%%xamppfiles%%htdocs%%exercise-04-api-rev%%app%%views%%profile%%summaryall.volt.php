
<div class="container">
    <p><h2>Summary of Products:</h2></p>
</div>

<div class="container">
  <?php $v100656230194398810511iterator = $summaries; $v100656230194398810511incr = 0; $v100656230194398810511loop = new stdClass(); $v100656230194398810511loop->self = &$v100656230194398810511loop; $v100656230194398810511loop->length = count($v100656230194398810511iterator); $v100656230194398810511loop->index = 1; $v100656230194398810511loop->index0 = 1; $v100656230194398810511loop->revindex = $v100656230194398810511loop->length; $v100656230194398810511loop->revindex0 = $v100656230194398810511loop->length - 1; ?><?php foreach ($v100656230194398810511iterator as $summary) { ?><?php $v100656230194398810511loop->first = ($v100656230194398810511incr == 0); $v100656230194398810511loop->index = $v100656230194398810511incr + 1; $v100656230194398810511loop->index0 = $v100656230194398810511incr; $v100656230194398810511loop->revindex = $v100656230194398810511loop->length - $v100656230194398810511incr; $v100656230194398810511loop->revindex0 = $v100656230194398810511loop->length - ($v100656230194398810511incr + 1); $v100656230194398810511loop->last = ($v100656230194398810511incr == ($v100656230194398810511loop->length - 1)); ?>
  	<?php if ($v100656230194398810511loop->first) { ?>
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
  	<?php if ($v100656230194398810511loop->last) { ?>
  		</table>
  	<?php } ?>
  <?php $v100656230194398810511incr++; } ?>
</div>
