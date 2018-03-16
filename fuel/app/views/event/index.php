<div class="content-box"> 
	<h2>Listing <span class='muted'>Events</span></h2>
	<br>
	<?php if ($events): ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Created by</th>
				<th>Company id</th>
				<th>Location</th>
				<th>Labels</th>
				<th>Share with</th>
				<th>Color</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Start time</th>
				<th>End time</th>
				<th>Recurring</th>
				<th>Repeat every</th>
				<th>No of cycles</th>
				<th>Last start date</th>
				<th>Repeat type</th>
				<th>Recurring dates</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($events as $item): ?>		<tr>

				<td><?php echo $item->title; ?></td>
				<td><?php echo $item->description; ?></td>
				<td><?php echo $item->created_by; ?></td>
				<td><?php echo $item->company_id; ?></td>
				<td><?php echo $item->location; ?></td>
				<td><?php echo $item->labels; ?></td>
				<td><?php echo $item->share_with; ?></td>
				<td><?php echo $item->color; ?></td>
				<td><?php echo $item->start_date; ?></td>
				<td><?php echo $item->end_date; ?></td>
				<td><?php echo $item->start_time; ?></td>
				<td><?php echo $item->end_time; ?></td>
				<td><?php echo $item->recurring; ?></td>
				<td><?php echo $item->repeat_every; ?></td>
				<td><?php echo $item->no_of_cycles; ?></td>
				<td><?php echo $item->last_start_date; ?></td>
				<td><?php echo $item->repeat_type; ?></td>
				<td><?php echo $item->recurring_dates; ?></td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php echo Html::anchor('event/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('event/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('event/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
					</div>

				</td>
			</tr>
	<?php endforeach; ?>	</tbody>
	</table>

	<?php else: ?>
	<p>No Events.</p>

	<?php endif; ?><p>
		<?php echo Html::anchor('event/create', 'Add new Event', array('class' => 'btn btn-success')); ?>

	</p>
</div>
