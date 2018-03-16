<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Domain', 'domain', array('class'=>'control-label')); ?>

				<?php echo Form::input('domain', Input::post('domain', isset($company) ? $company->domain : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Domain')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($company) ? $company->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php echo Form::input('enabled', Input::post('enabled', isset($company) ? $company->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>