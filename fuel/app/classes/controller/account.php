<?php
class Controller_Account extends Controller_Template
{

	public function action_index()
	{
		$data['accounts'] = Model_Account::find('all');
		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('account');

		if ( ! $data['account'] = Model_Account::find($id))
		{
			Session::set_flash('error', 'Could not find account #'.$id);
			Response::redirect('account');
		}

		$this->template->title = "Account";
		$this->template->content = View::forge('account/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Account::validate('create');

			if ($val->run())
			{
				$account = Model_Account::forge(array(
					'company_id' => Input::post('company_id'),
					'name' => Input::post('name'),
					'number' => Input::post('number'),
					'currency_code' => Input::post('currency_code'),
					'opening_balance' => Input::post('opening_balance'),
					'bank_name' => Input::post('bank_name'),
					'bank_phone' => Input::post('bank_phone'),
					'bank_address' => Input::post('bank_address'),
					'enabled' => Input::post('enabled'),
				));

				if ($account and $account->save())
				{
					Session::set_flash('success', 'Added account #'.$account->id.'.');

					Response::redirect('account');
				}

				else
				{
					Session::set_flash('error', 'Could not save account.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('account');

		if ( ! $account = Model_Account::find($id))
		{
			Session::set_flash('error', 'Could not find account #'.$id);
			Response::redirect('account');
		}

		$val = Model_Account::validate('edit');

		if ($val->run())
		{
			$account->company_id = Input::post('company_id');
			$account->name = Input::post('name');
			$account->number = Input::post('number');
			$account->currency_code = Input::post('currency_code');
			$account->opening_balance = Input::post('opening_balance');
			$account->bank_name = Input::post('bank_name');
			$account->bank_phone = Input::post('bank_phone');
			$account->bank_address = Input::post('bank_address');
			$account->enabled = Input::post('enabled');

			if ($account->save())
			{
				Session::set_flash('success', 'Updated account #' . $id);

				Response::redirect('account');
			}

			else
			{
				Session::set_flash('error', 'Could not update account #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$account->company_id = $val->validated('company_id');
				$account->name = $val->validated('name');
				$account->number = $val->validated('number');
				$account->currency_code = $val->validated('currency_code');
				$account->opening_balance = $val->validated('opening_balance');
				$account->bank_name = $val->validated('bank_name');
				$account->bank_phone = $val->validated('bank_phone');
				$account->bank_address = $val->validated('bank_address');
				$account->enabled = $val->validated('enabled');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('account', $account, false);
		}

		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('account');

		if ($account = Model_Account::find($id))
		{
			$account->delete();

			Session::set_flash('success', 'Deleted account #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete account #'.$id);
		}

		Response::redirect('account');

	}

}
