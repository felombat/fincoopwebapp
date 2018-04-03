<div class="content-box"> 
<h2>Listing <span class='muted'>Contributions</span> de : <?= @$client->first_name . " " . @$client->last_name ?></h2>
<br>

    <?php if(!empty($contributions ) ) :?>
        <div class="table-responsive">
            <table class="table table-padded dataTabless">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Date</th>
<!--                    <th width="300px">Client</th>-->
                    <th width="600px">Description</th>
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
                        <!--<td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span>--><?php //echo @$contribution->client->first_name . " " . @$contribution->client->last_name  ?><!--</span></td>-->
                        <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span><?= $contribution->description ?></span></td>
                        <td class="text-center"><a class="badge badge-success" href="apps_bank.html"><?= @$contribution->category->title ?></a></td>
                        <?php if($contribution->type == 'debit' OR $contribution->type == 'fees' OR $contribution->type == 'commission') : ?>
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
                <tr>
                    <td colspan="3"> &nbsp;</td>
                    <td>solde :</td>
                    <td> &nbsp;</td>
                    <td class="text-right bolder nowrap"><span style="font-size: 2.3em"><?= number_format(  Model_Account::client_balance($client->id),0,","," " ) ?></span></td>
                </tr>
                </tbody>
            </table>

        </div>
    <?php else :?>
        <p> Aucun mouvement de collecte trouvé dans notre fichier</p>

    <?php endif;?>

    <p>
	<?php echo Html::anchor('contribution/create/'.$client->id, 'Add new Contribution', array('class' => 'btn btn-success')); ?>

</p>
</div>