<?php
class Controller_Contribution extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data['contributions'] = Model_Contribution::find('all', array('related' => array('client')));
		$this->template->title = "Contributions";
		$this->template->content = View::forge('contribution/index', $data);

	}

	public function action_withdraw($client_id = 0, $type = 'debit' )
	{
		$data['contributions'] = Model_Contribution::find('all', 
			array(
				'related' => array('client'), 
				'where' => array(array('id', '=', $client_id), array('type', '=', $type	) )
				)
			);
		$this->template->title = "Contributions";
		$this->template->content = View::forge('contribution/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contribution');

		if ( ! $data['contribution'] = Model_Contribution::find($id))
		{
			Session::set_flash('error', 'Could not find contribution #'.$id);
			Response::redirect('contribution');
		}

		$this->template->title = "Contribution";
		$this->template->content = View::forge('contribution/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contribution::validate('create');

			if ($val->run())
			{
				$contribution = Model_Contribution::forge(array(
					'company_id' => Input::post('company_id'),
					'budget_id' => Input::post('budget_id'),
					'paid_at' => Input::post('paid_at'),
					'amount' => Input::post('amount'),
					'currency_code' => Input::post('currency_code'),
					'currency_rate' => Input::post('currency_rate'),
					'description' => Input::post('description'),
					'payment_method' => Input::post('payment_method'),
					'reference' => Input::post('reference'),
                    'status' => 'paid',
                    'type' => 'credit',
                    'created_by' => $this->current_user->id,
                    'category_id' => 1,

                ));

				if ($contribution and $contribution->save())
				{
					Session::set_flash('success', 'Added contribution #'.$contribution->id.'.');

					Response::redirect('contribution');
				}

				else
				{
					Session::set_flash('error', 'Could not save contribution.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Contributions";
		$this->template->content = View::forge('contribution/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contribution');

		if ( ! $contribution = Model_Contribution::find($id))
		{
			Session::set_flash('error', 'Could not find contribution #'.$id);
			Response::redirect('contribution');
		}

		$val = Model_Contribution::validate('edit');

		if ($val->run())
		{
			$contribution->company_id = Input::post('company_id');
			$contribution->budget_id = Input::post('budget_id');
			$contribution->paid_at = Input::post('paid_at');
			$contribution->amount = Input::post('amount');
			$contribution->currency_code = Input::post('currency_code');
			$contribution->currency_rate = Input::post('currency_rate');
			$contribution->description = Input::post('description');
			$contribution->payment_method = Input::post('payment_method');
			$contribution->reference = Input::post('reference');

			if ($contribution->save())
			{
				Session::set_flash('success', 'Updated contribution #' . $id);

				Response::redirect('contribution');
			}

			else
			{
				Session::set_flash('error', 'Could not update contribution #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contribution->company_id = $val->validated('company_id');
				$contribution->budget_id = $val->validated('budget_id');
				$contribution->paid_at = $val->validated('paid_at');
				$contribution->amount = $val->validated('amount');
				$contribution->currency_code = $val->validated('currency_code');
				$contribution->currency_rate = $val->validated('currency_rate');
				$contribution->description = $val->validated('description');
				$contribution->payment_method = $val->validated('payment_method');
				$contribution->reference = $val->validated('reference');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contribution', $contribution, false);
		}

		$this->template->title = "Contributions";
		$this->template->content = View::forge('contribution/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contribution');

		if ($contribution = Model_Contribution::find($id))
		{
			$contribution->delete();

			Session::set_flash('success', 'Deleted contribution #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contribution #'.$id);
		}

		Response::redirect('contribution');

	}

}
