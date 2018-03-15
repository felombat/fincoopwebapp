<!DOCTYPE html>
<html>
 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome.css',

        // Messages
        'plugins/iCheck/custom.css',

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

  <style>
      .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
  </style>
     

</head>
<body class="skin-1 fixed-navigation pace-done">
	 

	 <div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
    <div class="pace-activity"></div></div>
    <div id="wrapper">
    <?= View::forge('_partials/navigation' );?>


        <div id="page-wrapper" class="gray-bg sidebar-content" style="min-height: 708px;">
        <div class="row border-bottom">
	        <?= View::forge('_partials/header_navigation');?>
        </div>
			 <?= View::forge('_partials/sidebar_right_msg')->auto_filter(false);?>

            <div class="wrapper wrapper-content animated fadeInUp">
                <?php echo $content; ?>

            </div>

        
                <?= View::forge('_partials/page_footer');?>
                
                <?= View::forge('_partials/sidebar_right_params');?>
        </div>
     <?= View::forge('_partials/widget_chat');?>
    </div>

    





	<?php echo Asset::js(array(
	//  Mainly scripts 
    //	'jquery-3.1.1.min.js',
    	'bootstrap.min.js',
    	'plugins/metisMenu/jquery.metisMenu.js',
    	'plugins/slimscroll/jquery.slimscroll.min.js',

    	'plugins/jquery-ui/jquery-ui.min.js',
    	'plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
    	'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    	'plugins/sparkline/jquery.sparkline.min.js',

    	// Custom and plugin javascript
    	'inspinia.js',
        'plugins/chartJs/Chart.min.js',
    	'plugins/pace/pace.min.js',
        'plugins/c3/c3.min.js',
        'plugins/d3/d3.min.js',

        'plugins/iCheck/icheck.min.js',

    )); ?>

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
 

    $(document).ready(function() {
   
   		//function() {
		  $('#right-sidebar').toggleClass('sidebar-open');
		//}

        
        $.get("<?php echo Uri::create('apiv1/contribution_by_month.json')?>", function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Contributions H1 2018",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: data.data_chart
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65000, 59000, 80000, 81000, 56000, 55000, 40000]
                    }
                ]
            };

             var lineOptions = {
                responsive: true,
                animation: {
                   //animateRotate: true,
                   duration : 900,
                    onProgress: function(animation) {
                        //progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                    },
                   easing: 'easeInSine'
                }
                 
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
        });


            /*
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            }; */

           

        });
    
    </script>

   
</body>

 
</html>
