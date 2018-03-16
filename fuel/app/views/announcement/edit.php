<div class="content-i"> 
<h2>Editing <span class='muted'>Announcement</span></h2>
<br>

<?php echo render('announcement/_form'); ?>
<p>
	<?php echo Html::anchor('announcement/view/'.$announcement->id, 'View'); ?> |
	<?php echo Html::anchor('announcement', 'Back'); ?></p>
</div>