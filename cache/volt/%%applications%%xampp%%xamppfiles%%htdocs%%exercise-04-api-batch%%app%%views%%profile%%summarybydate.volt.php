<div class="container">
	<h2><label for='date'>Enter date to search:</label></h2>
	<?= $this->tag->form(['profile/summarybydate', 'method' => 'post', 'class' => 'form_group']) ?>
	  <div class="form-row align-items-center">
	    <div class="col-sm-3 my-1">
	      <?= $this->tag->dateField(['date', 'class' => 'form-control']) ?>
	    </div>
	    <div class="col-auto my-1">
	      <?= $this->tag->submitButton(['send', 'class' => 'btn btn-primary']) ?>
	    </div>
	  </div>
	<?= $this->tag->endForm() ?>
</div>

<?php if (isset($summary)) { ?>
	<?php if (empty($date)) { ?>
			<div class = "container">
			<div class = "text-danger">
				Please select a date to search.
			</div>
		</div>
	<?php } else { ?>
		<?php if (empty($summary)) { ?>
			<div class = "container">
				<div class = "text-danger">
					Sorry! There is no record for <?= $date ?>.
				</div>
			</div>
		<?php } else { ?>
			<div class="container">
			    <p><h2>Summary of Products on <?= $summary->date ?>:</h2></p>
			</div>

			<div class="container">
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
			  			<tr>
			  				<td><?= $summary->date ?></td>
			  				<td><?= $summary->count_created ?></td>
			  				<td><?= $this->escaper->escapeHtml($summary->name_list_created) ?></td>
			  				<td><?= $summary->id_list_created ?></td>
			  				<td><?= $summary->count_deleted ?></td>
			  				<td><?= $this->escaper->escapeHtml($summary->name_list_deleted) ?></td>
			  				<td><?= $summary->id_list_deleted ?></td>
			  			</tr>
			  		</table>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>
