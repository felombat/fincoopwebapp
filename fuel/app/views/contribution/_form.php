<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($contribution) ? $contribution->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Budget id', 'budget_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('budget_id', Input::post('budget_id', isset($contribution) ? $contribution->budget_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Budget id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Paid at', 'paid_at', array('class'=>'control-label')); ?>
				<div class='input-group date datetimepicker' id="demodatetimepicker">
				<?php echo Form::input('paid_at', Input::post('paid_at', isset($contribution) ? $contribution->paid_at : ''), array('class' => 'col-md-4 form-control ', 'placeholder'=>'Paid at')); ?>
				<span class="input-group-addon"><span class="fa fa-calendar"></span>
                    </span>
            </div>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($contribution) ? $contribution->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency code', 'currency_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('currency_code', Input::post('currency_code', isset($contribution) ? $contribution->currency_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Currency code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency rate', 'currency_rate', array('class'=>'control-label')); ?>

				<?php echo Form::input('currency_rate', Input::post('currency_rate', isset($contribution) ? $contribution->currency_rate : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Currency rate')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('description', Input::post('description', isset($contribution) ? $contribution->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Payment method', 'payment_method', array('class'=>'control-label')); ?>

				<?php echo Form::input('payment_method', Input::post('payment_method', isset($contribution) ? $contribution->payment_method : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Payment method')); ?>

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