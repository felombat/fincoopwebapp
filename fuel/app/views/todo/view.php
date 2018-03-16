<h2>Viewing <span class='muted'>#<?php echo $todo->id; ?></span></h2>

<p>
	<strong>Created by:</strong>
	<?php echo $todo->created_by; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $todo->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $todo->description; ?></p>
<p>
	<strong>Labels:</strong>
	<?php echo $todo->labels; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $todo->status; ?></p>
<p>
	<strong>Start date:</strong>
	<?php echo $todo->start_date; ?></p>

<?php echo Html::anchor('todo/edit/'.$todo->id, 'Edit'); ?> |
<?php echo Html::anchor('todo', 'Back'); ?>