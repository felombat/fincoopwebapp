<?php 
use Carbon\Carbon;
 Carbon::setLocale('fr');
$dt = new Carbon;
$dt->setlocale('fr');
?>

<nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <div class="ib topbar-dropdown">
                    <label for="topbar-multiple" class="control-label pr10 fs11 text-muted">Reporting Period</label>
                    <select id="topbar-multiple" class="" style="display: visible;">
                    <optgroup label="Filter By:">
                    <option value="1-1">Last 30 Days</option>
                    <option value="1-2" selected="selected">Last 60 Days</option>
                    <option value="1-3">Last Year</option>
                    </optgroup>
                    </select>
                    </div>
                </li>
                <li>
                    <span class="m-r-sm text-muted welcome-message"> <?php //Welcome to INSPINIA+ Admin Theme. ?> </span>
                </li>
                 <?php if(isset($data_payload['messages']) ): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"> <?= count($data_payload['messages']); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                    
                
                        <?php foreach ($data_payload['messages'] as $index => $item): ?>
                             
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <?= Model_Employee::get_avatar($item->form_user_id, 28); ?>
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right"> <?= Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->diffForHumans();?></small>
                                        <?= Str::truncate($item->message,80,' ...');  ?><br>
                                        <small class="text-muted"><?php echo  Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->format('l M jS- h:i:s') ;
                                                    //  Thu, 26 - 18:39:23; ?></small>
                                    </div>
                                </div>
                            </li>

                             <li class="divider"></li>
                             
                        <?php endforeach; ?>
                    
                        
                        <!-- <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li> -->
                    </ul>
                </li>
                <?php endif; ?>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <?= Html::anchor(URI::create('logout'),'<i class="fa fa-sign-out"></i> Log out',array("" => ''));?>
                    </li>

                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>