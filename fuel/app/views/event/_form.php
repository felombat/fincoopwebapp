<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('title', Input::post('title', isset($event) ? $event->title : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($event) ? $event->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Created by', 'created_by', array('class'=>'control-label')); ?>

				<?php echo Form::input('created_by', Input::post('created_by', isset($event) ? $event->created_by : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Created by')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Company id', 'company_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_id', Input::post('company_id', isset($event) ? $event->company_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Location', 'location', array('class'=>'control-label')); ?>

				<?php echo Form::input('location', Input::post('location', isset($event) ? $event->location : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Location')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Labels', 'labels', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('labels', Input::post('labels', isset($event) ? $event->labels : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Labels')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Share with', 'share_with', array('class'=>'control-label')); ?>

				<?php echo Form::input('share_with', Input::post('share_with', isset($event) ? $event->share_with : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Share with')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Color', 'color', array('class'=>'control-label')); ?>

				<?php echo Form::input('color', Input::post('color', isset($event) ? $event->color : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Color')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Start date', 'start_date', array('class'=>'control-label')); ?>
			<div class='input-group date' class='datetimes' data-provide="datepicker">
				<?php echo Form::input('start_date', Input::post('start_date', isset($event) ? $event->start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Start date')); ?>
				<span class="input-group-addon"><span class="fa fa-calendar"></span>
                    </span>
            </div>

		</div>
		<div class="form-group">
			<?php echo Form::label('End date', 'end_date', array('class'=>'control-label')); ?>
			<div class='input-group date' class='datetimes' data-provide="datepicker">
				<?php echo Form::input('end_date', Input::post('end_date', isset($event) ? $event->end_date : ''), array('class' => 'col-md-4 form-control ', 'placeholder'=>'End date')); ?>
				<span class="input-group-addon"><span class="fa fa-calendar"></span>
                    </span>
            </div>

		</div>
		<div class="form-group">
			<?php echo Form::label('Start time', 'start_time', array('class'=>'control-label')); ?>

				<?php echo Form::input('start_time', Input::post('start_time', isset($event) ? $event->start_time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Start time')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('End time', 'end_time', array('class'=>'control-label')); ?>

				<?php echo Form::input('end_time', Input::post('end_time', isset($event) ? $event->end_time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'End time')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Recurring', 'recurring', array('class'=>'control-label')); ?>

				<?php echo Form::input('recurring', Input::post('recurring', isset($event) ? $event->recurring : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Recurring')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Repeat every', 'repeat_every', array('class'=>'control-label')); ?>

				<?php echo Form::input('repeat_every', Input::post('repeat_every', isset($event) ? $event->repeat_every : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Repeat every')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('No of cycles', 'no_of_cycles', array('class'=>'control-label')); ?>

				<?php echo Form::input('no_of_cycles', Input::post('no_of_cycles', isset($event) ? $event->no_of_cycles : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'No of cycles')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Last start date', 'last_start_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('last_start_date', Input::post('last_start_date', isset($event) ? $event->last_start_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Last start date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Repeat type', 'repeat_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('repeat_type', Input::post('repeat_type', isset($event) ? $event->repeat_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Repeat type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Recurring dates', 'recurring_dates', array('class'=>'control-label')); ?>

				<?php echo Form::input('recurring_dates', Input::post('recurring_dates', isset($event) ? $event->recurring_dates : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Recurring dates')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>