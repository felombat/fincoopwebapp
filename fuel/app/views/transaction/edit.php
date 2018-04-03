<div class="content-box"> 
	<h2>Editing <span class='muted'>Contribution</span></h2>
	<br>

	<?php echo render('contribution/_form'); ?>
	<p>
		<?php echo Html::anchor('contribution/view/'.$contribution->id, 'View'); ?> |
		<?php echo Html::anchor('contribution', 'Back'); ?></p>
</div>