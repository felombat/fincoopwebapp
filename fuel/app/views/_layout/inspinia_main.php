<!DOCTYPE html>
<html>
 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome.css',

        // C3 lib theme
        'plugins/c3/c3.min.css',
    	'animate.css',
    	'style.css',
    )); ?>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <?php echo Asset::js(array(
    //  Mainly scripts 
      'jquery-3.1.1.min.js',
    )); ?>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('3607fe1af3ddf0c619ad', {
      cluster: 'eu',
      encrypted: true
    });

    var channel = pusher.subscribe('lhcm-channel');
    channel.bind('prodreport', function(data) {
      
      console.log('PushNotification',data.message + ' '+data.name);
      //alert(data.message);
    });
  </script>
     

</head>
<body class="skin-1 fixed-navigation pace-done">
	 

	 <div id="wrapper">

    <?= View::forge('_partials/navigation');?>

        <div id="page-wrapper" class="gray-bg">

            

        <div class="row border-bottom">
            <?= View::forge('_partials/header_navigation');?>
        
        </div>
         <?= View::forge('_partials/page_header');?>

          <?= View::forge('_partials/sidebar_right_msg');?>

         <div class="col-md-8">
			<h1><?php echo $title; ?></h1>
			<hr>
		<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
		<?php endif; ?>
		</div>
            

            <div class="wrapper wrapper-content">

            	<div class="wrapper wrapper-content animated fadeInLeft">
				    <div class="row">
				        <div class="col-lg-12">

			            <?php echo $content; ?>

			            </div>
            		</div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                   <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
					<p>
						<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
						<small>Version: <?php echo e(Fuel::VERSION); ?></small>
					</p>
                </div>
                <div>
                    <strong>Copyright</strong> Astrio &copy; 2017-2018
                </div>
            </div>

        </div>
        </div>


	<?php echo Asset::js(array(
	//  Mainly scripts 
    //	'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	'plugins/metisMenu/jquery.metisMenu.js',
    	'plugins/slimscroll/jquery.slimscroll.min.js',

    	// Custom and plugin javascript
    	'inspinia.js',
    	'plugins/pace/pace.min.js',
        'plugins/c3/c3.min.js',
        'plugins/d3/d3.min.js'

    )); ?>

   
</body>

 
</html>
