<h2>Editing <span class='muted'>Todo</span></h2>
<br>

<?php echo render('todo/_form'); ?>
<p>
	<?php echo Html::anchor('todo/view/'.$todo->id, 'View'); ?> |
	<?php echo Html::anchor('todo', 'Back'); ?></p>
