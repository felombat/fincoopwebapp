<div class="content-box"> 
	<h2>Editing <span class='muted'>Transaction</span></h2>
	<br>

	<?php echo render('transaction/_form'); ?>
	<p>
		<?php echo Html::anchor('transaction/view/'.$transaction->id, 'View'); ?> |
		<?php echo Html::anchor('transaction', 'Back'); ?></p>
</div>