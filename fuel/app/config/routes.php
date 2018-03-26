<?php
return array(
	'_root_'  => 'dashboard/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	'login'   => 'admin/login',    // The main login/signin route
	'logout'   => 'admin/logout',    // The logout/signout route
	'signin'   => 'admin/sigin',    // The main registration route
	//'_404_'   => 'cleanadmin/404',    // The main 404 route

	'contributions' => 'finances/contributions',
    'withdraw(/:client_id/:type)' => array('contribution/withdraw', 'client_id' => 1, 'type' => 'debit' ),
	'contribution(/:client_id/:type)' => array('contribution/client', 'client_id' => 1, 'type' => 'debit' ),

);
