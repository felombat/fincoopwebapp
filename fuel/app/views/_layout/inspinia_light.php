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
<body class="gray-bg">


	 

	<div class="middle-box text-center loginscreen* animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LH\cm</h1>

            </div>
            <h3>CIMENCAM Production Report+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="index.html">
            <?php echo Form::open(array('class'=>"m-t", 'role'=>"form", 'action'=>"")); ?>
            <?php if (isset($_GET['destination'])): ?>
                <?php echo Form::hidden('destination', $_GET['destination']); ?>
            <?php endif; ?>

            <?php if (isset($login_error)): ?>
                <div class="error"><?php echo $login_error; ?></div>
            <?php endif; ?>
                <div class="form-group <?php echo ! $val->error('email') ?: 'has-error' ?> ">
                    <label for="email">Email or Username:</label>
                    <?php echo Form::input('email', Input::post('email'), array('class' => 'form-control', 'placeholder' => 'Email or Username', 'autofocus', 'required'=>"")); ?>

                    <?php if ($val->error('email')): ?>
                        <span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></span>
                    <?php endif; ?>

                </div>
                <div class="form-group <?php echo ! $val->error('password') ?: 'has-error' ?>">
                     <label for="password">Password:</label>
                    <?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

                    <?php if ($val->error('password')): ?>
                        <span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
                    <?php endif; ?>
                </div>
                 <?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class' => 'btn btn-lg btn-primary block full-width m-b')); ?>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            <?php echo Form::close(); ?>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>


	<?php echo Asset::js(array(
	//  Mainly scripts 
    //   'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	'plugins/metisMenu/jquery.metisMenu.js',
    	'plugins/slimscroll/jquery.slimscroll.min.js',

    	// Custom and plugin javascript
    	'inspinia.js',
        'plugins/chartJs/Chart.min.js',
    	'plugins/pace/pace.min.js',
        'plugins/c3/c3.min.js',
        'plugins/d3/d3.min.js'

    )); ?>

   
</body>

 
</html>
