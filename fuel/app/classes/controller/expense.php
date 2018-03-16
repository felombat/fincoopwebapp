<?php
class Controller_Expense extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['expenses'] = Model_Expense::find('all');
		$this->template->title = "Expenses";
		$this->template->content = View::forge('expense/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('expense');

		if ( ! $data['expense'] = Model_Expense::find($id))
		{
			Session::set_flash('error', 'Could not find expense #'.$id);
			Response::redirect('expense');
		}

		$this->template->title = "Expense";
		$this->template->content = View::forge('expense/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Expense::validate('create');

			if ($val->run())
			{
				$expense = Model_Expense::forge(array(
					'company_id' => Input::post('company_id'),
					'account_id' => Input::post('account_id'),
					'vendor_id' => Input::post('vendor_id'),
					'paid_at' => Input::post('paid_at'),
					'amount' => Input::post('amount'),
					'currency_code' => Input::post('currency_code'),
					'currency_rate' => Input::post('currency_rate'),
					'reference' => Input::post('reference'),
					'description' => Input::post('description'),
					'payment_method' => Input::post('payment_method'),
				));

				if ($expense and $expense->save())
				{
					Session::set_flash('success', 'Added expense #'.$expense->id.'.');

					Response::redirect('expense');
				}

				else
				{
					Session::set_flash('error', 'Could not save expense.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Expenses";
		$this->template->content = View::forge('expense/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('expense');

		if ( ! $expense = Model_Expense::find($id))
		{
			Session::set_flash('error', 'Could not find expense #'.$id);
			Response::redirect('expense');
		}

		$val = Model_Expense::validate('edit');

		if ($val->run())
		{
			$expense->company_id = Input::post('company_id');
			$expense->account_id = Input::post('account_id');
			$expense->paid_at = Input::post('paid_at');
			$expense->amount = Input::post('amount');
			$expense->currency_code = Input::post('currency_code');
			$expense->currency_rate = Input::post('currency_rate');
			$expense->reference = Input::post('reference');
			$expense->payment_method = Input::post('payment_method');

			if ($expense->save())
			{
				Session::set_flash('success', 'Updated expense #' . $id);

				Response::redirect('expense');
			}

			else
			{
				Session::set_flash('error', 'Could not update expense #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$expense->company_id = $val->validated('company_id');
				$expense->account_id = $val->validated('account_id');
				$expense->paid_at = $val->validated('paid_at');
				$expense->amount = $val->validated('amount');
				$expense->currency_code = $val->validated('currency_code');
				$expense->currency_rate = $val->validated('currency_rate');
				$expense->reference = $val->validated('reference');
				$expense->payment_method = $val->validated('payment_method');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('expense', $expense, false);
		}

		$this->template->title = "Expenses";
		$this->template->content = View::forge('expense/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('expense');

		if ($expense = Model_Expense::find($id))
		{
			$expense->delete();

			Session::set_flash('success', 'Deleted expense #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete expense #'.$id);
		}

		Response::redirect('expense');

	}

}
