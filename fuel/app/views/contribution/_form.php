<?php echo Form::open(array("class"=>"form-horizontal col-md-8")); ?>

	<fieldset>
		<div class="form-group ">
			<?php //echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('company_id', Input::post('company_id', isset($contribution) ? $contribution->company_id : '1'), array('class' => 'col-md-4 form-control', 'value'=>1, 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group col-md-6">
			<?php echo Form::label('Client', 'budget_id', array('class'=>'control-label ')); ?>

				<?php //echo Form::input('budget_id', Input::post('budget_id', isset($contribution) ? $contribution->budget_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Client')); ?>
				<?php //Form::select('budget_id', Input::post('budget_id', isset($contribution) ? $contribution->budget_id : '-'), array('class'=>"form-control") );?>
                <?php if(isset($client->id)) : ?>
                    <?= Form::select('budget_id', $client->id , Model_Client::get_dropdownlist(), array('class'=>"form-control col-md-8 select2x" , "disabled"=>"disabled") );?>
                <?php echo Form::hidden('budget_id', $client->id, array('class' => 'col-md-4 form-control', 'placeholder'=>'Client')); ?>

            <?php else : ?>
                    <?= Form::select('budget_id', Input::post('budget_id', isset($contribution) ? $contribution->budget_id : '-'), Model_Client::get_dropdownlist(), array('class'=>"form-control col-md-8 select2x") );?>
                <?php endif;?>
		</div>
		<!-- 	
		<div class="form-group">
			<?php //echo Form::label('Paid at', 'ppaid_at', array('class'=>'control-label')); ?>
				<div class='input-group date datetimepicker' id="demodatetimepicker">
				<?php //echo Form::input('ppaid_at', Input::post('ppaid_at', isset($contribution) ? $contribution->ppaid_at : ''), array('class' => 'col-md-4 form-control single-daterange ', 'placeholder'=>'Paid at')); ?>

				<span class="input-group-addon"><span class="fa fa-calendar"></span>
                    </span>
            </div>

		</div> -->
		<div class="form-group">
			<?php echo Form::label('Paid at', 'paid_at', array('class'=>'control-label')); ?>
                <div class="input-group date" id="paid_at" class="datetimepicker col-md-4" data-target-input="nearest">
<!--                    <input type="text" name="paid_at" class="form-control datetimepicker-input col-md-4" data-target="#paid_at" value="" />-->
                    <?php echo Form::input('paid_at', Input::post('paid_at', isset($contribution) ? $contribution->paid_at : ''), array('class' => 'col-md-4 form-control datetimepicker-input ', 'placeholder'=>'Paid at')); ?>

                    <div class="input-group-append" data-target="#paid_at" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($contribution) ? $contribution->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>

        <div class="form-group row">
            <label class="col-sm-8 col-form-label">Type</label>
            <div class="col-sm-8">
                <div class="form-check">
                    <label class="form-check-label">
                        <!-- <input checked="" class="form-check-input" name="type" value="credit" type="radio">-->
                    <?php echo Form::radio('type', Input::post('type', isset($contribution) ? $contribution->type : 'credit'), array('class' => 'col-md-6 form-check-input form-control', 'checked'=>'checked')); ?>
                        Versement</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <!-- <input class="form-check-input" name="type" value="debit" type="radio">-->
                    <?php echo Form::radio('type', Input::post('type', isset($contribution) ? $contribution->type : 'debit'), array('class' => 'col-md-6 form-check-input form-control')); ?>
                        Retrait</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <!-- <input class="form-check-input" name="type" value="debit" type="radio">-->
                        <?php echo Form::radio('type', Input::post('type', isset($contribution) ? $contribution->type : 'commission'), array('class' => 'col-md-6 form-check-input form-control')); ?>
                        Commission</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <!-- <input class="form-check-input" name="type" value="debit" type="radio">-->
                        <?php echo Form::radio('type', Input::post('type', isset($contribution) ? $contribution->type : 'fees'), array('class' => 'col-md-6 form-check-input form-control')); ?>
                        Frais d'inscription</label>
                </div>

            </div>
        </div>
		<!--
		<div class="form-group">
			<?php echo Form::label('Currency code', 'currency_code', array('class'=>'control-label')); ?>

				<?php //echo Form::hidden('currency_code', Input::post('currency_code', isset($contribution) ? $contribution->currency_code : ''), array('class' => 'col-md-4 form-control', 'value'=> 'XAF', 'placeholder'=>'Currency code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency rate', 'currency_rate', array('class'=>'control-label')); ?>

				<?php //echo Form::hidden('currency_rate', Input::post('currency_rate', isset($contribution) ? $contribution->currency_rate : ''), array('class' => 'col-md-4 form-control', 'value'=>1.00, 'placeholder'=>'Currency rate')); ?>

		</div> -->
		<?php echo Form::hidden('currency_code', Input::post('currency_code', isset($contribution) ? $contribution->currency_code : 'XAF'), array('class' => 'col-md-4 form-control', 'value'=> 'XAF', 'placeholder'=>'Currency code')); ?>
		<?php echo Form::hidden('currency_rate', Input::post('currency_rate', isset($contribution) ? $contribution->currency_rate : '1.00'), array('class' => 'col-md-4 form-control', 'value'=>1.00, 'placeholder'=>'Currency rate')); ?>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('description', Input::post('description', isset($contribution) ? $contribution->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group r">
			<?php echo Form::label('Payment method', 'payment_method', array('class'=>'control-label  ')); ?> &nbsp;&nbsp;

				<?php // echo Form::input('payment_method', Input::post('payment_method', isset($contribution) ? $contribution->payment_method : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Payment method')); ?>
				<?= Form::select('payment_method', Input::post('payment_method', isset($contribution) ? $contribution->payment_method : 'cash'), array(
                                                                    '-' => 'Please Select ...',
                                                                    'cash' => 'Cash',
                                                                    'cheque' => 'Cheque',
                                                                    'cb' => 'Credit Card',
                                                                    'bankwire' => 'Bank Transfert',
                                                                    'ecash' => 'eCash (OM, MoMo)',
                                                                    'other' => 'Other',
                                                                ),  array('class'=>"form-control col-md-4 select2x "));?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Reference', 'reference', array('class'=>'control-label')); ?>

				<?php echo Form::input('reference', Input::post('reference', isset($contribution) ? $contribution->reference : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Reference')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>