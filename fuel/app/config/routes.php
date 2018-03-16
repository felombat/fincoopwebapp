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
);
