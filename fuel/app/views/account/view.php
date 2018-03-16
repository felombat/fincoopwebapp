<div class="content-box"> 
	<h2>Viewing <span class='muted'>#<?php echo $account->id; ?></span></h2>

	<p>
		<strong>Company id:</strong>
		<?php echo $account->company_id; ?></p>
	<p>
		<strong>Name:</strong>
		<?php echo $account->name; ?></p>
	<p>
		<strong>Number:</strong>
		<?php echo $account->number; ?></p>
	<p>
		<strong>Currency code:</strong>
		<?php echo $account->currency_code; ?></p>
	<p>
		<strong>Opening balance:</strong>
		<?php echo $account->opening_balance; ?></p>
	<p>
		<strong>Bank name:</strong>
		<?php echo $account->bank_name; ?></p>
	<p>
		<strong>Bank phone:</strong>
		<?php echo $account->bank_phone; ?></p>
	<p>
		<strong>Bank address:</strong>
		<?php echo $account->bank_address; ?></p>
	<p>
		<strong>Enabled:</strong>
		<?php echo $account->enabled; ?></p>

	<?php echo Html::anchor('account/edit/'.$account->id, 'Edit'); ?> |
	<?php echo Html::anchor('account', 'Back'); ?>
</div> 