<h2>Listing <span class='muted'>Vendors</span></h2>
<br>
<?php if ($vendors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Company id</th>
			<th>User id</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Website</th>
			<th>Title</th>
			<th>Enabled</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($vendors as $item): ?>		<tr>

			<td><?php echo $item->company_id; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->website; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->enabled; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('vendor/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('vendor/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('vendor/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Vendors.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('vendor/create', 'Add new Vendor', array('class' => 'btn btn-success')); ?>

</p>
