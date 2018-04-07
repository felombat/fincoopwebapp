<?php
namespace Fuel\Tasks;

class Seeddata
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seeddata
	 *
	 * @return string
	 */
	public function run($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning DEFAULT task [Seeddata:Run]";
		echo "\nAdd f.elombat::Dare2Impress";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/

		  // Adds the page, using ORM Model defined for the project:
        
		 $auth = \Auth::instance();
        try {
            
            $user = \Model_User::forge(array(
                'username' => 'f.elombat',
                'password' => 'Dare2Impress',
                'email' => 'f.elombat@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                	'fullname' => 'Franck Elombat',
                	'jobtitle' => 'CTO'
                	),

            ));
           

            $user_data = array(
                'username' => 'f.elombat',
                'password' => 'Dare2Impress',
                'email' => 'f.elombat@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                	'fullname' => 'Franck Elombat',
                	'jobtitle' => 'CTO'
                	),
            	);

             $user_data = array(
             	'username' => 'f.elombat',
                'password' => 'Dare2Impress',
                'email' => 'f.elombat@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                	'fullname' => 'Franck Elombat',
                	'jobtitle' => 'CTO'
                	),
            	);




            $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']); //$user->save();

             $employee = \Model_Employee::forge(array(
				'first_name' => "Franck",
				'last_name' => 'Elombat',
				'user_id' => $last_id,
				'role_id' => 1,
				'jobtile_id' => 1,
				'company_id' => 1,
				'address1' => 'Rue des Paves, Douala',
				'address2' => 'LIT ',
				'notes' => ' - ',
				'tel' => '+237 6 931 279 82',
				'email' => 'f.elombat@gmail.com',
				'avatar_file' => 'profile_franck.png',
			));

			 $employee->save();

            // Prints this message on terminal
            echo '\n\r'  . $user->username . ' : '  . $last_id;
            echo '\n\r' .  "New employee: ".$employee->first_name . "#: " . $employee->last_name  ; 

        } catch (\Exception $e) {
            
            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving the home page:";
            echo "\n" . $e->getMessage(). "\n";
        }

	}



	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seeddata:adminusers "arguments"
	 *
	 * @return string
	 */
	public function admins($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Seeddata:Adminusers]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
		 $auth = \Auth::instance();
		 if(!empty($args)){

		 	try { 

				 $user = \Model_User::forge(array(
		                'username' => $args,
		                'password' => 'Aseelec2018',
		                'email' => $args.'@aseelec.org',
		                'group' => 10,
		                'profile_fields' => array(
		                	'fullname' => $args,
		                	'jobtitle' => '-'
		                	),

		            ));

		            $user_data = array('username' => $args,'password' => 'Aseelec2018','email' => $args.'@aseelec.org','group' => 70,'profile_fields' => array('fullname' => '-','jobtitle' => '-'),  	);


		            $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']); //$user->save();

		            $employee = \Model_Employee::forge(array(
						'first_name' => "-",
						'last_name' => $args,
						'user_id' => $last_id,
						'role_id' => 1,
						'jobtile_id' => 1,
						'company_id' => 1,
						'address1' => 'Rue des Paves, Douala',
						'address2' => 'LIT ',
						'notes' => ' - ',
						'tel' => '+237 x xxx xxx xx',
						'email' => $args.'@aseelec.org',
						'avatar_file' => 'avatar.jpg',
					));

					 $employee->save(); 
		            // Prints this message on terminal
		            echo "\n". $user->username ."#: " . $last_id;
		        } catch (\Exception $e) {
		            
		            // In case of error, prints the message on terminal,
		            // You can implement any error handling you need
		            echo "\nError saving Default admin User:";
		            echo "\n" . $e->getMessage(). "\n";
		        }

		 }else{
		 	//throw Exception e; 
		 	echo "\nError saving admin User:";
		 	exit(1);
		 }

        
	}

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seeddata:employees "arguments"
	 *
	 * @return string
	 */
	public function employees($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Seeddata:Employees]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/

        $auth = \Auth::instance();
        try {

            /*$user = \Model_User::forge(array(
                'username' => 'f.elombat',
                'password' => 'Dare2Impress',
                'email' => 'f.elombat@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                    'fullname' => 'Franck Elombat',
                    'jobtitle' => 'CTO'
                ),

            ));*/




            $user_data = array(
                'username' => 'm.mepouli',
                'password' => 'Astrio@2018',
                'email' => 'm.mepouli@astrio.net',
                'group' => 60,
                'profile_fields' => array(
                    'fullname' => 'Mireille Mepouli',
                    'jobtitle' => 'ASR'
                ),
            );




            $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']);
            //$user->save();

            $employee = \Model_Employee::forge(array(
                'first_name' => "Mireille",
                'last_name' => 'Mepouli',
                'user_id' => $last_id,
                'role_id' => 5,
                'jobtile_id' => 3,
                'company_id' => 1,
                'address1' => 'Mobile BonaKoumouang, Douala',
                'address2' => 'LIT ',
                'notes' => ' - ',
                'tel' => '+237 6 000 000 00',
                'email' => 'm.mepouli@astrio.net',
                'avatar_file' => ' ',
            ));

            $employee->save();

            // Prints this message on terminal
            echo '\n\r'  . $user->username . ' : '  . $last_id;
            echo '\n\r' .  "New employee: ".$employee->first_name . "#: " . $employee->last_name  ;

        } catch (\Exception $e) {

            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving the object " . get_class($user);
            echo "\nError saving the object " . get_class($employee);
            echo "\n" . $e->getMessage(). "\n";
        }
	}

    /**
     * This method gets ran when a valid method name is not used in the command.
     *
     * Usage (from command line):
     *
     * php oil r seeddata:employees "arguments"
     *
     * @return string
     */
    public function reviewers($args = NULL)
    {
        echo "\n===========================================";
        echo "\nRunning task [Seeddata:Reviewers]";
        echo "\n-------------------------------------------\n\n";

        /***************************
        Put in TASK DETAILS HERE
         **************************/

        $auth = \Auth::instance();
        try {

            /*$user = \Model_User::forge(array(
                'username' => 'f.elombat',
                'password' => 'Dare2Impress',
                'email' => 'f.elombat@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                    'fullname' => 'Franck Elombat',
                    'jobtitle' => 'CTO'
                ),

            ));*/




            $user_data = array(
                'username' => 'd.elombat',
                'password' => 'Time2Code',
                'email' => 'elombatdaniel@gmail.com',
                'group' => 100,
                'profile_fields' => array(
                    'fullname' => 'Daniel Elombat',
                    'jobtitle' => 'DBA / Brang Manager'
                ),
            );




            $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']);
            //$user->save();

            $employee = \Model_Employee::forge(array(
                'first_name' => "Daniel",
                'last_name' => 'Elombat',
                'user_id' => $last_id,
                'role_id' => 1,
                'jobtile_id' => 3,
                'company_id' => 1,
                'address1' => 'Brazzaville, Congo Dem.',
                'address2' => '- ',
                'notes' => ' - ',
                'tel' => '+243 0 000 000 00',
                'email' => 'elombatdaniel@gmail.com',
                'avatar_file' => '',
            ));

            $employee->save();
            $user = \Model_User::find($last_id);

            // Prints this message on terminal
            echo '\n\r'  . $user->username . ' : '  . $last_id;
            echo '\n\r' .  "New employee: ".$employee->first_name . "#: " . $employee->last_name  ;

        } catch (\Exception $e) {

            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving the object " . get_class($user);
            echo "\nError saving the object " . get_class($employee);
            echo "\n" . $e->getMessage(). "\n";
        }
    }

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seeddata:aseelec "arguments"
	 *
	 * @return string
	 */
	public function aseelec($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Seeddata: Companies]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
		 $companies = array(
 		'KANZA SARL', 
 		'METCH-ELEC',  
 		'MATELEC',
	    'EPRESSER',
	    'PATIPE',
	    'TECHNELEC',
	    'SET CAM ',  
	    'SAINELEC',
	    'SIMTECH ',  
	    'M2B',
	    'APTE', 
	    'MOT-ELEC',
	    'GFEC',
	    'DETA ENERGY',  
	    'ERTEL', 
	    'CATRASCO ',
	    'AFRI CA CENTER',  
	    'SOCANES',
	    'LITELEC',
	    'ECAMEL ', 
	    'GLOBAL ERNERGIZER',
	    'LYDIE AND SARA',
	    'REBS',
  	    'ERTEL',   
	    'Deta Energy',
   		// 'INNOV COMMUNICATION',
		 	);
		  $company = \Model_Company::forge(array(
				 	'domain' => 'Association',
		 			'enabled' => 1
				));
		 		$company->name = 'ASEELEC';
		 		$company->save();

		 foreach ($companies as $key => $company_name) {
		 	try{
		 		 $company = \Model_Company::forge(array(
				 	'domain' => 'Electrycity',
		 			'enabled' => 1
				));
		 		$company->name = strtoupper(trim($company_name));
		 		$company->save();
		 		 echo "\nSuccess saving new company:". $company->name;
		 	}catch(\Exception $e){
		 		 // In case of error, prints the message on terminal,
	            // You can implement any error handling you need
	            echo "\nError saving new company:";
	            echo "\n" . $e->getMessage(). "\n";
		 	}
		 	

		 }
	}

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seeddata:vendors "arguments"
	 *
	 * @return string
	 */
	public function vendors($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Seeddata:Vendors]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
		 $companies = array(
					 	array(
					 		'title' => 'INNOV COMMUNICATION',
					 		'website' => 'http://innov-communication.com',
					 		'email' => 'contact@innov-communication.com',
					 		'phone' => '+237 6 999 888 77'
					 	)
			   		);
		 

		 foreach ($companies as $key => $vendor) {
		 	try{
		 		 $company = \Model_Vendor::forge(array(
						"company_id" => 0,
						"user_id" => 0,
						"enabled" => 1
				));
		 		$company->title = strtoupper(trim($vendor['title']));
		 		$company->website = trim($vendor['website']);
		 		$company->email = trim($vendor['email']);
		 		$company->phone = trim($vendor['phone']);
		 		$company->save();
		 		 echo "\nSuccess saving new company: ". $company->title;
		 	}catch(\Exception $e){
		 		 // In case of error, prints the message on terminal,
	            // You can implement any error handling you need
	            echo "\nError saving new Vendor:";
	            echo "\n" . $e->getMessage(). "\n";
		 	}
		 	

		 }
	}


    /**
     *
     */
    public function inscription_fees(){
        $auth = \Auth::instance();
        $auth->force_login(2);

        $processed_fees_accounts = \Model_Contribution::find('all', ['where' => ['type'=>'fees']] );

        $opreations_ids = array_keys($processed_fees_accounts);

        $process_client_ids = [];
        foreach ($processed_fees_accounts as $key => $processed_fees_account){
            $process_client_ids[] = $processed_fees_account->budget_id;
        }

        $clients_accounts = \Model_Client::find('all');
        $delay = 0;
        foreach ($clients_accounts as $clients_account){
            if(!in_array($clients_account->id,$process_client_ids)){

                // add fee to the account
                try {


                    $fee = \Model_Contribution::forge();
                    $fee->company_id = 1;
                    $fee->budget_id = $clients_account->id;
                    $fee->paid_at = "2018-03-12 ". printf('%s', $delay); //date('Y-m-d h:i:s', time());
                    $fee->amount = 1000;
                    $fee->currency_code = 'XAF';
                    $fee->currency_rate = 1.0000;
                    $fee->description = 'Frais d\'inscription';
                    $fee->payment_method = 'other';
                    $fee->reference = 'Frais d\'inscription';
                    $fee->status = 'paid';
                    $fee->type = 'fees';
                    $fee->created_by = 2;
                    $fee->category_id = 4;
                    $fee->save();
                    $delay = date('h:i:s', time());//$delay + 7 % 10 ;
                    sleep(6);

                    // Prints this message on terminal
                    echo "\n". $fee->client->first_name ."#: charged with subscription fees " ;
                }
                catch(\Exception $e) {
                    // In case of error, prints the message on terminal,
                    // You can implement any error handling you need
                    echo "\nError while charging  account User:";
                    echo "\n" . \DB::last_query(). "\n";
                }

            }
        }
    }

    public function fix_transaction_history(){
        $auth = \Auth::instance();
        $auth->force_login(2);

        $transferts = \Model_Transaction::find('all', ['where' => [ ['type' ,'=', 1] ]] );
        $transactions = \Model_Transaction::find('all', ['where' => [ ['type' ,'!=', 1] ]] );
        $contributions = \Model_Contribution::find('all');

        $cat_mapping = [
            "debit" => 0,
            "credit" => 1,
            "commission" => 3,
            "fees" => 4,
            //"deposit" => 2,
        ];
        if(count($transferts) > 0 ){
            foreach ($transferts as $transaction){
                //delete all
                $_transaction = \Model_Transaction::find($transaction->id);
                $del_status = $_transaction->delete();
                //echo "\n Deletion successful". $_transaction->id;
                //die("heere");
                if($del_status ){
                    echo "\n Delete successful". $transaction->id;
                }
            }
        }


        $last_transaction = \Model_Transaction::find('last', ['order_by' => ['id' => 'desc']]);

        $increment_index = isset($last_transaction->id) ? $last_transaction->id + 1 : 1 ;
        $query = \DB::query("ALTER TABLE `transactions` auto_increment = $increment_index");
        $result = $query->execute();
        if($result){
            echo "\n Update Table: Transaction Increment Index";
        }else{
            echo "\n Error settin Auto cincrement index of Table: Transaction ";
        }

        foreach ($contributions as $contribution){

            $ref = array(
                "client" => @$contribution->client->first_name ." ". @$contribution->client->last_name,
                "reference" => $contribution->reference,
                "description" => $contribution->description,
                "status" => $contribution->status,
                "category" => $contribution->category->title
            );
            //delete all
            try{
            $operation = \Model_Transaction::forge();

            if ($contribution->type == "credit"){
                $operation->from_account_id =  0;
                $operation->to_account_id = 1;
            }elseif ($contribution->type == "debit"){
                $operation->from_account_id = $contribution->id ;
                $operation->to_account_id = 0 ;
            }elseif ($contribution->type == "fees"){
                $operation->from_account_id = 1  ;
                $operation->to_account_id = 4 ;
            }elseif ($contribution->type == "commission"){
                $operation->from_account_id =  1 ;
                $operation->to_account_id = 4 ;
            }

            $operation->amount = $contribution->amount;
            $operation->paid_at = $contribution->paid_at;
            $operation->currency_code = $contribution->currency_code;
            $operation->currency_rate = $contribution->currency_rate;
            $operation->payment_method = $contribution->payment_method;
            $operation->reference = serialize($ref);
            $operation->type = $cat_mapping[$contribution->type];
            $operation->contribution_id = $contribution->id;



            $last_id = $operation->save();

                // Prints this message on terminal
                echo "\n File transaction #". $operation->id .". Success adding a new transaction linked to a Contribution. ";

            } catch(\Exception $e) {
                // In case of error, prints the message on terminal,
                // You can implement any error handling you need
                echo "\nError while adding a transaction for :" . $contribution->id;
                echo "\n" . $e->getMessage(). "\n";
                echo "\n" . \DB::last_query(). "\n";
                //exit(1);
            }


        }

    }



    public function commission_fees($month_num = 1){

        $auth = \Auth::instance();
        $auth->force_login(2);
        $processed_fees_accounts = \Model_Contribution::find('all', ['where' => ['type'=>'commission']] );

        $opreations_ids = array_keys($processed_fees_accounts);

        $process_client_ids = [];
        foreach ($processed_fees_accounts as $key => $processed_fees_account){
            $process_client_ids[] = $processed_fees_account->budget_id;
        }

        $clients_accounts = \Model_Client::find('all');
        $delay = 0;
        foreach ($clients_accounts as $clients_account){
            if(!in_array($clients_account->id,$process_client_ids)){
                $firstDay = new \Carbon\Carbon('first day of last month');
                $lastDay = new \Carbon\Carbon('last day of last month');
                $last_month = new \Carbon\Carbon('last month');
                $lastMonth = $last_month->format('F Y'); // format l, j M Y H:i:s

                //$fee = \Model_Contribution::forge();
                // add fee to the account
                try {

                    $contributions = \Model_Contribution::find('all',['where' => [ ['budget_id', '=', $clients_account->id ],['paid_at', 'between', "$firstDay AND $lastDay" ],['type', '=', "credit" ]] ] );
                    $total_cotisations = count($contributions);
                    $fee = \Model_Contribution::forge();
                    $fee->company_id = 1;
                    $fee->budget_id = $clients_account->id;
                    $fee->paid_at = $lastDay->format("Y-m-d 21:15:00");//"2018-03-31 ". printf('%s', $delay); //date('Y-m-d h:i:s', time());
                    //$fee->amount = 3000;


                    $solde_client = \Model_Account::client_balance($clients_account->id);
                    switch ($solde_client){
                        case $solde_client <= 200000 AND $total_cotisations >= 1:
                            $fee->amount = $solde_client * 0.03;
                            $fee->amount = ($fee->amount <= 500) ? 500 : $solde_client * 0.03 ;
                            break;

                        case $solde_client > 200000 AND $solde_client <= 400000 AND $total_cotisations > 1:
                            $fee->amount = 3000;
                            break;

                        case $solde_client > 400000 AND $total_cotisations > 1:
                            $fee->amount = 5000;
                            break;
                        //case $total_cotisations = 0 :
                        default:
                            $fee->amount = 500;
                            break;
                    }
                    \Debug::dump($fee->amount);
                    //$delay = '18:'.date('i:s', time());
                    //\Debug::dump($delay);
                    //die();
                    $fee->currency_code = 'XAF';
                    $fee->currency_rate = 1.0000;
                    $fee->description = 'Commission Collecte of : '. $lastMonth;
                    $fee->payment_method = 'other';
                    $fee->reference = $fee->description ;
                    $fee->status = 'paid';
                    $fee->type = 'commission';
                    $fee->created_by = 2;
                    $fee->category_id = 3;
                    $last_id = $fee->save();
                    $delay = '18:'.date('i:s', time());//$delay + 7 % 10 ;
                    sleep(3);


                    // Prints this message on terminal
                    echo "\n File#". $clients_account->id ." charged with Commission fees. $clients_account->first_name $clients_account->last_name (" . \Model_Client::get_client_balance($clients_account->id, FALSE).")" ;

                }
                catch(\Exception $e) {
                    // In case of error, prints the message on terminal,
                    // You can implement any error handling you need
                    echo "\nError while charging  account :" . $clients_account->id;
                    echo "\n" . $e->getMessage(). "\n";
                    echo "\n" . \DB::last_query(). "\n";
                    //exit(1);
                }

            }
        }
    }

}
/* End of file tasks/seeddata.php */