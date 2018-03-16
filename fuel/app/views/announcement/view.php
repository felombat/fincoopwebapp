<div class="content-i">
<h2>Viewing <span class='muted'>#<?php echo $announcement->id; ?></span></h2>

<p>
	<strong>Created by:</strong>
	<?php echo $announcement->created_by; ?></p>
<p>
	<strong>Read by:</strong>
	<?php echo $announcement->read_by; ?></p>
<p>
	<strong>Share with:</strong>
	<?php echo $announcement->share_with; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $announcement->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $announcement->description; ?></p>
<p>
	<strong>File:</strong>
	<?php echo $announcement->file; ?></p>
<p>
	<strong>Start date:</strong>
	<?php echo $announcement->start_date; ?></p>
<p>
	<strong>End date:</strong>
	<?php echo $announcement->end_date; ?></p>

<?php echo Html::anchor('announcement/edit/'.$announcement->id, 'Edit'); ?> |
<?php echo Html::anchor('announcement', 'Back'); ?>
</div>