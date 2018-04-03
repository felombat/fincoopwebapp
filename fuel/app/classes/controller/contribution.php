<?php
class Controller_Contribution extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
        if( !Auth::member(60) AND !Auth::member(70) AND !Auth::member(100)){
            Session::set_flash('error', 'Droits d\'accès insuffisant !' );
            Response::redirect_back();
        }

        $this->template->title = "Contributions";

		$data['contributions'] = Model_Contribution::find('all', array('related' => array('client')));

		$this->template->content = View::forge('contribution/index', $data);

	}

    public function action_client($client_id = null)
    {
        (is_null($client_id) OR $client_id == 0) and Response::redirect('contribution');

        $this->template->title = "Contributions Client";


            $this->template->title = "Contributions of : " . $client_id;
            $data['client'] = Model_Client::find($client_id);
            $data['contributions'] = Model_Contribution::find('all', array('related' => array('client'), 'where' => array(array('budget_id', '=', $client_id))));
            $this->template->content = View::forge('contribution/index_client', $data);



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

	public function action_create( $client_id = null )
    {
        $data = array();
        if (isset($client_id) AND $client_id > 0) {
            $client_obj = Model_Client::find($client_id);
            !isset($client_obj) AND Response::redirect('contribution/create');

            $data['client'] = $client_obj;

            $this->template->title = $data['title'] =  "Contributions of $client_obj->first_name $client_obj->last_name";
            $this->template->content = View::forge('contribution/create', $data);
        }
            if (Input::method() == 'POST') {
            $val = Model_Contribution::validate('create');

            if ($val->run()) {
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
                    'type' => Input::post('type'), //'credit',
                    'created_by' => $this->current_user->id,
                    //'category_id' => (Input::post('type') == 'credit') ? 1 : 5,

                ));
                switch (Input::post('type')){
                    case 'credit' :
                        $contribution->category_id = 1;
                        break;

                    case 'debit' :
                        $contribution->category_id = 5;
                        break;

                    case 'fees' :
                        $contribution->category_id = 4;
                        break;

                    case 'commission' :
                        $contribution->category_id = 3;
                        break;

                    default:
                        $contribution->category_id = 5;
                        break;
                }


                if ($contribution and $contribution->save()) {
                    Session::set_flash('success', 'Added contribution #' . $contribution->id . '.');
                    if(isset($client_id)){
                        Response::redirect('contribution/create/'.$client_id);
                    }else{
                        Response::redirect('contribution');
                    }

                } else {
                    Session::set_flash('error', 'Could not save contribution.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

		$this->template->title = "Contributions";
		$this->template->content = View::forge('contribution/create', $data);

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
