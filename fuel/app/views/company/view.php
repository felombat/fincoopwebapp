<h2>Viewing <span class='muted'>#<?php echo $company->id; ?></span></h2>

<p>
	<strong>Domain:</strong>
	<?php echo $company->domain; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $company->name; ?></p>
<p>
	<strong>Enabled:</strong>
	<?php echo $company->enabled; ?></p>

<?php echo Html::anchor('company/edit/'.$company->id, 'Edit'); ?> |
<?php echo Html::anchor('company', 'Back'); ?>