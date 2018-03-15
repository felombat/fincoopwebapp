<?php

//require_once APPPATH.'vendor/api.php';

/*$api = new PHP_CRUD_API(array(
			'dbengine'=>'MySQL',
			'hostname'=>'localhost',
			'username'=>'root',
			'password'=>'',
			'database'=>'lhbureportdb',
			'charset'=>'utf8'
		));
var_dump($api);die();
		$api->executeCommand();*/

class Controller_Apiv1 extends Controller_Rest
{
	public $format = 'json';

	public function action_index()
	{
		 /*$api = new PHP_CRUD_API(array(
			'dbengine'=>'MySQL',
			'hostname'=>'localhost',
			'username'=>'root',
			'password'=>'',
			'database'=>'lhbureportdb',
			'charset'=>'utf8'
		)); 
		//$api->executeCommand();*/
		//return $this->response( json_encode([])  ) ;

		// create a Request_Curl object
		$curl = Request::forge(Uri::base().'/api.php/todos', 'curl');
		//$curl = Request::forge('http://localhost/LHprodreport/public/api.php/todos', 'curl');
		// pass an authentication token to the backend server
		$curl->set_header('auth-token', 'WV4YaeV8QeWVVVOE');
		$curl->set_header('secret', 'WV4YaeV8QeWVVVOE');

		//$curl->set_mime_type('json');

		//$curl->set_auto_format(true);
		// assume some parameters and options were set, and execute
		$curl->execute();
		// fetch the resulting Response object
		$result = $curl->response();
		header("Content-Type: application/json");
		echo $dump =  ($result->body) ;  exit();

		$this->response->status =  200 ;

		 return $this->response(   ( $result->body )   )  ;

 


		 
	}

	public function get_contribution_by_month(){
		$sql = "SELECT  `company_id`,`budget_id`,`paid_at`, MONTH(`paid_at`) as month ,SUM(`amount`) as total_month FROM `contributions`   GROUP by month ORDER by month asc";

		$query = DB::query($sql);

		

		$results = $query->execute();

		//var_dump($results);
		$months = [1,2,3,4,5,6] ; 
		$data = array();
		foreach ($months as $key => $item) {
				if(isset($results[$item-1]) AND $results[$item-1]['month'] == $item){
					$data[$item] = $results[$item-1]['total_month'];
					$data_chart[] = (float)$results[$item-1]['total_month'];
				}else{
					$data[$item] = 0;
					$data_chart[] = 0;
				}			 
			
		}
		//$results['data'] = $data;
		$obj = new StdClass();
		$obj->results = $results;
		$obj->data = $data;
		$obj->data_chart = $data_chart;


		return $this->response( $obj);
	}

}
