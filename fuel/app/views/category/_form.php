<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($category) ? $category->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($category) ? $category->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('type', Input::post('type', isset($category) ? $category->type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Color', 'color', array('class'=>'control-label')); ?>

				<?php echo Form::input('color', Input::post('color', isset($category) ? $category->color : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Color')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enabled', 'enabled', array('class'=>'control-label')); ?>

				<?php echo Form::input('enabled', Input::post('enabled', isset($category) ? $category->enabled : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enabled')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>