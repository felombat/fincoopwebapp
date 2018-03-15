<?php 
use Carbon\Carbon;

Carbon::setLocale('fr');
?>

<div class="small-chat-box fadeInRight animated ">

        <div class="heading" draggable="true">
            <small class="chat-date pull-right">
                <?php echo Carbon::now('Europe/Berlin')->format('d/M/Y h:i:s') ;	?>
            </small>
            Small chat
        </div>
        <div class="content">
			<?php if(isset($data_payload['chats'])): ?>
				<?php $count = 0; $current_author_id = 0; $pos = 0; $alter = ['left', 'right']; ?>
				<?php foreach ($data_payload['chats'] as $index => $item): ?>
					
					<div class="<?php  $pos = $count%2; echo ($count%2 == 0) ? 'left': 'right'; ?>">
		                <div class="author-name">
		                    <?= $index .'. ' . $item->sender->first_name ." ". $item->sender->last_name;  ?>
		                    <small class="chat-date">
		                        <?php echo Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->format('h:i:s') ;
											//11:24 am ?>
		                    </small>
		                </div>
		                <div class="chat-message">
		                    <?= $item->message;  ?>
		                </div>
		            </div>
		            <?php $count++;  $current_author_id = $item->from_user_id ?>
				<?php endforeach; ?>
			<?php endif; ?>
             
    	</div>
    	

        <div class="form-chat">
            <div class="input-group input-group-sm"><input class="form-control" type="text"> <span class="input-group-btn"> <button class="btn btn-primary" type="button">Send
            </button> </span></div>
        </div>

    </div>

	<div id="small-chat">

        <span class="badge badge-warning pull-right">
        	<?php if(isset($data_payload['chats'])): ?>
        	 <?= count($data_payload['chats']); //ToDo: count unseen chat messages ?>
        	<?php endif; ?>
        </span>
        <a class="open-small-chat">
            <i class="fa fa-comments"></i>

        </a>
    </div>

    <script>

    $(document).ready(function () {

        // Add slimscroll to element
        //$('.small-chat-box .content').slimscroll({
        //    height: '234px'
        //});

    });

</script>