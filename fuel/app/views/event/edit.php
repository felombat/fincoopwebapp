<div class="content-box"> 
<h2>Editing <span class='muted'>Event</span></h2>
<br>

<?php echo render('event/_form'); ?>
<p>
	<?php echo Html::anchor('event/view/'.$event->id, 'View'); ?> |
	<?php echo Html::anchor('event', 'Back'); ?></p>
</div>