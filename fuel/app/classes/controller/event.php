<?php
class Controller_Event extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['events'] = Model_Event::find('all');
		$this->template->title = "Events";
		$this->template->content = View::forge('event/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('event');

		if ( ! $data['event'] = Model_Event::find($id))
		{
			Session::set_flash('error', 'Could not find event #'.$id);
			Response::redirect('event');
		}

		$this->template->title = "Event";
		$this->template->content = View::forge('event/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Event::validate('create');

			if ($val->run())
			{
				$event = Model_Event::forge(array(
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'created_by' => Input::post('created_by'),
					'company_id' => Input::post('company_id'),
					'location' => Input::post('location'),
					'labels' => Input::post('labels'),
					'share_with' => Input::post('share_with'),
					'color' => Input::post('color'),
					'start_date' => Input::post('start_date'),
					'end_date' => Input::post('end_date'),
					'start_time' => Input::post('start_time'),
					'end_time' => Input::post('end_time'),
					'recurring' => Input::post('recurring'),
					'repeat_every' => Input::post('repeat_every'),
					'no_of_cycles' => Input::post('no_of_cycles'),
					'last_start_date' => Input::post('last_start_date'),
					'repeat_type' => Input::post('repeat_type'),
					'recurring_dates' => Input::post('recurring_dates'),
				));

				if ($event and $event->save())
				{
					Session::set_flash('success', 'Added event #'.$event->id.'.');

					Response::redirect('event');
				}

				else
				{
					Session::set_flash('error', 'Could not save event.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Events";
		$this->template->content = View::forge('event/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('event');

		if ( ! $event = Model_Event::find($id))
		{
			Session::set_flash('error', 'Could not find event #'.$id);
			Response::redirect('event');
		}

		$val = Model_Event::validate('edit');

		if ($val->run())
		{
			$event->title = Input::post('title');
			$event->description = Input::post('description');
			$event->created_by = Input::post('created_by');
			$event->company_id = Input::post('company_id');
			$event->location = Input::post('location');
			$event->labels = Input::post('labels');
			$event->share_with = Input::post('share_with');
			$event->color = Input::post('color');
			$event->start_date = Input::post('start_date');
			$event->end_date = Input::post('end_date');
			$event->start_time = Input::post('start_time');
			$event->end_time = Input::post('end_time');
			$event->recurring = Input::post('recurring');
			$event->repeat_every = Input::post('repeat_every');
			$event->no_of_cycles = Input::post('no_of_cycles');
			$event->last_start_date = Input::post('last_start_date');
			$event->repeat_type = Input::post('repeat_type');
			$event->recurring_dates = Input::post('recurring_dates');

			if ($event->save())
			{
				Session::set_flash('success', 'Updated event #' . $id);

				Response::redirect('event');
			}

			else
			{
				Session::set_flash('error', 'Could not update event #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$event->title = $val->validated('title');
				$event->description = $val->validated('description');
				$event->created_by = $val->validated('created_by');
				$event->company_id = $val->validated('company_id');
				$event->location = $val->validated('location');
				$event->labels = $val->validated('labels');
				$event->share_with = $val->validated('share_with');
				$event->color = $val->validated('color');
				$event->start_date = $val->validated('start_date');
				$event->end_date = $val->validated('end_date');
				$event->start_time = $val->validated('start_time');
				$event->end_time = $val->validated('end_time');
				$event->recurring = $val->validated('recurring');
				$event->repeat_every = $val->validated('repeat_every');
				$event->no_of_cycles = $val->validated('no_of_cycles');
				$event->last_start_date = $val->validated('last_start_date');
				$event->repeat_type = $val->validated('repeat_type');
				$event->recurring_dates = $val->validated('recurring_dates');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('event', $event, false);
		}

		$this->template->title = "Events";
		$this->template->content = View::forge('event/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('event');

		if ($event = Model_Event::find($id))
		{
			$event->delete();

			Session::set_flash('success', 'Deleted event #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete event #'.$id);
		}

		Response::redirect('event');

	}

}
