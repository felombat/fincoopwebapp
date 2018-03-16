<div class="content-box"> 
		<h2>Editing <span class='muted'>Account</span></h2>
		<br>

		<?php echo render('account/_form'); ?>
		<p>
			<?php echo Html::anchor('account/view/'.$account->id, 'View'); ?> |
			<?php echo Html::anchor('account', 'Back'); ?></p>
</div>