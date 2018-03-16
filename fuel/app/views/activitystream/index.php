<?php 
use Carbon\Carbon;

Carbon::setLocale('fr');
?>

    <div class="content-box"> 
            <div class="row">
            	<ul class="nav nav-pills">
            		<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('activitystream/index','Index');?></li>

            	</ul>
            </div>

			<div class="row">
                    
                    <div class="col-lg-7 ">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Basic activity stream - About 3 months ago ...</h5>
                            </div>

                            <div class="ibox-content scroll_content">
							<?php if($activitylogs): ?>
                            <?php foreach($activitylogs as $key => $log_item) : ?>

                                <div class="stream-small">
                                    <span class="label <?php echo Arr::get($label_class, $log_item->action ); ?>">  <?php echo Arr::get($label_action, $log_item->action ); ?></span>
                                    <span class="text-muted"> <?= Carbon::createFromTimestamp($log_item->created_at, 'Europe/Berlin')->diffForHumans() ; 
                                    // echo "Today at 10:30:50 pm " ; ?> </span> / 
                                    <a href="#">
                                    	<?= $log_item->owner->first_name ." ". $log_item->owner->last_name ; ?>	
                                    </a>  
                                    <?= $log_item->action .' <span class="label label-default">'.$log_item->log_type.'</span>'.  $log_item->log_type_title ." -- <small>".
                                    Carbon::createFromTimestamp($log_item->created_at, 'Europe/Berlin')->toFormattedDateString() ."</small>"; ?> 
                                </div>
                            <?php endforeach ; ?>

                            <?php else: ?>

                            <?php endif ; ?>
                                 
                                <!-- <div class="stream-small">
                                    <span class="label label-success"> Comment</span>
                                    <span class="text-muted"> Today at 11:43:59 am </span> / <a href="#">Jessica Smith</a>  Commented on public board.
                                </div>
                                <div class="stream-small">
                                    <span class="label label-primary"> Add</span>
                                    <span class="text-muted"> Yesterday at 10:02:33 pm </span> / <a href="#">Camila Farter</a> Added new file to project.
                                </div>
                                <div class="stream-small">
                                    <span class="label label-warning"> Activity</span>
                                    <span class="text-muted"> Today at 08:10:50 am </span> / <a href="#">John Dernex</a>  Add new item to stage zero.
                                </div> -->
                                

                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="col-lg-5">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Expended activity stream</h5>
                            </div>

                            <div class="ibox-content">

                                <div class="activity-stream">
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a5.jpg">
                                                    <span>Karen Miggel</span>
                                                    <span class="date">Today at 01:32:40 am</span>
                                                </a>
                                            </div>
                                            Add new note to the <a href="#">Martex</a>  project.
                                        </div>
                                    </div>

                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-commenting-o"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a4.jpg">
                                                    <span>John Mikkens</span>
                                                    <span class="date">Yesterday at 10:00:20 am</span>
                                                </a>
                                            </div>
                                            Commented on <a href="#">Ariana</a> profile.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a2.jpg">
                                                    <img src="img/a3.jpg">
                                                    <img src="img/a4.jpg">
                                                    <span>Mike Johnson, Monica Smith and Karen Dortmund</span>
                                                    <span class="date">Yesterday at 02:13:20 am</span>
                                                </a>
                                            </div>
                                            Changed status of third stage in the <a href="#">Vertex</a> project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a6.jpg">
                                                    <span>Jessica Smith</span>
                                                    <span class="date">Yesterday at 08:14:41 am</span>
                                                </a>
                                            </div>
                                            Add new files to own file sharing place.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-send bg-primary"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a7.jpg">
                                                    <img src="img/a1.jpg">
                                                    <span>Martha Farter and Mike Rodgers</span>
                                                    <span class="date">Yesterday at 04:18:13 am</span>
                                                </a>
                                            </div>
                                            Sent email to all users participating in new project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-tag bg-warning"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a7.jpg">
                                                    <span>Mark Mickens</span>
                                                    <span class="date">Yesterday at 06:00:30 am</span>
                                                </a>
                                            </div>
                                            Has been taged in the latest comments about the new project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a8.jpg">
                                                    <span>Mike Johnson</span>
                                                    <span class="date">Yesterday at 02:13:20 am</span>
                                                </a>
                                            </div>
                                            Changed status of second stage in the latest project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a1.jpg">
                                                    <span>Jessica Smith</span>
                                                    <span class="date">Yesterday at 08:14:41 am</span>
                                                </a>
                                            </div>
                                            Add new files to own file sharing place.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a6.jpg">
                                                    <span>Jessica Smith</span>
                                                    <span class="date">Yesterday at 08:14:41 am</span>
                                                </a>
                                            </div>
                                            Add new files to own file sharing place.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-send"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a7.jpg">
                                                    <span>Martha Farter</span>
                                                    <span class="date">Yesterday at 04:18:13 am</span>
                                                </a>
                                            </div>
                                            Sent email to all users participating in new project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-sliders bg-success"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a2.jpg">
                                                    <span>Mark Mickens</span>
                                                    <span class="date">Yesterday at 06:00:30 am</span>
                                                </a>
                                            </div>
                                            Has been taged in the latest comments about the new project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a8.jpg">
                                                    <span>Mike Johnson</span>
                                                    <span class="date">Yesterday at 02:13:20 am</span>
                                                </a>
                                            </div>
                                            Changed status of second stage in the latest project.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a1.jpg">
                                                    <span>Jessica Smith</span>
                                                    <span class="date">Yesterday at 08:14:41 am</span>
                                                </a>
                                            </div>
                                            Add new files to own file sharing place.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a5.jpg">
                                                    <img src="img/a2.jpg">
                                                    <span>Karen Johnson and Sasha Miggel</span>
                                                    <span class="date">Today at 01:32:40 am</span>
                                                </a>
                                            </div>
                                            Add new note to the <a href="#">Martex</a>  project.
                                        </div>
                                    </div>

                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-commenting-o"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a4.jpg">
                                                    <span>John Mikkens</span>
                                                    <span class="date">Yesterday at 10:00:20 am</span>
                                                </a>
                                            </div>
                                            Commented on <a href="#">Ariana</a> profile.
                                        </div>
                                    </div>
                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a2.jpg">
                                                    <span>Mike Johnson</span>
                                                    <span class="date">Yesterday at 02:13:20 am</span>
                                                </a>
                                            </div>
                                            Changed status of third stage in the <a href="#">Vertex</a> project.
                                        </div>
                                    </div>

                                    <div class="stream">
                                        <div class="stream-badge">
                                            <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="stream-panel">
                                            <div class="stream-info">
                                                <a href="#">
                                                    <img src="img/a6.jpg">
                                                    <span>Jessica Smith</span>
                                                    <span class="date">Yesterday at 08:14:41 am</span>
                                                </a>
                                            </div>
                                            Add new files to own file sharing place.

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div> -->
                </div>

    </div>

                

                <script>

    $(document).ready(function () {

        // Add slimscroll to element
        $('.scroll_content').slimscroll({
            height: '350px'
        });

    });

</script>