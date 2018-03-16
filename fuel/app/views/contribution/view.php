<div class="content-box"> 
<h2>Viewing <span class='muted'>#<?php echo $contribution->id; ?></span></h2>

<p>
	<strong>Company id:</strong>
	<?php echo $contribution->company_id; ?></p>
<p>
	<strong>Budget id:</strong>
	<?php echo $contribution->budget_id; ?></p>
<p>
	<strong>Paid at:</strong>
	<?php echo $contribution->paid_at; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $contribution->amount; ?></p>
<p>
	<strong>Currency code:</strong>
	<?php echo $contribution->currency_code; ?></p>
<p>
	<strong>Currency rate:</strong>
	<?php echo $contribution->currency_rate; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $contribution->description; ?></p>
<p>
	<strong>Payment method:</strong>
	<?php echo $contribution->payment_method; ?></p>
<p>
	<strong>Reference:</strong>
	<?php echo $contribution->reference; ?></p>

<?php echo Html::anchor('contribution/edit/'.$contribution->id, 'Edit'); ?> |
<?php echo Html::anchor('contribution', 'Back'); ?>
</div>