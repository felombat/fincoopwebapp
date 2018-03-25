<div class="content-box"> 
<h2>Listing <span class='muted'>Transactions</span></h2>
<br>
<?php if ($transactions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Source</th>
			<th>Destination</th>
			<th>At</th>
			<!-- <th>Currency code</th>
			<th>Currency rate</th>
			<th>Description</th>
			<th>Payment method</th>
			<th>Reference</th>
			<th>&nbsp;</th> -->
            <th>Debit</th>
            <th>Credit</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transactions as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo empty(@$item->from_account->name) ? "Client ". @$item->contribution->client->first_name ." ". @$item->contribution->client->last_name  : @$item->from_account->name ; ?></td>
            <td><?php echo empty(@$item->to_account->name) ? "Client " . @$item->contribution->client->first_name ." ". @$item->contribution->client->last_name : @$item->to_account->name; ?></td>
			<td><?php echo strftime("%D, %H:%I",  $item->created_at); ?></td>
            <!--            <td>--><?php //echo $item->created_by; ?><!--</td>-->

            <?php if(!$item->type) :?>
                <td class="text-danger"><?php echo '- ' . $item->amount; ?></td>
                <td> </td>
            <?php else : ?>
                <td> </td>
                <td class="text-success"><?php echo '+ ' . $item->amount; ?></td>
            <?php endif; ?>
			<!--<td><?php //echo $item->currency_code; ?></td>
			<td><?php //echo $item->currency_rate; ?></td>
			<td><?php //echo $item->description; ?></td>
			<td><?php //echo $item->payment_method; ?></td>
			<td><?php //echo $item->reference; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php //echo Html::anchor('contribution/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('contribution/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('contribution/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>-->
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contributions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('contribution/create', 'Add new Contribution', array('class' => 'btn btn-success')); ?>

</p>
</div>