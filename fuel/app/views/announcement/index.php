<div class="content-i">
		<h2>Listing <span class='muted'>Announcements</span></h2>
		<br>
		<?php if ($announcements): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Created by</th>
					<th>Read by</th>
					<th>Share with</th>
					<th>Title</th>
					<th>Description</th>
					<th>File</th>
					<th>Start date</th>
					<th>End date</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($announcements as $item): ?>		<tr>

					<td><?php echo $item->created_by; ?></td>
					<td><?php echo $item->read_by; ?></td>
					<td><?php echo $item->share_with; ?></td>
					<td><?php echo $item->title; ?></td>
					<td><?php echo $item->description; ?></td>
					<td><?php echo $item->file; ?></td>
					<td><?php echo $item->start_date; ?></td>
					<td><?php echo $item->end_date; ?></td>
					<td>
						<div class="btn-toolbar">
							<div class="btn-group">
								<?php echo Html::anchor('announcement/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('announcement/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('announcement/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
						</div>

					</td>
				</tr>
		<?php endforeach; ?>	</tbody>
		</table>

		<?php else: ?>
		<p>No Announcements.</p>

		<?php endif; ?><p>
			<?php echo Html::anchor('announcement/create', 'Add new Announcement', array('class' => 'btn btn-success')); ?>

		</p>
 </div>