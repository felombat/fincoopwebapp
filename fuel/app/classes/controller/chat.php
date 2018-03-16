<?php
class Controller_Chat extends Controller_Admin
{

	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['chats'] = Model_Chat::find('all');
		$data['employees'] = Model_Employee::find('all');
		$this->template->title = "Chats";
		$this->template->content = View::forge('chat/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('chat');

		if ( ! $data['chat'] = Model_Chat::find($id))
		{
			Session::set_flash('error', 'Could not find chat #'.$id);
			Response::redirect('chat');
		}

		$this->template->title = "Chat";
		$this->template->content = View::forge('chat/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Chat::validate('create');

			if ($val->run())
			{
				$chat = Model_Chat::forge(array(
					'message' => Input::post('message'),
					'from_user_id' => $this->current_user->id, //Input::post('from_user_id'),
					'to_user_id' => 0, //Input::post('to_user_id'),
					'status' => 'unread', //Input::post('status'),
					'chat_message_id' => 0, Input::post('chat_message_id'),
					'private' => 0, //Input::post('private'),
				));

				if ($chat and $chat->save())
				{
					Session::set_flash('success', 'Added chat #'.$chat->id.'.');

					Response::redirect('chat');
				}

				else
				{
					Session::set_flash('error', 'Could not save chat.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Chats";
		$this->template->content = View::forge('chat/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('chat');

		if ( ! $chat = Model_Chat::find($id))
		{
			Session::set_flash('error', 'Could not find chat #'.$id);
			Response::redirect('chat');
		}

		$val = Model_Chat::validate('edit');

		if ($val->run())
		{
			$chat->message = Input::post('message');
			$chat->from_user_id = Input::post('from_user_id');
			$chat->to_user_id = Input::post('to_user_id');
			$chat->status = Input::post('status');
			$chat->chat_message_id = Input::post('chat_message_id');
			$chat->private = Input::post('private');

			if ($chat->save())
			{
				Session::set_flash('success', 'Updated chat #' . $id);

				Response::redirect('chat');
			}

			else
			{
				Session::set_flash('error', 'Could not update chat #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$chat->message = $val->validated('message');
				$chat->from_user_id = $val->validated('from_user_id');
				$chat->to_user_id = $val->validated('to_user_id');
				$chat->status = $val->validated('status');
				$chat->chat_message_id = $val->validated('chat_message_id');
				$chat->private = $val->validated('private');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('chat', $chat, false);
		}

		$this->template->title = "Chats";
		$this->template->content = View::forge('chat/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('chat');

		if ($chat = Model_Chat::find($id))
		{
			$chat->delete();

			Session::set_flash('success', 'Deleted chat #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete chat #'.$id);
		}

		Response::redirect('chat');

	}

}
