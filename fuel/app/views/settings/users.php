<div class="content-box"> 
<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('settings/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "general" ); ?>'><?php echo Html::anchor('settings/general','General');?></li>
	<li class='<?php echo Arr::get($subnav, "company" ); ?>'><?php echo Html::anchor('settings/company','Company');?></li>
	<li class='<?php echo Arr::get($subnav, "roles" ); ?>'><?php echo Html::anchor('settings/roles','Roles');?></li>
	<li class='<?php echo Arr::get($subnav, "notifications" ); ?>'><?php echo Html::anchor('settings/notifications','Notifications');?></li>
	<li class='<?php echo Arr::get($subnav, "emailing" ); ?>'><?php echo Html::anchor('settings/emailing','Emailing');?></li>
	<li class='<?php echo Arr::get($subnav, "modules" ); ?>'><?php echo Html::anchor('settings/modules','Modules');?></li>
	<li class='<?php echo Arr::get($subnav, "users" ); ?>'><?php echo Html::anchor('settings/users','Users');?></li>

</ul>
<p>Users</p>
</div>

<div class="content-box"> 

		<?php if ($employees): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Role</th>
					<th>Dept.</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($employees as $item): ?>		
				<tr>

					<td><?php echo $item->first_name; ?></td>
					<td><?php echo $item->last_name; ?></td>
					<td><?php echo $item->jobtitle->title; ?></td>
					<td><?php echo "n/a"; ?></td>
					<td>
						<div class="btn-toolbar">
							<div class="btn-group">
								<?php echo Html::anchor('employee/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
								<?php echo Html::anchor('employee/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						
								<?php echo Html::anchor('employee/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
									
								</div>
						</div>

					</td>
				</tr>
		<?php endforeach; ?>	
			</tbody>
		</table>

		<?php else: ?>
		<p>No Employee.</p>

		<?php endif; ?>
 </div>