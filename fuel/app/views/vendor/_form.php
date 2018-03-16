<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($vendor) ? $vendor->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($vendor) ? $vendor->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone', Input::post('phone', isset($vendor) ? $vendor->phone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($vendor) ? $vendor->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Website', 'website', array('class'=>'control-label')); ?>

				<?php echo Form::input('website', Input::post('website', isset($vendor) ? $vendor->website : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Website')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($vendor) ? $vendor->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php echo Form::input('enabled', Input::post('enabled', isset($vendor) ? $vendor->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>