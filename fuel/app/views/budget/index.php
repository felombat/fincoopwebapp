 		
		<div class="content-box">
			<h2>Listing <span class='muted'>Budgets</span></h2>
			<br>
			<?php if ($budgets): ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Company id</th>
						<th>Name</th>
						<th>Category id</th>
						<th>Enabled</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach ($budgets as $item): ?>		<tr>

						<td><?php echo $item->company_id; ?></td>
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->category_id; ?></td>
						<td><?php echo $item->enabled; ?></td>
						<td>
							<div class="btn-toolbar">
								<div class="btn-group">
									<?php echo Html::anchor('budget/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('budget/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('budget/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
							</div>

						</td>
					</tr>
			<?php endforeach; ?>	</tbody>
			</table>

			<?php else: ?>
			<p>No Budgets.</p>

			<?php endif; ?><p>
				<?php echo Html::anchor('budget/create', 'Add new Budget', array('class' => 'btn btn-success')); ?>

			</p>
	</div>
 
