<?php

class Controller_Users extends Controller_Base
{
	public $template = "_layout/cleanadmin_login";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
        $data["users"] = Model_User::find('all');
        $data["employees"] = Model_Employee::find('all');
		$this->template->title = 'Dashboard &raquo; Index';
		$this->template->content = View::forge('users/index', $data);
	}

	public function action_register()
	{
	    // is registration enabled?
	    if ( ! \Config::get('application.user.registration', false))
	    {
	        // inform the user registration is not possible
	        \Messages::error(__('login.registation-not-enabled'));
            \Session::set_flash("error", 'login.registation-not-enabled');
	        // and go back to the previous page (or the homepage)
	        \Response::redirect_back();
	    }else{
            // \Session::set_flash("success", 'login.registation-enabled');
            \Messages::success(__('login.registation-enabled'));

        }

	    // create the registration fieldset
	    $form = \Fieldset::forge('registerform', array("class" => 'm-t'));

	    // add a csrf token to prevent CSRF attacks
	    $form->form()->add_csrf();

	    // and populate the form with the model properties
	    //$form->add_model('Model\\Auth_User');
        $form->add_model('Model_Employee');

	    // add the fullname field, it's a profile property, not a user property
	    $form->add_after('fullname', __('login.form.fullname'), array(), array(), 'last_name')->add_rule('required');

	    // add a password confirmation field
	    $form->add_after('confirm', __('login.form.confirm'), array('type' => 'password'), array(), 'email')->add_rule('required');

	    // make sure the password is required
	    //$form->field('password')->add_rule('required');

	    // and new users are not allowed to select the group they're in (duh!)
	    //$form->disable('group');
        $form->disable('deleted_at');
        $form->disable('created_at');
        $form->disable('updated_at');

	    // since it's not on the form, make sure validation doesn't trip on its absence
	    //$form->field('group')->delete_rule('required')->delete_rule('is_numeric');

	    // was the registration form posted?
	    if (\Input::method() == 'POST')
	    {
	        // validate the input
	        $form->validation()->run();

	        // if validated, create the user
	        if ( ! $form->validation()->error())
	        {
	            try
	            {
	                // call Auth to create this user
	                $created = \Auth::create_user(
	                    $form->validated('username'),
	                    $form->validated('password'),
	                    $form->validated('email'),
	                    \Config::get('application.user.default_group', 1),
	                    array(
	                        'fullname' => $form->validated('fullname'),
	                    )
	                );

	                // if a user was created succesfully
	                if ($created)
	                {
	                    // inform the user
	                    \Messages::success(__('login.new-account-created'));

	                    // and go back to the previous page, or show the
	                    // application dashboard if we don't have any
	                    \Response::redirect_back('dashboard');
	                }
	                else
	                {
	                    // oops, creating a new user failed?
	                    \Messages::error(__('login.account-creation-failed'));
	                }
	            }

	            // catch exceptions from the create_user() call
	            catch (\SimpleUserUpdateException $e)
	            {
	                // duplicate email address
	                if ($e->getCode() == 2)
	                {
	                    \Messages::error(__('login.email-already-exists'));
	                }

	                // duplicate username
	                elseif ($e->getCode() == 3)
	                {
	                    \Messages::error(__('login.username-already-exists'));
	                }

	                // this can't happen, but you'll never know...
	                else
	                {
	                    \Messages::error($e->getMessage());
	                }
	            }
	        }

	        // validation failed, repopulate the form from the posted data
	        $form->repopulate();
	    }

	    // pass the fieldset to the form, and display the new user registration view
	    //return \View::forge('users/registration')->set('form', $form, false);
        $this->template->title = "Registration";
        $this->template->content = \View::forge('users/registration')->set('form', $form, false);
	}


}