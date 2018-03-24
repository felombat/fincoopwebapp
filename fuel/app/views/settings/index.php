<div class="content-box"> 

	<div class="os-tabs-controls">
		<!--<ul class="nav nav-tabs smaller">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="misc_charts.html#tab_overview">Overview</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="misc_charts.html#tab_sales">Sales</a></li>
			</ul>
			<ul class="nav nav-pills smaller">
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="misc_charts.html#">Today</a>		</li>
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="misc_charts.html#">7 Days</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="misc_charts.html#">14 Days</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="misc_charts.html#">Last Month</a></li></ul>-->
		</div> 
	<div class="os-tabs-controls">

		<ul class="nav nav-tabs smaller">
			<li class='nav-item <?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('settings/index','General', array('class'=>'nav-link ' . Arr::get($subnav, "index" )));?></li>
			<!-- <li class='nav-item <?php echo Arr::get($subnav, "general" ); ?>'><?php echo Html::anchor('settings/general','General',array('class'=>'nav-link'));?></li> -->
			<li class='nav-item <?php echo Arr::get($subnav, "company" ); ?>'><?php echo Html::anchor('settings/company','Company', array('class'=>'nav-link' . '<?php echo Arr::get($subnav, "company" ); ?>'));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "roles" ); ?>'><?php echo Html::anchor('settings/roles','Roles', array('class'=>'nav-link' . '<?php echo Arr::get($subnav, "roles" ); ?>'));?></li>
		</ul>	
		<ul class="nav nav-pills smaller">
			<li class='nav-item <?php echo Arr::get($subnav, "notifications" ); ?>'><?php echo Html::anchor('settings/notifications','Notifications', array('class'=>'nav-link'. '<?php echo Arr::get($subnav, "notifications" ); ?>' ));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "emailing" ); ?>'><?php echo Html::anchor('settings/emailing','Emailing', array('class'=>'nav-link'));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "modules" ); ?>'><?php echo Html::anchor('settings/modules','Modules', array('class'=>'nav-link'));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "users" ); ?>'><?php echo Html::anchor('settings/users','Users' , array('class'=>'nav-link'));?></li>

		 	<li class='nav-item <?php echo Arr::get($subnav, "item" ); ?>'><?php echo Html::anchor('settings/item','item', array('class'=>'nav-link'));?></li>
 			<li class='nav-item <?php echo Arr::get($subnav, "vendor" ); ?>'><?php echo Html::anchor('settings/vendor','Vendor', array('class'=>'nav-link'));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "category" ); ?>'><?php echo Html::anchor('settings/category','Category', array('class'=>'nav-link'));?></li>
			<li class='nav-item <?php echo Arr::get($subnav, "site" ); ?>'><?php echo Html::anchor('settings/site','Site', array('class'=>'nav-link'));?></li>

		</ul>
	</div>
	<p>Index</p>
</div>

<div class="content-box"> </div>

