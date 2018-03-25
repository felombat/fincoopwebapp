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


        // Messages
        'plugins/iCheck/custom.css',

        'plugins/summernote/summernote.css',
        'plugins/summernote/summernote-bs3.css',


        //DateTimePicker
        'plugins/datetimepicker/bootstrap-datetimepicker.css',



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
  "timeOut": "15000",
  "extendedTimeOut": "2000",
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
      
      //console.log('PushNotification', data.message + ' '+data.name);
      //toastr.info('Data Push',"<p> " +" data.message + "</p>");
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

         <div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
		<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
      <script>
        // Notice 
        // Display a info toast, with a title
          toastr.info('Notice:',"<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>");
      </script>
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

            	 
			            <?php echo $content; ?>

			          
            </div>

            <?= View::forge('_partials/page_footer');?>

        </div>

         <?= View::forge('_partials/widget_chat');?>
        </div>


	<?php echo Asset::js(array(
	   //  Mainly scripts 
    //  'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	'plugins/metisMenu/jquery.metisMenu.js',
    	'plugins/slimscroll/jquery.slimscroll.min.js',

    	// Custom and plugin javascript
        'inspinia.js',
        'plugins/pace/pace.min.js',
        'plugins/c3/c3.min.js',
        'plugins/d3/d3.min.js',

         'plugins/iCheck/icheck.min.js',

         //Summer note
         'plugins/summernote/summernote.min.js',

         'plugins/datapicker/bootstrap-datepicker.js',

         // DateTimePicker
         'plugins/datetimepicker/moment.js_2.9.0_moment-with-locales.js',
         'plugins/datetimepicker/bootstrap-datetimepicker.js',

         'plugins/daterangepicker/daterangepicker.js',


         //App scripts 
         'app.dev.js',

    )); ?>

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

             $('.summernote').summernote();

             //$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
             $.fn.datepicker.defaults.format = "yyyy-mm-dd";

             $('.idatetimepicker').datetimepicker();
             $('.datetimepicker').datetimepicker();

        });
    </script>

    <script >
 
   
/*
(function(){

   Pusher.logToConsole = true;

    var pusher = new Pusher('3607fe1af3ddf0c619ad', {
      cluster: 'eu',
      encrypted: true
    });

    var datagauge = ['data', 95];
      data = {};
      data.data1 = 95;
      data.data2 =  95;
    

    var channel = pusher.subscribe('lhcm-channel');
    channel.bind('prodreport', function(data) {
      
      console.log('PushNotification',data.message + ' '+data.name);
       var datagauge1 = ['data', data.data1] || datagauge,
           datagauge2 = ['data', data.data2] || datagauge;
           <?php  //$_mydata = $_POST['content_data']; ?>

        // Notice 
        // Display a info toast, with a title
          toastr.info('Data Push',"<p> " +" data.message + "</p>");

           // toastr.success('Data Updated',"<p> <?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>   </p>"); 

        

      //alert(data.message);
    });

   

})();
 */ 
</script>
    

   
</body>

 
</html>
