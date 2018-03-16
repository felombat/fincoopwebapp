<div class="content-box"> 
	<ul class="nav nav-pills">
		<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('finances\expenses/index','Index');?></li>
		<li class='<?php echo Arr::get($subnav, "invoices" ); ?>'><?php echo Html::anchor('finances\expenses/invoices','Invoices');?></li>
		<li class='<?php echo Arr::get($subnav, "vendors" ); ?>'><?php echo Html::anchor('finances\expenses/vendors','Vendors');?></li>

	</ul>
	<p>Index</p>
</div>