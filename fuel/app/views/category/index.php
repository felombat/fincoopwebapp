<div class="content-box"> 
	<h2>Listing <span class='muted'>Categories</span></h2>
	<br>
	<?php if ($categories): ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Company id</th>
				<th>Title</th>
				<th>Type</th>
				<th>Color</th>
				<th>Enabled</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($categories as $item): ?>		<tr>

				<td><?php echo $item->company_id; ?></td>
				<td><?php echo $item->title; ?></td>
				<td><?php echo $item->type; ?></td>
				<td><?php echo $item->color; ?></td>
				<td><?php echo $item->enabled; ?></td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php echo Html::anchor('category/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('category/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('category/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
					</div>

				</td>
			</tr>
	<?php endforeach; ?>	</tbody>
	</table>

	<?php else: ?>
	<p>No Categories.</p>

	<?php endif; ?><p>
		<?php echo Html::anchor('category/create', 'Add new Category', array('class' => 'btn btn-success')); ?>

	</p>
</div>
