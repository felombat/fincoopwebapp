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
        //'plugins/c3/c3.min.css',
    	'animate.css',
    	'style.css',
    )); ?>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <?php echo Asset::js(array(
    //  Mainly scripts 
      'jquery-3.1.1.min.js',
    )); ?>

 
     

</head>
<body class="skin-2 fixed-navigation pace-done" style="background: transparent;">

    <?php if (Session::get_flash('success')  OR Session::get_flash('error')): ?>
                <!-- <div class="wrapper"> -->
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4">
                            
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

                    </div>
                <!-- </div>-->
                <?php endif; ?>

	 

	<?= $content ?>


	<?php echo Asset::js(array(
	//  Mainly scripts 
    //   'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	
    	

    )); ?>

   
</body>

 
</html>
