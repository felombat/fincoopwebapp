<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Created by', 'created_by', array('class'=>'control-label')); ?>

				<?php echo Form::input('created_by', Input::post('created_by', isset($announcement) ? $announcement->created_by : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Created by')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Read by', 'read_by', array('class'=>'control-label')); ?>

				<?php echo Form::input('read_by', Input::post('read_by', isset($announcement) ? $announcement->read_by : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Read by')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Share with', 'share_with', array('class'=>'control-label')); ?>

				<?php echo Form::input('share_with', Input::post('share_with', isset($announcement) ? $announcement->share_with : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Share with')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('title', Input::post('title', isset($announcement) ? $announcement->title : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($announcement) ? $announcement->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('File', 'file', array('class'=>'control-label')); ?>

				<?php echo Form::input('file', Input::post('file', isset($announcement) ? $announcement->file : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'File')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Start date', 'start_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('start_date', Input::post('start_date', isset($announcement) ? $announcement->start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Start date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('End date', 'end_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('end_date', Input::post('end_date', isset($announcement) ? $announcement->end_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'End date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>