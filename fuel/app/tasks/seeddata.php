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

}
/* End of file tasks/seeddata.php */