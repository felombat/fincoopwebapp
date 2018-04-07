<?php

class Controller_Dashboard extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{

        $this->data['accounts'] = Model_Account::find('all',
            [
                'where' =>  [
                    ['company_id' => 1] // $this->employee_user->company_id
                ],
                'order_by'=> ["name" => "asc"]
            ]);

        $this->data['contributions'] = Model_Contribution::find('all',
            [
                'where' =>  [
                    ['company_id' => 1] // $this->employee_user->company_id
                ],
                'order_by'=> ["paid_at" => "desc", "created_at" => "desc"]
            ]);

		$data["subnav"] = array('index'=> 'active' );
        $data['contributions'] = Model_Contribution::find('all',
            [
                //["related" => ['category']],
                'where' =>  [
                    ['company_id' => 1] // $this->employee_user->company_id
                ],
                'order_by'=> ["paid_at" => "desc", "created_at" => "desc"],
                'limit' => 8,
            ]);

        $this->template->title = 'Dashboard &raquo; Index';
		$this->template->content = View::forge('dashboard/index', $data);
	}

	public function action_report()
	{
		$data["subnav"] = array('report'=> 'active' );
		$this->template->title = 'Dashboard &raquo; Report';
		$this->template->content = View::forge('dashboard/report', $data);
	}

    public function action_commissions($month_num = 1)
    {
        //$month_num = (isset(Input::get('mocomm')) )  ? Input::get('mocomm') : date('m', time()) ;

        $data["subnav"] = array('report'=> 'active' );
        $this->template->title = 'Commission &raquo; Report';
        $this->template->content = View::forge('dashboard/report', $data);
    }

}
