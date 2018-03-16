<div class="content-box"> 
<h2>Viewing <span class='muted'>#<?php echo $jobtitle->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $jobtitle->title; ?></p>

<?php echo Html::anchor('jobtitle/edit/'.$jobtitle->id, 'Edit'); ?> |
<?php echo Html::anchor('jobtitle', 'Back'); ?>
</div>