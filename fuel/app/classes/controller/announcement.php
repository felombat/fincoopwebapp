<?php
class Controller_Announcement extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['announcements'] = Model_Announcement::find('all');
		$this->template->title = "Announcements";
		$this->template->content = View::forge('announcement/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('announcement');

		if ( ! $data['announcement'] = Model_Announcement::find($id))
		{
			Session::set_flash('error', 'Could not find announcement #'.$id);
			Response::redirect('announcement');
		}

		$this->template->title = "Announcement";
		$this->template->content = View::forge('announcement/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Announcement::validate('create');

			if ($val->run())
			{
				$announcement = Model_Announcement::forge(array(
					'created_by' => Input::post('created_by'),
					'read_by' => Input::post('read_by'),
					'share_with' => Input::post('share_with'),
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'file' => Input::post('file'),
					'start_date' => Input::post('start_date'),
					'end_date' => Input::post('end_date'),
				));

				if ($announcement and $announcement->save())
				{
					Session::set_flash('success', 'Added announcement #'.$announcement->id.'.');

					Response::redirect('announcement');
				}

				else
				{
					Session::set_flash('error', 'Could not save announcement.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Announcements";
		$this->template->content = View::forge('announcement/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('announcement');

		if ( ! $announcement = Model_Announcement::find($id))
		{
			Session::set_flash('error', 'Could not find announcement #'.$id);
			Response::redirect('announcement');
		}

		$val = Model_Announcement::validate('edit');

		if ($val->run())
		{
			$announcement->created_by = Input::post('created_by');
			$announcement->read_by = Input::post('read_by');
			$announcement->share_with = Input::post('share_with');
			$announcement->title = Input::post('title');
			$announcement->description = Input::post('description');
			$announcement->file = Input::post('file');
			$announcement->start_date = Input::post('start_date');
			$announcement->end_date = Input::post('end_date');

			if ($announcement->save())
			{
				Session::set_flash('success', 'Updated announcement #' . $id);

				Response::redirect('announcement');
			}

			else
			{
				Session::set_flash('error', 'Could not update announcement #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$announcement->created_by = $val->validated('created_by');
				$announcement->read_by = $val->validated('read_by');
				$announcement->share_with = $val->validated('share_with');
				$announcement->title = $val->validated('title');
				$announcement->description = $val->validated('description');
				$announcement->file = $val->validated('file');
				$announcement->start_date = $val->validated('start_date');
				$announcement->end_date = $val->validated('end_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('announcement', $announcement, false);
		}

		$this->template->title = "Announcements";
		$this->template->content = View::forge('announcement/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('announcement');

		if ($announcement = Model_Announcement::find($id))
		{
			$announcement->delete();

			Session::set_flash('success', 'Deleted announcement #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete announcement #'.$id);
		}

		Response::redirect('announcement');

	}

}
