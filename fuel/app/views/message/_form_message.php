

<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<?php echo Form::hidden('form_user_id', $this->current_user->id, array('class' => 'col-sm-10 form-control', 'placeholder'=>'Form User Id')); ?>
<?php echo Form::hidden('status', 'unread', array('class' => 'col-sm-10 form-control', 'placeholder'=>'Status')); ?>

		<div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                </div>
                <h2>
                    Compse mail
                </h2>
            </div>
                

                	<div class="mail-box">


                <div class="mail-body">

                    <form class="form-horizontal" method="get">
                         
						<div class="form-group">
							<?php  echo Form::label('To: ', 'to_user_id', array('class'=>'col-sm-2 control-label')); ?>

								<?php //echo Form::input('to_user_id', Input::post('to_user_id', isset($message) ? $message->to_user_id : ''), array('class' => 'col-sm-10 form-control', 'placeholder'=>'To user id')); ?>

								<?php echo Form::select('to_user_id', '-', Model_Employee::get_dropdownlist([$this->current_user->id]), array('class' => 'col-sm-10 form-control', 'placeholder'=>'Reciepiend')); ?>

						</div>
                         
                        <div class="form-group">
							<?php  echo Form::label('Subject', 'subject', array('class'=>' col-sm-2 control-label')); ?>

								<?php echo Form::input('subject', Input::post('subject', isset($message) ? $message->subject : ''), array('class' => 'col-sm-10 form-control', 'placeholder'=>'Subject')); ?>

						</div>
                        </form>

                </div>

                    <div class="mail-text h-200">

                    <div class="form-group">
					<?php echo Form::label('Message', 'message', array('class'=>'col-sm-2 control-label')); ?>

						<?php echo Form::textarea('message', Input::post('message', isset($message) ? $message->message : ''), array('class' => 'summernote col-sm-10 form-control', 'placeholder'=>'<h3>Hello Mate! </h3>',  'style'=>"display: none;")); ?>

				</div>

                        <div class="summernote**" style="display: none;">
                            <h3>Hello Jonathan! </h3>
                            dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                            <br>
                            <br>

                        </div> 
						<div class="clearfix"></div>
                    </div>
                    <div class="mail-body text-right tooltip-demo">
                        
                        <?php echo Form::submit('submit', '<i class="fa fa-reply"></i> Send', array('class' => 'btn btn-sm btn-primary', 'data-toggle'=>"tooltip",  'data-placement'=>"top", 'title'=>"Send email")); ?>
                       
                        <?php //echo Form::reset('reset', '<i class="fa fa-times"></i> Discard', array('class' => 'btn btn-sm btn-primary', 'data-toggle'=>"tooltip",  'data-placement'=>"top", 'title'=>"Discard email")); ?>
                        <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    </div>
                    <div class="clearfix"></div>



                </div>
            </div>
<?php echo Form::close(); ?>