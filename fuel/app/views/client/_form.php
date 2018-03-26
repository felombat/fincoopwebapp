<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<!-- <div class="form-group">
			<?php //echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php //echo Form::input('company_id', Input::post('company_id', isset($client) ? $client->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div> -->
        <div class="form-group">
            <?php echo Form::label('Nom*', 'last_name', array('class'=>'control-label')); ?>

            <?php echo Form::input('last_name', Input::post('last_name', isset($client) ? $client->last_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>

        </div>
		<div class="form-group">
			<?php echo Form::label('Prénom(s)*', 'first_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('first_name', Input::post('first_name', isset($client) ? $client->first_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname')); ?>

		</div>
		<!--<div class="form-group">-->
			 

				<?php echo Form::hidden('jobtitle_id', Input::post('jobtitle_id', isset($client) ? $client->jobtitle_id : ''), array('class' => 'col-md-4 form-control', 'value'=>'6')); ?>

		<!--</div>-->
        <!--<div class="form-group">-->
			<?php //echo Form::label('Currency code', 'currency_code', array('class'=>'control-label')); ?>

				<?php //echo Form::input('currency_code', Input::post('currency_code', isset($client) ? $client->currency_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Currency code')); ?>

            <!--</div>-->
		<div class="form-group">
			<?php echo Form::label('Mobile', 'tel', array('class'=>'control-label')); ?>

				<?php echo Form::input('tel', Input::post('tel', isset($client) ? $client->tel : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mobile')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email*', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($client) ? $client->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Autres', 'notes', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('notes', Input::post('notes', isset($client) ? $client->notes : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Autres info')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Address*', 'address1', array('class'=>'control-label')); ?>

				<?php echo Form::input('address1', Input::post('address1', isset($client) ? $client->address1 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

		</div>
		<!--<div class="form-group">
			<?php //echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php // echo Form::input('enabled', Input::post('enabled', isset($client) ? $client->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>-->
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>