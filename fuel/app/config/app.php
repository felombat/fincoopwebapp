<?php

return array(

	"name"  => 'Astrio Collect',
	"title" => 'Astrio :: Collect',
	"author"  => 'F. Elombat',
	"organisation" => 'Astrio',
	"url" => 'http://collect.astrio.net',
	"email" => 'contact@astrio.net',
	"admin_email" => 'f.elombat@gmail.com',
	"version" => 1.0,
	"description" => '',
	"support" => '',
	"crdate" => '2018-02-7',
	"mailinglist" => '',
	"community" => '',
	"linkedin_url" => '',
	"currency_label" => "Fr ",
    "currency_code" => "XAF",

	'apis' => array(
			'linkein' => array(
				'secret' => '',
				'auth_token' => '',

				)

			),
    "payment_methods" => array(
            '-' => 'Please Select one option',
            /*'europe' => array(
                'uk' => 'United Kingdom',
                'nl' => 'Netherlands'
            ),*/
            'cash' => 'Cash',
        'cb' => 'Credit Card',
        'cheque' => 'Cheque',
        'ecsah' => 'Electronique Cash (OM, MoMo, Nexttel Credit)',
        'bankwire' => 'Bank Transfert',
        'other' => 'Other',
        ),

	);