<?php echo Form::open(array("class"=>"form-horizontal col-md-8")); ?>

	<fieldset>
		<div class="form-group ">
			<?php //echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php //echo Form::hidden('company_id', Input::post('company_id', isset($transaction) ? $transaction->company_id : '1'), array('class' => 'col-md-4 form-control', 'value'=>1, 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group col-md-6">
			<?php echo Form::label('Compte Source', 'from_account_id', array('class'=>'control-label ')); ?>

				 
				<?php //Form::select('from_account_id', Input::post('from_account_id', isset($transaction) ? $transaction->from_account_id : '-'), array('class'=>"form-control") );?>

				<?= Form::select('from_account_id', '-', Model_Account::get_dropdownlist(), array('class'=>"form-control col-md-8 select2") );?>

		</div>

		<div class="form-group col-md-6">
			<?php echo Form::label('Compte Destination', 'to_account_id', array('class'=>'control-label ')); ?>

				
				<?php //Form::select('to_account_id', Input::post('to_account_id', isset($transaction) ? $transaction->to_account_id : '-'), array('class'=>"form-control") );?>

				<?= Form::select('to_account_id', '-', Model_Account::get_dropdownlist(), array('class'=>"form-control col-md-8 select2") );?>

		</div>
		 
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($transaction) ? $transaction->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type</label>
            <div class="col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                        <input checked="" class="form-check-input" name="type" value="1" type="radio">Transfert</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="type" value="0" type="radio">Extournement</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="type" value="2" type="radio">Dépot à Terme</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="type" value="3" type="radio">Frais d'inscription</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="type" value="4" type="radio">Commission</label>
                </div>

            </div>
        </div>
		<!--
		<div class="form-group">
			<?php echo Form::label('Currency code', 'currency_code', array('class'=>'control-label')); ?>

				<?php //echo Form::hidden('currency_code', Input::post('currency_code', isset($transaction) ? $transaction->currency_code : ''), array('class' => 'col-md-4 form-control', 'value'=> 'XAF', 'placeholder'=>'Currency code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency rate', 'currency_rate', array('class'=>'control-label')); ?>

				<?php //echo Form::hidden('currency_rate', Input::post('currency_rate', isset($transaction) ? $transaction->currency_rate : ''), array('class' => 'col-md-4 form-control', 'value'=>1.00, 'placeholder'=>'Currency rate')); ?>

		</div> -->
		<?php echo Form::hidden('currency_code', Input::post('currency_code', isset($transaction) ? $transaction->currency_code : 'XAF'), array('class' => 'col-md-4 form-control', 'value'=> 'XAF', 'placeholder'=>'Currency code')); ?>
		<?php echo Form::hidden('currency_rate', Input::post('currency_rate', isset($transaction) ? $transaction->currency_rate : '1.00'), array('class' => 'col-md-4 form-control', 'value'=>1.00, 'placeholder'=>'Currency rate')); ?>

<!--		<div class="form-group">-->
<!--			--><?php //echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
<!---->
<!--				--><?php //echo Form::textarea('description', Input::post('description', isset($transaction) ? $transaction->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>
<!---->
<!--		</div>-->
		<div class="form-group ">
			<?php echo Form::label('Payment method', 'payment_method', array('class'=>'control-label  ')); ?> &nbsp;&nbsp;

				<?php // echo Form::input('payment_method', Input::post('payment_method', isset($transaction) ? $transaction->payment_method : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Payment method')); ?>
				<?= Form::select('payment_method', Input::post('payment_method', isset($transaction) ? $transaction->payment_method : '-'), array(
                                                                    '-' => 'Please Select ...',
                                                                    'cash' => 'Cash',
                                                                    'cheque' => 'Cheque',
                                                                    'cb' => 'Credit Card',
                                                                    'bankwire' => 'Bank Transfert',
                                                                    'ecash' => 'eCash (OM, MoMo)',
                                                                    'other' => 'Other',
                                                                ),  array('class'=>"form-control col-md-4 select2 "));?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Reference', 'reference', array('class'=>'control-label')); ?>

				<?php echo Form::input('reference', Input::post('reference', isset($transaction) ? $transaction->reference : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Reference')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>