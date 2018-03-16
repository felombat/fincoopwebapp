<div class="content-box"> 	
	<h2>Viewing <span class='muted'>#<?php echo $category->id; ?></span></h2>

	<p>
		<strong>Company id:</strong>
		<?php echo $category->company_id; ?></p>
	<p>
		<strong>Title:</strong>
		<?php echo $category->title; ?></p>
	<p>
		<strong>Type:</strong>
		<?php echo $category->type; ?></p>
	<p>
		<strong>Color:</strong>
		<?php echo $category->color; ?></p>
	<p>
		<strong>Enabled:</strong>
		<?php echo $category->enabled; ?></p>

	<?php echo Html::anchor('category/edit/'.$category->id, 'Edit'); ?> |
	<?php echo Html::anchor('category', 'Back'); ?>
	</div>