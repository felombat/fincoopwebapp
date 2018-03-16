<?php
class Controller_Message extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['messages'] = Model_Message::find('all' ,  array('where' => array('to_user_id'=> $this->current_user->id ) ));
		$this->template->title = "Messages";
		$this->template->content = View::forge('message/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('message');

		if ( ! $data['message'] = Model_Message::find($id))
		{
			Session::set_flash('error', 'Could not find message #'.$id);
			Response::redirect('message');
		}

		// get the list of named parameters
		// $params = Request::active();
		// Debug::dump($params->method_params[0]);
		
		$this->template->title = "Message";
		$this->template->content = View::forge('message/view', $data)->auto_filter(false);

	}

	public function action_create()
	{
		  $data['message'] = 'hello Francky ';
		  $data['name'] = 'Francky ';
		  $data['data'] = 60;
		  $pusher = $this->push_service->trigger('lhcm-channel', 'prodreport', $data);

		if (Input::method() == 'POST')
		{
			$val = Model_Message::validate('create');

			if ($val->run())
			{
				$message = Model_Message::forge(array(
					'subject' => Input::post('subject'),
					'message' => Input::post('message'),
					'form_user_id' => $this->current_user->id, //Input::post('form_user_id'),
					'to_user_id' => Input::post('to_user_id'),
					'status' => 'unread', // Input::post('status'),
					'message_id' => 0, // Input::post('message_id'),
					'files' => Input::post('files'),
					'deleted_by_users' => Input::post('deleted_by_users'),
				));

				if ($message and $message->save())
				{
					$data['message']=  $message->subject .'<br> Added message #'.$message->id.'.';
					$data['data'] = $message->id;
					$pusher = $this->push_service->trigger('lhcm-channel', 'prodreport', $data);
					Session::set_flash('success', 'Added message #'.$message->id.'.');

		  			Session::set_flash('info', $data);
		  			Cookie::set('data_message', $message->subject , 60 * 5 );

					Response::redirect('message');
				}

				else
				{
					Session::set_flash('error', 'Could not save message.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('message/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('message');

		if ( ! $message = Model_Message::find($id))
		{
			Session::set_flash('error', 'Could not find message #'.$id);
			Response::redirect('message');
		}

		$val = Model_Message::validate('edit');

		if ($val->run())
		{
			$message->subject = Input::post('subject');
			$message->message = Input::post('message');
			$message->form_user_id = Input::post('form_user_id');
			$message->to_user_id = Input::post('to_user_id');
			$message->status = Input::post('status');
			$message->message_id = Input::post('message_id');
			$message->files = Input::post('files');
			$message->deleted_by_users = Input::post('deleted_by_users');

			if ($message->save())
			{
				Session::set_flash('success', 'Updated message #' . $id);

				Response::redirect('message');
			}

			else
			{
				Session::set_flash('error', 'Could not update message #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$message->subject = $val->validated('subject');
				$message->message = $val->validated('message');
				$message->form_user_id = $val->validated('form_user_id');
				$message->to_user_id = $val->validated('to_user_id');
				$message->status = $val->validated('status');
				$message->message_id = $val->validated('message_id');
				$message->files = $val->validated('files');
				$message->deleted_by_users = $val->validated('deleted_by_users');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('message', $message, false);
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('message/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('message');

		if ($message = Model_Message::find($id))
		{
			$message->delete();

			Session::set_flash('success', 'Deleted message #'.$id . " by ".$this->current_user->username);
			$data['message']=  'Deleted message #'.$id . "by ". json_encode($this->current_user->username) ;
			$data['data'] = $id;
			$pusher = $this->push_service->trigger('lhcm-channel', 'prodreport', $data);
		}

		else
		{
			Session::set_flash('error', 'Could not delete message #'.$id);
		}

		Response::redirect('message');

	}

}
