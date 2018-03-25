<?php
class Controller_Transaction extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data['transactions'] = Model_Transaction::find('all', array('related' => array('from_account', 'to_account')));
		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $data['transaction'] = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transaction::validate('create');

			if ($val->run())
			{
				$transaction = Model_Transaction::forge(array(
					'company_id' => Input::post('company_id'),
					'budget_id' => Input::post('budget_id'),
					'paid_at' => Input::post('paid_at'),
					'amount' => Input::post('amount'),
					'currency_code' => Input::post('currency_code'),
					'currency_rate' => Input::post('currency_rate'),
					'description' => Input::post('description'),
					'payment_method' => Input::post('payment_method'),
					'reference' => Input::post('reference'),
				));

				if ($transaction and $transaction->save())
				{
					Session::set_flash('success', 'Added transaction #'.$transaction->id.'.');

					Response::redirect('transaction');
				}

				else
				{
					Session::set_flash('error', 'Could not save transaction.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $transaction = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$val = Model_Transaction::validate('edit');

		if ($val->run())
		{
			$transaction->company_id = Input::post('company_id');
			$transaction->budget_id = Input::post('budget_id');
			$transaction->paid_at = Input::post('paid_at');
			$transaction->amount = Input::post('amount');
			$transaction->currency_code = Input::post('currency_code');
			$transaction->currency_rate = Input::post('currency_rate');
			$transaction->description = Input::post('description');
			$transaction->payment_method = Input::post('payment_method');
			$transaction->reference = Input::post('reference');

			if ($transaction->save())
			{
				Session::set_flash('success', 'Updated transaction #' . $id);

				Response::redirect('transaction');
			}

			else
			{
				Session::set_flash('error', 'Could not update transaction #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$transaction->company_id = $val->validated('company_id');
				$transaction->budget_id = $val->validated('budget_id');
				$transaction->paid_at = $val->validated('paid_at');
				$transaction->amount = $val->validated('amount');
				$transaction->currency_code = $val->validated('currency_code');
				$transaction->currency_rate = $val->validated('currency_rate');
				$transaction->description = $val->validated('description');
				$transaction->payment_method = $val->validated('payment_method');
				$transaction->reference = $val->validated('reference');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('transaction', $transaction, false);
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ($transaction = Model_Transaction::find($id))
		{
			$transaction->delete();

			Session::set_flash('success', 'Deleted transaction #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete transaction #'.$id);
		}

		Response::redirect('transaction');

	}

}
