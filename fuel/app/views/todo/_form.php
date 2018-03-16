<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Created by', 'created_by', array('class'=>'control-label')); ?>

				<?php echo Form::input('created_by', Input::post('created_by', isset($todo) ? $todo->created_by : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Created by')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('title', Input::post('title', isset($todo) ? $todo->title : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($todo) ? $todo->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Labels', 'labels', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('labels', Input::post('labels', isset($todo) ? $todo->labels : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Labels')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($todo) ? $todo->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Start date', 'start_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('start_date', Input::post('start_date', isset($todo) ? $todo->start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Start date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>