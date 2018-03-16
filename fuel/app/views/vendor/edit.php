<h2>Editing <span class='muted'>Vendor</span></h2>
<br>

<?php echo render('vendor/_form'); ?>
<p>
	<?php echo Html::anchor('vendor/view/'.$vendor->id, 'View'); ?> |
	<?php echo Html::anchor('vendor', 'Back'); ?></p>
