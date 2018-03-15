<?php 
use Carbon\Carbon;
 Carbon::setLocale('de');
$dt = new Carbon;
$dt->setlocale('fr');
?>

        <div class="sidebar-panel" style="min-height: 1252.9px;">
                <div>
                    <h4>Messages <span class="badge badge-info pull-right">
                        <?= count($data_payload['messages']); ?>
                    </span></h4>

                    <?php if($data_payload['messages']): ?>
                
                        <?php foreach ($data_payload['messages'] as $index => $item): ?>
                            
                            

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <?= Model_Employee::get_avatar($item->form_user_id, 32); ?>
                                </a>
                                <div class="media-body">
                                 <small class="text-muted  right"> 
                                    <?php echo  Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->format('l M jS- h:i:s') ;
                                                    //  Thu, 26 - 18:39:23; ?>
                                                    </small>
                                    <?= Str::truncate($item->message,80,' ...');  ?>
                                    <br>
                                    <small class="text-muted"> 
                                                    <br>
                                        <?= Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->diffForHumans();?>
                                    </small>
                                </div>
                            </div>
                             
                        <?php endforeach; ?>
                    <?php endif; ?>
            

                </div>
                <div class="m-t-md">
                    <h4>Statistics</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                    </p>
                    <div class="row m-t-sm">
                        <div class="col-md-6">
                            <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                            <h5><strong>169</strong> Posts</h5>
                        </div>
                        <div class="col-md-6">
                            <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                            <h5><strong>28</strong> Orders</h5>
                        </div>
                    </div>
                </div>
                <div class="m-t-md">
                    <h4>Discussion</h4>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge badge-primary">16</span>
                                General topic
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info">12</span>
                                The generated Lorem
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning">7</span>
                                There are many variations
                            </li>
                        </ul>
                    </div>
                </div>
            </div>