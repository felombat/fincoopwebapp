<!DOCTYPE html>
<html>
 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome.css',
        'plugins/toastr/toastr.min.css',


        // C3 lib theme
        'plugins/c3/c3.min.css',
    	'animate.css',
    	'style.css',
    )); ?>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <?php echo Asset::js(array(
    //  Mainly scripts 
      'jquery-3.1.1.min.js',
      'plugins/toastr/toastr.min.js',
    )); ?>

<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "progressBar": true,
  "preventDuplicates": false,
  "positionClass": "toast-top-right",
  "onclick": null,
  "showDuration": "400",
  "hideDuration": "1000",
  "timeOut": "7000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


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
        <?php if (Session::get_flash('info')): ?>
            <div class="toast toast-info">
            </div>
            <div class="alert alert-info">
                <strong>Info</strong>
                <p>
                <?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>
                </p>
            </div>
            <script>
            (function(){
                
                // Display a success toast, with a title
                toastr.info('Without any options',"<p>
                <?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>
                </p>")
             
            })();
                
            </script>
        <?php endif; ?>
		</div>
            

            <div class="wrapper wrapper-content">

            	<div class="wrapper wrapper-content animated fadeInRight">
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

             <?= View::forge('_partials/sidebar_right_params');?>

        </div>
        </div>


	<?php echo Asset::js(array(
	//  Mainly scripts 
    //	'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	'plugins/metisMenu/jquery.metisMenu.js',
    	'plugins/slimscroll/jquery.slimscroll.min.js',

        // Toastr
        //'plugins/toastr/toastr.min.js',

    	// Custom and plugin javascript
    	'inspinia.js',
    	'plugins/pace/pace.min.js',
        'plugins/c3/c3.min.js',
        'plugins/d3/d3.min.js'

    )); ?>

    <script type="text/javascript">
        $(function () {
            var i = -1;
            var toastCount = 0;
            var $toastlast;
            var getMessage = function () {
                var msg = 'Hi, welcome to Inspinia. This is example of Toastr notification box.';
                return msg;
            };

            $('#showsimple').click(function (){
                // Display a success toast, with a title
                toastr.success('Without any options','Simple notification!')
            });
            $('#showtoast').click(function () {
                var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
                var msg = $('#message').val();
                var title = $('#title').val() || '';
                var $showDuration = $('#showDuration');
                var $hideDuration = $('#hideDuration');
                var $timeOut = $('#timeOut');
                var $extendedTimeOut = $('#extendedTimeOut');
                var $showEasing = $('#showEasing');
                var $hideEasing = $('#hideEasing');
                var $showMethod = $('#showMethod');
                var $hideMethod = $('#hideMethod');
                var toastIndex = toastCount++;
                toastr.options = {
                    closeButton: $('#closeButton').prop('checked'),
                    debug: $('#debugInfo').prop('checked'),
                    progressBar: $('#progressBar').prop('checked'),
                    preventDuplicates: $('#preventDuplicates').prop('checked'),
                    positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                    onclick: null
                };
                if ($('#addBehaviorOnToastClick').prop('checked')) {
                    toastr.options.onclick = function () {
                        alert('You can perform some custom action after a toast goes away');
                    };
                }
                if ($showDuration.val().length) {
                    toastr.options.showDuration = $showDuration.val();
                }
                if ($hideDuration.val().length) {
                    toastr.options.hideDuration = $hideDuration.val();
                }
                if ($timeOut.val().length) {
                    toastr.options.timeOut = $timeOut.val();
                }
                if ($extendedTimeOut.val().length) {
                    toastr.options.extendedTimeOut = $extendedTimeOut.val();
                }
                if ($showEasing.val().length) {
                    toastr.options.showEasing = $showEasing.val();
                }
                if ($hideEasing.val().length) {
                    toastr.options.hideEasing = $hideEasing.val();
                }
                if ($showMethod.val().length) {
                    toastr.options.showMethod = $showMethod.val();
                }
                if ($hideMethod.val().length) {
                    toastr.options.hideMethod = $hideMethod.val();
                }
                if (!msg) {
                    msg = getMessage();
                }
                $("#toastrOptions").text("Command: toastr["
                        + shortCutFunction
                        + "](\""
                        + msg
                        + (title ? "\", \"" + title : '')
                        + "\")\n\ntoastr.options = "
                        + JSON.stringify(toastr.options, null, 2)
                );
                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
                if ($toast.find('#okBtn').length) {
                    $toast.delegate('#okBtn', 'click', function () {
                        alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                        $toast.remove();
                    });
                }
                if ($toast.find('#surpriseBtn').length) {
                    $toast.delegate('#surpriseBtn', 'click', function () {
                        alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                    });
                }
            });
            function getLastToast(){
                return $toastlast;
            }
            $('#clearlasttoast').click(function () {
                toastr.clear(getLastToast());
            });
            $('#cleartoasts').click(function () {
                toastr.clear();
            });
        })
    </script>

   
</body>

 
</html>
