<div class="content-box"> 
	<div class="row">
		<div class="col-lg-8">	

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
			<p>Company</p>
		</div>
	</div>
</div>