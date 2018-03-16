<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($site) ? $site->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Category id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('category_id', Input::post('category_id', isset($site) ? $site->category_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Category id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($site) ? $site->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php echo Form::input('enabled', Input::post('enabled', isset($site) ? $site->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>