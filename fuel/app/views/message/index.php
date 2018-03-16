
<?php 
use Carbon\Carbon; 
?>
<!-- 
<?php if ($messages OR FALSE): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Subject</th>
			<th>Message</th>
			<th>Form user id</th>
			<th>To user id</th>
			<th>Status</th>
			<th>Message id</th>
			<th>Files</th>
			<th>Deleted by users</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($messages as $item): ?>		<tr>

			<td><?php echo $item->subject; ?></td>
			<td><?php echo $item->message; ?></td>
			<td><?php echo $item->form_user_id; ?></td>
			<td><?php echo $item->to_user_id; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->message_id; ?></td>
			<td><?php echo $item->files; ?></td>
			<td><?php echo $item->deleted_by_users; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('message/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('message/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('message/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?>

<p>
	<?php echo Html::anchor('message/create', 'Add new Message', array('class' => 'btn btn-success')); ?>

</p> --> 
<div class="content-box"> 

        <div class="row">
            <?php echo View::forge('_partials/inbox_sidebar', array()) ;?>
            
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
                    <div class="input-group">
                        <input class="form-control input-sm" name="search" placeholder="Search email" type="text">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                    Inbox (<?php echo count($messages); ?>)
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                    </div>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                </div>
            </div>
                <div class="mail-box">

                <table class="table table-hover table-mail">
                <tbody>
                <?php 
                /* 
                <tr class="unread">
                    <td class="check-mail">
                        <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                    <td class=""><i class="fa fa-paperclip"></i></td>
                    <td class="text-right mail-date">6.10 AM</td>
                </tr>
                <tr class="unread">
                    <td class="check-mail">
                        <div class="icheckbox_square-green checked" style="position: relative;"><input class="i-checks" checked="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Jack Nowak</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">8.22 PM</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Facebook</a> <span class="label label-warning pull-right">Clients</span> </td>
                    <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jan 16</td>
                </tr>
                <tr class="read">
                    <td class="check-mail">
                        <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </td>
                    <td class="mail-ontact"><a href="mail_detail.html">Mailchip</a></td>
                    <td class="mail-subject"><a href="mail_detail.html">There are many variations of passages of Lorem Ipsum.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Mar 22</td>
                </tr> 
                */ ?>

                <?php foreach ($messages as $item): ?>		
                <tr class="<?php echo $item->status; ?>">
                    <td class="check-mail">
                        <input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox">
                    </td>
                    <td class="mail-ontact"> 
                    	<?php echo Html::anchor('message/view/'.$item->id, $item->sender->first_name ." ". $item->sender->last_name, array('class' => '')); ?>
                    </td>
                    <td class="mail-subject">
                    	<?php echo Html::anchor('message/view/'.$item->id, $item->subject, array('class' => '')); ?>
                    </td>
                    <td class=""></td>
                    <td class="text-right mail-date"><?php echo Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->toDateTimeString() ; ?> 
                        &middot;
                         
                        <?php echo Html::anchor('message/delete/'.$item->id, '<i class="fa fa-times"></i>', array('class' => 'btn btn-sm btn-white', 'onclick' => "return confirm('Are you sure?')", 'data-toggle'=>"tooltip", 'data-placement'=>"top", 'title'=>"Move to trash" )); ?>

                    </td>
                 
				</tr>
				<?php endforeach; ?>	 
                
                </tbody>
                </table>


                </div>
            </div>
        </div>

</div>
 <script >
 
   

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
          toastr.info('Data Push',"<p> "+  data.message  +"  </p>");

           // toastr.success('Data Updated',"<p> <?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>   </p>"); 

        

      //alert(data.message);
    });

   

})();

 
 
</script>
