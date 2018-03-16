<div class="content-box"> 
	<h2>Viewing <span class='muted'>#<?php echo $event->id; ?></span></h2>

	<p>
		<strong>Title:</strong>
		<?php echo $event->title; ?></p>
	<p>
		<strong>Description:</strong>
		<?php echo $event->description; ?></p>
	<p>
		<strong>Created by:</strong>
		<?php echo $event->created_by; ?></p>
	<p>
		<strong>Company id:</strong>
		<?php echo $event->company_id; ?></p>
	<p>
		<strong>Location:</strong>
		<?php echo $event->location; ?></p>
	<p>
		<strong>Labels:</strong>
		<?php echo $event->labels; ?></p>
	<p>
		<strong>Share with:</strong>
		<?php echo $event->share_with; ?></p>
	<p>
		<strong>Color:</strong>
		<?php echo $event->color; ?></p>
	<p>
		<strong>Start date:</strong>
		<?php echo $event->start_date; ?></p>
	<p>
		<strong>End date:</strong>
		<?php echo $event->end_date; ?></p>
	<p>
		<strong>Start time:</strong>
		<?php echo $event->start_time; ?></p>
	<p>
		<strong>End time:</strong>
		<?php echo $event->end_time; ?></p>
	<p>
		<strong>Recurring:</strong>
		<?php echo $event->recurring; ?></p>
	<p>
		<strong>Repeat every:</strong>
		<?php echo $event->repeat_every; ?></p>
	<p>
		<strong>No of cycles:</strong>
		<?php echo $event->no_of_cycles; ?></p>
	<p>
		<strong>Last start date:</strong>
		<?php echo $event->last_start_date; ?></p>
	<p>
		<strong>Repeat type:</strong>
		<?php echo $event->repeat_type; ?></p>
	<p>
		<strong>Recurring dates:</strong>
		<?php echo $event->recurring_dates; ?></p>

	<?php echo Html::anchor('event/edit/'.$event->id, 'Edit'); ?> |
	<?php echo Html::anchor('event', 'Back'); ?>
</div>