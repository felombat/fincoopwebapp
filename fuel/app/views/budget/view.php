 		
	<div class="content-box">
			<h2>Viewing <span class='muted'>#<?php echo $budget->id; ?></span></h2>

			<p>
				<strong>Company id:</strong>
				<?php echo $budget->company_id; ?></p>
			<p>
				<strong>Name:</strong>
				<?php echo $budget->name; ?></p>
			<p>
				<strong>Category id:</strong>
				<?php echo $budget->category_id; ?></p>
			<p>
				<strong>Enabled:</strong>
				<?php echo $budget->enabled; ?></p>

			<?php echo Html::anchor('budget/edit/'.$budget->id, 'Edit'); ?> |
			<?php echo Html::anchor('budget', 'Back'); ?>
	</div>
 