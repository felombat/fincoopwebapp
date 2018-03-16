<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Subject', 'subject', array('class'=>'control-label')); ?>

				<?php echo Form::input('subject', Input::post('subject', isset($message) ? $message->subject : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Subject')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::input('message', Input::post('message', isset($message) ? $message->message : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Form user id', 'form_user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('form_user_id', Input::post('form_user_id', isset($message) ? $message->form_user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Form user id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('To user id', 'to_user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('to_user_id', Input::post('to_user_id', isset($message) ? $message->to_user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'To user id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($message) ? $message->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Message id', 'message_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('message_id', Input::post('message_id', isset($message) ? $message->message_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Message id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Files', 'files', array('class'=>'control-label')); ?>

				<?php echo Form::input('files', Input::post('files', isset($message) ? $message->files : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Files')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deleted by users', 'deleted_by_users', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('deleted_by_users', Input::post('deleted_by_users', isset($message) ? $message->deleted_by_users : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Deleted by users')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>