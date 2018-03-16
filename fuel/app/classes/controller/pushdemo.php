<?php

class Controller_Pushdemo extends Controller_Base
{

	public $template = "_layout/inspinia";

	public function action_index()
	{

		

		  //Debug::dump($pusher);

		  $data['message'] = 'hello Francky ';
		  $data['name'] = 'Francky ';
		  $data['data'] = 60;
		  $pusher = $this->push_service->trigger('lhcm-channel', 'prodreport', $data);

		   //Debug::dump($this->push_service);


		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Pushdemo &raquo; Index';
		$this->template->content = View::forge('pushdemo/index', $data);
	}

	public function action_demo()
	{
		 $data['message'] = 'hello Francky ';
		  $data['name'] = 'Francky ';
		  $random1 = rand(5,100);
		  $random2 = rand(5,100);

		  $data['data1'] = $random1 ;
		  $data['data2'] = $random2 ;
		  $pusher = $this->push_service->trigger('lhcm-channel', 'prodreport', $data);

		  Session::set_flash('info', $data);
		  //Session::set('info', $data);
		  //Session::keep_flash('info');

		$data["subnav"] = array('demo'=> 'active' );
		$this->template->title = 'Pushdemo &raquo; Demo';
		$this->template->content = View::forge('pushdemo/demo', $data);
	}

}
