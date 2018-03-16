<div class="content-box"> 
<h2>Editing <span class='muted'>Jobtitle</span></h2>
<br>

<?php echo render('jobtitle/_form'); ?>
<p>
	<?php echo Html::anchor('jobtitle/view/'.$jobtitle->id, 'View'); ?> |
	<?php echo Html::anchor('jobtitle', 'Back'); ?></p>
</div>