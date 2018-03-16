<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($account) ? $account->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($account) ? $account->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Number', 'number', array('class'=>'control-label')); ?>

				<?php echo Form::input('number', Input::post('number', isset($account) ? $account->number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency code', 'currency_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('currency_code', Input::post('currency_code', isset($account) ? $account->currency_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Currency code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Opening balance', 'opening_balance', array('class'=>'control-label')); ?>

				<?php echo Form::input('opening_balance', Input::post('opening_balance', isset($account) ? $account->opening_balance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Opening balance')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank name', 'bank_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_name', Input::post('bank_name', isset($account) ? $account->bank_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank phone', 'bank_phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_phone', Input::post('bank_phone', isset($account) ? $account->bank_phone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank phone')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank address', 'bank_address', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_address', Input::post('bank_address', isset($account) ? $account->bank_address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank address')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php echo Form::input('enabled', Input::post('enabled', isset($account) ? $account->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>