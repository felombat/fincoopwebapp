<h2>Editing <span class='muted'>Site</span></h2>
<br>

<?php echo render('site/_form'); ?>
<p>
	<?php echo Html::anchor('site/view/'.$site->id, 'View'); ?> |
	<?php echo Html::anchor('site', 'Back'); ?></p>
