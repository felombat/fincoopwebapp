<?php
class Controller_Jobtitle extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['jobtitles'] = Model_Jobtitle::find('all');
		$this->template->title = "Jobtitles";
		$this->template->content = View::forge('jobtitle/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('jobtitle');

		if ( ! $data['jobtitle'] = Model_Jobtitle::find($id))
		{
			Session::set_flash('error', 'Could not find jobtitle #'.$id);
			Response::redirect('jobtitle');
		}

		$this->template->title = "Jobtitle";
		$this->template->content = View::forge('jobtitle/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Jobtitle::validate('create');

			if ($val->run())
			{
				$jobtitle = Model_Jobtitle::forge(array(
					'title' => Input::post('title'),
				));

				if ($jobtitle and $jobtitle->save())
				{
					Session::set_flash('success', 'Added jobtitle #'.$jobtitle->id.'.');

					Response::redirect('jobtitle');
				}

				else
				{
					Session::set_flash('error', 'Could not save jobtitle.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Jobtitles";
		$this->template->content = View::forge('jobtitle/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('jobtitle');

		if ( ! $jobtitle = Model_Jobtitle::find($id))
		{
			Session::set_flash('error', 'Could not find jobtitle #'.$id);
			Response::redirect('jobtitle');
		}

		$val = Model_Jobtitle::validate('edit');

		if ($val->run())
		{
			$jobtitle->title = Input::post('title');

			if ($jobtitle->save())
			{
				Session::set_flash('success', 'Updated jobtitle #' . $id);

				Response::redirect('jobtitle');
			}

			else
			{
				Session::set_flash('error', 'Could not update jobtitle #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$jobtitle->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('jobtitle', $jobtitle, false);
		}

		$this->template->title = "Jobtitles";
		$this->template->content = View::forge('jobtitle/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('jobtitle');

		if ($jobtitle = Model_Jobtitle::find($id))
		{
			$jobtitle->delete();

			Session::set_flash('success', 'Deleted jobtitle #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete jobtitle #'.$id);
		}

		Response::redirect('jobtitle');

	}

}
