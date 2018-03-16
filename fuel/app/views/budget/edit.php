 
		
		<div class="content-box">

<h2>Editing <span class='muted'>Budget</span></h2>
<br>

<?php echo render('budget/_form'); ?>
<p>
	<?php echo Html::anchor('budget/view/'.$budget->id, 'View'); ?> |
	<?php echo Html::anchor('budget', 'Back'); ?></p>

</div> 