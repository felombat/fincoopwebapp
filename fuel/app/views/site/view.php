<h2>Viewing <span class='muted'>#<?php echo $site->id; ?></span></h2>

<p>
	<strong>Company id:</strong>
	<?php echo $site->company_id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $site->title; ?></p>
<p>
	<strong>Enabled:</strong>
	<?php echo $site->enabled; ?></p>

<?php echo Html::anchor('site/edit/'.$site->id, 'Edit'); ?> |
<?php echo Html::anchor('site', 'Back'); ?>