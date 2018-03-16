<div class="content-box"> 
<h2>Editing <span class='muted'>Message</span></h2>
<br>

<?php echo render('message/_form'); ?>
<p>
	<?php echo Html::anchor('message/view/'.$message->id, 'View'); ?> |
	<?php echo Html::anchor('message', 'Back'); ?></p>
</div>