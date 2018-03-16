<h2>Viewing <span class='muted'>#<?php echo $vendor->id; ?></span></h2>

<p>
	<strong>Company id:</strong>
	<?php echo $vendor->company_id; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $vendor->user_id; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $vendor->phone; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $vendor->email; ?></p>
<p>
	<strong>Website:</strong>
	<?php echo $vendor->website; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $vendor->title; ?></p>
<p>
	<strong>Enabled:</strong>
	<?php echo $vendor->enabled; ?></p>

<?php echo Html::anchor('vendor/edit/'.$vendor->id, 'Edit'); ?> |
<?php echo Html::anchor('vendor', 'Back'); ?>