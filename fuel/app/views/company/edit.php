<h2>Editing <span class='muted'>Company</span></h2>
<br>

<?php echo render('company/_form'); ?>
<p>
	<?php echo Html::anchor('company/view/'.$company->id, 'View'); ?> |
	<?php echo Html::anchor('company', 'Back'); ?></p>
