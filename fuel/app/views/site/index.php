<h2>Listing <span class='muted'>Sites</span></h2>
<br>
<?php if ($sites): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Company id</th>
			<th>Title</th>
			<th>Enabled</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sites as $item): ?>		<tr>

			<td><?php echo $item->company_id; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->enabled; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('site/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('site/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('site/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sites.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('site/create', 'Add new Site', array('class' => 'btn btn-success')); ?>

</p>
