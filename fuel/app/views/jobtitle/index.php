<div class="content-box"> 
	<h2>Listing <span class='muted'>Jobtitles</span></h2>
	<br>
	<?php if ($jobtitles): ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($jobtitles as $item): ?>		
			<tr>

				<td><?php echo $item->title; ?></td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php echo Html::anchor('jobtitle/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('jobtitle/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('jobtitle/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
					</div>

				</td>
			</tr>
	<?php endforeach; ?>	
		</tbody>
	</table>

	<?php else: ?>
	<p>No Jobtitles.</p>

	<?php endif; ?>
	<p>
		<?php echo Html::anchor('jobtitle/create', 'Add new Jobtitle', array('class' => 'btn btn-success')); ?>

	</p>
</div>	
