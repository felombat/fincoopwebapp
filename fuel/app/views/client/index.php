<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('client/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('client/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('client/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('client/delete','Delete');?></li>

</ul>
<p>Index</p>


<div class="content-box">
    <h2>Listing <span class='muted'>Clients </span></h2>
    <br>

    <?php if(!empty($clients ) ) :?>
        <div class="table-responsive">
            <table class="table table-padded dTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Tel</th>
                    <th class="text-center">Category</th>
                    <th class="text-right">Solde</th>
<!--                    <th class="text-right">Credit</th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clients as $k => $client) :?>
                    <tr>
                        <td class="text-center">  <?= $k ;?></td>
                        <td class="cell-with-media"> <span><?= \Html::anchor(Uri::create('contribution/client/'. @$client->id) , @$client->first_name . " " . @$client->last_name , array('target' => "_self"))   ?></span></td>

                        <td class="nowrap"><span class="status-pill smaller green"></span><span><?= @$client->email ?></span></td>

                        <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span><?= $client->address1 ?></span></td>
                        <td class="text-center"><a class="badge badge-success" href="apps_bank.html"><?= @$client->tel ?></a></td>
                        <td class="text-right bolder nowrap">  (GROUP_CLIENT) </td>
                        <td class="text-right bolder nowrap"> <?= number_format(  Model_Account::client_balance($client->id),0,","," " ) ?></td>

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
                
                -->
                </tbody>
            </table>
        </div>
    <?php else :?>
        <p> Aucun mouvement de collecte trouvé dans notre fichier</p>

    <?php endif;?>

    <p>
        <?php echo Html::anchor('contribution/create', 'Add new Contribution', array('class' => 'btn btn-success')); ?>

    </p>
</div>