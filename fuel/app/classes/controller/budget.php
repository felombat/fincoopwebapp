<?php
class Controller_Budget extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data['budgets'] = Model_Budget::find('all');
		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ( ! $data['budget'] = Model_Budget::find($id))
		{
			Session::set_flash('error', 'Could not find budget #'.$id);
			Response::redirect('budget');
		}

		$this->template->title = "Budget";
		$this->template->content = View::forge('budget/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Budget::validate('create');

			if ($val->run())
			{
				$budget = Model_Budget::forge(array(
					'company_id' => Input::post('company_id'),
					'name' => Input::post('name'),
					'category_id' => Input::post('category_id'),
					'enabled' => Input::post('enabled'),
				));

				if ($budget and $budget->save())
				{
					Session::set_flash('success', 'Added budget #'.$budget->id.'.');

					Response::redirect('budget');
				}

				else
				{
					Session::set_flash('error', 'Could not save budget.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ( ! $budget = Model_Budget::find($id))
		{
			Session::set_flash('error', 'Could not find budget #'.$id);
			Response::redirect('budget');
		}

		$val = Model_Budget::validate('edit');

		if ($val->run())
		{
			$budget->company_id = Input::post('company_id');
			$budget->name = Input::post('name');
			$budget->category_id = Input::post('category_id');
			$budget->enabled = Input::post('enabled');

			if ($budget->save())
			{
				Session::set_flash('success', 'Updated budget #' . $id);

				Response::redirect('budget');
			}

			else
			{
				Session::set_flash('error', 'Could not update budget #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$budget->company_id = $val->validated('company_id');
				$budget->name = $val->validated('name');
				$budget->category_id = $val->validated('category_id');
				$budget->enabled = $val->validated('enabled');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('budget', $budget, false);
		}

		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ($budget = Model_Budget::find($id))
		{
			$budget->delete();

			Session::set_flash('success', 'Deleted budget #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete budget #'.$id);
		}

		Response::redirect('budget');

	}

}
