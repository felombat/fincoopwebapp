<div class="content-box"> 
<h2>New <span class='muted'>Message</span></h2>
<br>




<p><?php echo Html::anchor('message', 'Back'); ?></p>


		<div class="row">
            <?php echo View::forge('_partials/inbox_sidebar', array()) ;?>

            <div class="col-lg-9 animated fadeInRight">

            	<?php //echo render('message/_form'); ?>

             <?php echo render('message/_form_message'); ?>

            
        </div>
</div>