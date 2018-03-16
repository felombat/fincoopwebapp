<div class="content-box"> 
	<h2>Listing <span class='muted'>Accounts</span></h2>
	<br>
	<?php if ($accounts): ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Company id</th>
				<th>Name</th>
				<th>Number</th>
				<th>Currency code</th>
				<th>Opening balance</th>
				<th>Bank name</th>
				<th>Bank phone</th>
				<th>Bank address</th>
				<th>Enabled</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($accounts as $item): ?>		<tr>

				<td><?php echo $item->company_id; ?></td>
				<td><?php echo $item->name; ?></td>
				<td><?php echo $item->number; ?></td>
				<td><?php echo $item->currency_code; ?></td>
				<td><?php echo $item->opening_balance; ?></td>
				<td><?php echo $item->bank_name; ?></td>
				<td><?php echo $item->bank_phone; ?></td>
				<td><?php echo $item->bank_address; ?></td>
				<td><?php echo $item->enabled; ?></td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php echo Html::anchor('account/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('account/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('account/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
					</div>

				</td>
			</tr>
	<?php endforeach; ?>	</tbody>
	</table>

	<?php else: ?>
	<p>No Accounts.</p>

	<?php endif; ?><p>
		<?php echo Html::anchor('account/create', 'Add new Account', array('class' => 'btn btn-success')); ?>

	</p>
</div>