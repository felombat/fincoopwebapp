

 
		        <!--
				<div class="content-box">
						<ul class="nav nav-pills">
							<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('dashboard/index','Index');?></li>
							<li class='<?php echo Arr::get($subnav, "report" ); ?>'><?php echo Html::anchor('dashboard/report','Report');?></li>

						</ul>
						<p>Index</p>
					</div> -->


                    <div class="content-box">
                        <div class="element-wrapper compact pt-4">
                            <div class="element-actions"><a class="btn btn-primary btn-sm" href="<?= Uri::create('client/create')?>"><i class="os-icon os-icon-ui-22"></i><span>Add a Client</span></a><a class="btn btn-success btn-sm" href="<?= Uri::create('contribution/create')?>"><i class="os-icon os-icon-grid-10"></i><span>Make Payment / Log a withdrawal</span></a></div>
                            <h6 class="element-header">Financial Overview</h6>
                            <div class="element-box-tp">
                                <div class="row">
                                    <div class="col-lg-7 col-xxl-6">
                                        <!--START - BALANCES-->
                                        <div class="element-balances">
                                            <div class="balance hidden-mobile">
                                                <div class="balance-title">Total Balance</div>
                                                <div class="balance-value small">
                                                    <?php if(Auth::member(70) OR Auth::member(100)) :?>
                                                        <span><?= $app_params['currency_label'] ." ". number_format(  Model_Account::balance(1)  + Model_Account::balance(2) ,0,","," " );  ?> </span><span class="trending trending-down-basic"><span>%12</span><i class="os-icon os-icon-arrow-2-down"></i>
                                                    <?php elseif(Auth::member(60) ) : ?>
                                                        <span><?= $app_params['currency_label'] ." ". number_format(  Model_Account::balance(1)  ,0,","," " );  ?> </span><span class="trending trending-down-basic"><span>%12</span><i class="os-icon os-icon-arrow-2-down"></i></span>
                                                    <?php else: ?>
                                                        <span><?= $app_params['currency_label'] ." ". number_format(  1,0,","," " );  ?> </span><span class="trending trending-down-basic"><span>%1</span><i class="os-icon os-icon-arrow-2-down"></i></span>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="balance-link"><a class="btn btn-link btn-underlined" href="<?= Uri::create('account')?>"><span>View Statement</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                            </div>
                                            <div class="balance">
                                                <div class="balance-title">Credit Available</div>
                                                <div class="balance-value"><?= $app_params['currency_label'] ." ". number_format(  Model_Account::balance(3) + Model_Account::balance(0)  ,0,","," " ); ?></div>
                                                <div class="balance-link"><a class="btn btn-link btn-underlined" href="<?= Uri::create('transaction/requestappro')?>"><span>Request Increase</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                            </div>
                                            <div class="balance">
                                                <div class="balance-title">Due Today</div>
                                                <div class="balance-value danger"><?= $app_params['currency_label'];?>180</div>
                                                <div class="balance-link"><a class="btn btn-link btn-underlined btn-gold" href="<?= Uri::create('transction/create')?>"><span>Pay Now</span><i class="os-icon os-icon-arrow-right4"></i></a></div>
                                            </div>
                                        </div>
                                        <!--END - BALANCES-->
                                    </div>
                                    <div class="col-lg-5 col-xxl-6">
                                        <!--START - MESSAGE ALERT-->
                                        <div class="alert alert-warning borderless">
                                            <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
                                            <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
                                            <div class="alert-btn"><a class="btn btn-white-gold" href="apps_bank.html#"><i class="os-icon os-icon-ui-92"></i><span>Send Referral</span></a></div>
                                        </div>
                                        <!--END - MESSAGE ALERT-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-xxl-6">
                                <!--START - CHART-->
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <div class="element-actions">
                                            <div class="form-group">
                                                <select class="form-control form-control-sm">
                                                    <option selected="true">Last 30 days</option>
                                                    <option>This Week</option>
                                                    <option>This Month</option>
                                                    <option>Today</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h5 class="element-box-header">Balance History</h5>
                                        <div class="el-chart-w">
                                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                </div>
                                            </div>
                                            <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46" height="196" id="savings_client" idx="liteLineChartV2" width="658" class="chartjs-render-monitor" style="display: block; height: 179px; width: 599px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!--END - CHART-->
                            </div>
                            <div class="col-lg-5 col-xxl-6">






                                    <!--START - Money Withdraw Form-->
                                    <div class="element-wrapper">


                                        <div class="element-box">
                                            <div class="os-tabs-controls">

                                                <ul class="nav nav-tabs smaller" role="tablist">
                                                    <li class='nav-item <?php echo Arr::get($subnav, "dashboard" ); ?>'><?php echo Html::anchor('#withdraw_mini_form','Retrait', array('class'=>'nav-link ' . Arr::get($subnav, "index" ), 'role'=>"tab", 'data-toggle'=>"tab"));?></li>
                                                    <li class='nav-item <?php echo Arr::get($subnav, "withdraw" ); ?>'><?php echo Html::anchor('#deposit_mini_form','Versement',array('class'=>'nav-link', 'role'=>"tab", 'data-toggle'=>"tab"));?></li>
                                                </ul>


                                            </div>

                                                <!-- Tab panes -->
                                            <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="withdraw_mini_form">

                                                        <form>
                                                            <h5 class="element-box-header">Withdraw Money</h5>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Select Client to debit</label>
                                                                        <?= Form::select('widthdrw_client', '-', Model_Client::get_dropdownlist(), array('class'=>"form-control") );?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Enter Amount</label>
                                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                            <input class="form-control" placeholder="Enter Amount..." type="text" value="0">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><?= $app_params['currency_code'];?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Method ...</label>
                                                                        <?= Form::select('widthdrw_client', 'cash', $app_params["payment_methods"], array('class'=>"form-control") );?>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-buttons-w text-right compact"><a class="btn btn-grey" href="<?= Uri::create('client/create')?>"><i class="os-icon os-icon-ui-22"></i><span>Add Client</span></a><a class="btn btn-primary" id="submit_withdraw" href="javascript:"><span>Pay </span><i class="os-icon os-icon-grid-18"></i></a></div>
                                                        </form>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane faded" id="deposit_mini_form">
                                                        <form>
                                                            <h5 class="element-box-header">Deposit Money</h5>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Select Client Account to credit</label>
                                                                        <?= Form::select('widthdrw_client', '-', Model_Client::get_dropdownlist(), array('class'=>"form-control") );?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Enter Amount</label>
                                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                            <input class="form-control" placeholder="Enter Amount..." type="text" value="0">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><?= $app_params['currency_code'];?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <label class="lighter" for="">Method ...</label>
                                                                        <?= Form::select('widthdrw_client', 'cash', $app_params["payment_methods"], array('class'=>"form-control") );?>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-buttons-w text-right compact"><a class="btn btn-grey" href="<?= Uri::create('client/create')?>"><i class="os-icon os-icon-ui-22"></i><span>Add new Client</span></a><a class="btn btn-primary" id="submit_deposit" href="javascript:"><span>Valider</span><i class="os-icon os-icon-grid-18"></i></a></div>
                                                        </form>
                                                    </div>

                                                </div>





                                        </div>
                                    </div>
                                    <!--END - Money Withdraw Form-->




                            </div>
                        </div>
                        <!--START - Transactions Table-->
                        <div class="element-wrapper">
                            <h6 class="element-header">Recent Deposits</h6>
                            <div class="element-box-tp">
                            <?php if(!empty($contributions ) ) :?>
                                <div class="table-responsive">
                                    <table class="table  dTable container-fluid table-bordered table-lg table-v2 table-striped" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th width="300px">Client</th>
                                                <th width="350px">Description</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-right">Debit</th>
                                                <th class="text-right">Credit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($contributions as $contribution) :?>
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller green"></span><span><?= $contribution->status ?></span></td>
                                                <?php list($date, $time) = explode(' ', trim($contribution->paid_at)); ?>
                                                <td><span><?= $date ?></span><span class="smaller lighter"><?= $time ?></span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span><?= \Html::anchor(Uri::create('contribution/client/'. @$contribution->budget_id) , @$contribution->client->first_name . " " . @$contribution->client->last_name , array('target' => "_self"))   ?></span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span><?= $contribution->description ?></span></td>
                                                <td class="text-center"><a class="badge badge-success" href="apps_bank.html"><?= @$contribution->category->title ?></a></td>
                                                <?php if($contribution->type == 'debit') : ?>
                                                    <td class="text-right bolder nowrap"><span class="text-danger">- <?= $contribution->amount ?> <?= $app_params['currency_label'] ?></span></td>
                                                    <td class="text-right bolder nowrap"></td>
                                                <?php else : ?>
                                                    <td class="text-right bolder nowrap"></td>
                                                    <td class="text-right bolder nowrap"><span class="text-success">+ <?= $contribution->amount ?> <?= $app_params['currency_label'] ?></span></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                            <!--
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller red"></span><span>Declined</span></td>
                                                <td><span>Jan 19th</span><span class="smaller lighter">3:22pm</span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company2.png" style="height: 25px;"><span>Stripe Payment Processing</span></td>
                                                <td class="text-center"><a class="badge badge-danger" href="apps_bank.html">Cafe</a></td>
                                                <td class="text-right bolder nowrap"><span class="text-success">+ 952.23 USD</span></td>
                                            </tr>
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller yellow"></span><span>Pending</span></td>
                                                <td><span>Yesterday</span><span class="smaller lighter">7:45am</span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company3.png" style="height: 25px;"><span>MailChimp Services</span></td>
                                                <td class="text-center"><a class="badge badge-warning" href="apps_bank.html">Restaurants</a></td>
                                                <td class="text-right bolder nowrap"><span class="text-danger">- 320 USD</span></td>
                                            </tr>
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller yellow"></span><span>Pending</span></td>
                                                <td><span>Jan 23rd</span><span class="smaller lighter">2:12pm</span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span>Starbucks Cafe</span></td>
                                                <td class="text-center"><a class="badge badge-primary" href="apps_bank.html">Shopping</a></td>
                                                <td class="text-right bolder nowrap"><span class="text-success">+ 17.99 USD</span></td>
                                            </tr>
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller green"></span><span>Complete</span></td>
                                                <td><span>Jan 12th</span><span class="smaller lighter">9:51am</span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company4.png" style="height: 25px;"><span>Ebay Marketplace</span></td>
                                                <td class="text-center"><a class="badge badge-danger" href="apps_bank.html">Groceries</a></td>
                                                <td class="text-right bolder nowrap"><span class="text-danger">- 244 USD</span></td>
                                            </tr>
                                            <tr>
                                                <td class="nowrap"><span class="status-pill smaller yellow"></span><span>Pending</span></td>
                                                <td><span>Jan 9th</span><span class="smaller lighter">12:45pm</span></td>
                                                <td class="cell-with-media"><img alt="" src="img/company2.png" style="height: 25px;"><span>Envato Templates Inc</span></td>
                                                <td class="text-center"><a class="badge badge-primary" href="apps_bank.html">Business</a></td>
                                                <td class="text-right bolder nowrap"><span class="text-success">+ 340 USD</span></td>
                                            </tr>
                                            -->
                                        </tbody>
                                    </table>
                                </div>
                            <?php else :?>
                                <p> Aucun mouvement de collecte trouvé dans notre fichier</p>

                            <?php endif;?>
                            </div>
                        </div>
                        <!--END - Transactions Table-->
                        <!--------------------
						START - Color Scheme Toggler
						-------------------->
                        <div class="floated-colors-btn second-floated-btn">
                            <div class="os-toggler-w">
                                <div class="os-toggler-i">
                                    <div class="os-toggler-pill"></div>
                                </div>
                            </div><span>Dark </span><span>Colors</span></div>
                        <!--------------------
						END - Color Scheme Toggler
						-------------------->
						                        <!--------------------
						START - Demo Customizer
						-------------------->
                        <div class="floated-customizer-btn third-floated-btn">
                            <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><span>Customizer</span></div>
                        <div class="floated-customizer-panel">
                            <div class="fcp-content">
                                <div class="close-customizer-btn"><i class="os-icon os-icon-x"></i></div>
                                <div class="fcp-group">
                                    <div class="fcp-group-header">Menu Settings</div>
                                    <div class="fcp-group-contents">
                                        <div class="fcp-field">
                                            <label for="">Menu Position</label>
                                            <select class="menu-position-selector">
                                                <option value="left">Left</option>
                                                <option value="right">Right</option>
                                                <option value="top">Top</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Menu Style</label>
                                            <select class="menu-layout-selector">
                                                <option value="compact">Compact</option>
                                                <option value="full">Full</option>
                                                <option value="mini">Mini</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field with-image-selector-w" style="display: none;">
                                            <label for="">With Image</label>
                                            <select class="with-image-selector">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Menu Color</label>
                                            <div class="fcp-colors menu-color-selector">
                                                <div class="color-selector menu-color-selector color-bright"></div>
                                                <div class="color-selector menu-color-selector color-dark"></div>
                                                <div class="color-selector menu-color-selector color-light selected"></div>
                                                <div class="color-selector menu-color-selector color-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fcp-group">
                                    <div class="fcp-group-header">Sub Menu</div>
                                    <div class="fcp-group-contents">
                                        <div class="fcp-field">
                                            <label for="">Sub Menu Style</label>
                                            <select class="sub-menu-style-selector">
                                                <option value="flyout">Flyout</option>
                                                <option value="inside">Inside/Click</option>
                                                <option value="over">Over</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Sub Menu Color</label>
                                            <div class="fcp-colors">
                                                <div class="color-selector sub-menu-color-selector color-bright"></div>
                                                <div class="color-selector sub-menu-color-selector color-dark"></div>
                                                <div class="color-selector sub-menu-color-selector color-light selected"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fcp-group">
                                    <div class="fcp-group-header">Other Settings</div>
                                    <div class="fcp-group-contents">
                                        <div class="fcp-field">
                                            <label for="">Full Screen?</label>
                                            <select class="full-screen-selector">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Show Top Bar</label>
                                            <select class="top-bar-visibility-selector">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Above Menu?</label>
                                            <select class="top-bar-above-menu-selector">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="fcp-field">
                                            <label for="">Top Bar Color</label>
                                            <div class="fcp-colors">
                                                <div class="color-selector top-bar-color-selector color-bright"></div>
                                                <div class="color-selector top-bar-color-selector color-dark"></div>
                                                <div class="color-selector top-bar-color-selector color-light"></div>
                                                <div class="color-selector top-bar-color-selector color-transparent selected"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--------------------
						END - Demo Customizer
						-------------------->
						                        <!--------------------
						START - Chat Popup Box
						-------------------->
                        <div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span></div>
                        <div class="floated-chat-w">
                            <div class="floated-chat-i">
                                <div class="chat-close"><i class="os-icon os-icon-close"></i></div>
                                <div class="chat-head">
                                    <div class="user-w with-status status-green">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div>
                                        </div>
                                        <div class="user-name">
                                            <h6 class="user-title">John Mayers</h6>
                                            <div class="user-role">Account Manager</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-messages ps ps--theme_default" data-ps-id="dc64cc88-9b2b-82e0-5ece-7b86d35f6423">
                                    <div class="message">
                                        <div class="message-content">Hi, how can I help you?</div>
                                    </div>
                                    <div class="date-break">Mon 10:20am</div>
                                    <div class="message">
                                        <div class="message-content">Hi, my name is Mike, I will be happy to assist you</div>
                                    </div>
                                    <div class="message self">
                                        <div class="message-content">Hi, I tried ordering this product and it keeps showing me error code.</div>
                                    </div>
                                    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                        <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
                                        <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                                <div class="chat-controls">
                                    <input class="message-input" placeholder="Type your message here..." type="text">
                                    <div class="chat-extra"><a href="apps_bank.html#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="apps_bank.html#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="apps_bank.html#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <!--------------------
						END - Chat Popup Box
						-------------------->
                    </div>

                <script  >
                    $('document').ready(function (e) {
                        var ctx = document.getElementById("savings_client").getContext('2d');

                        var mixedChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                datasets: [{
                                    label: 'Bar Dataset',
                                    data:  [8,15,20,21,22,23,24,25,26,27,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]   //$contributions_widget_data  ,//[10, 20, 30, 40]
                                }, {
                                    label: 'Line Dataset',
                                    data: [3500,10000,1000,2500,7000,8000,22000,29000,87500,4500,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0], //,[50, 50, 50, 50],

                                    // Changes this dataset to become a line
                                    type: 'line'
                                }],
                                labels: ['1','2','3','4','5','6','7','8','9','10','12','13','14','15']
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    })
                    //$("#savings_client");


                </script>
 