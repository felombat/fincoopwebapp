<?php
use Orm\Model;

class Model_Account extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'name',
		'number',
		'currency_code',
		'opening_balance',
		'bank_name',
		'bank_phone',
		'bank_address',
		'enabled',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('number', 'Number', 'required|max_length[255]');
		$val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
		$val->add_field('opening_balance', 'Opening Balance', 'required');
		$val->add_field('bank_name', 'Bank Name', 'required|max_length[255]');
		$val->add_field('bank_phone', 'Bank Phone', 'required|max_length[255]');
		$val->add_field('bank_address', 'Bank Address', 'required|max_length[255]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}


    protected static $_has_many = array(
        "debits" => array(
            'key_from' => 'id',
            'model_to' => 'Model_Transfaction',
            'key_to' => 'from_account_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "credits" => array(
            'key_from' => 'id',
            'model_to' => 'Model_Transfaction',
            'key_to' => 'to_account_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        /*"category" => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),*/
    );

	public static function report_balance($timestamp = 0){
	    $timestamp = $timestamp ||  time();
	    $sql = " SELECT ac.id , (
                  Select DISTINCT SUM(IF(type = 1, transactions.amount, -(transactions.amount) )) AS creditTotal
                  FROM transactions
                  WHERE ac.id = transactions.to_account_id AND transactions.created_at <= :timestamp
                
                  ) AS credit , (
                        SELECT DISTINCT SUM(IF(type = 0, transactions.amount, 0 )) AS debitTotal
                  FROM transactions
                  WHERE ac.id = transactions.to_account_id OR ac.id = transactions.from_account_id AND transactions.created_at <= :timestamp
                
                ) AS debit , (
                  Select  DISTINCT transactions.to_account_id as account
                  FROM transactions
                  WHERE ac.id = transactions.to_account_id AND transactions.created_at <= :timestamp
                
                ) AS acc
                FROM accounts as ac
                #WHERE ac.id = transactions.to_account_id
                GROUP BY ac.id";

	    return $result = DB::query($sql)->bind('timestamp' , $timestamp)->excecute();
    }

	public static function balance($account_id = 0, $deficit = FALSE  )
    {
        $app_params = Config::load('app');
        $_myaccount = Model_Account::find($account_id);

        if (!$_myaccount) {

            return 0;
        } else {
            $query = DB::select(DB::expr(' SUM(IF(type = 1, amount, 0)) AS creditTotal, 
                    SUM(IF(type = 0, amount, 0 )) AS debitTotal , 
                    to_account_id as account'))->from('transactions');
            $query->where('to_account_id', $account_id);
            $query->or_where('from_account_id', $account_id);
            $query->group_by('account');
            $result = $query->execute();

            //return (!$deficit) ? $app_params["currency_label"] . floor($_myaccount->opening_balance + self::transferted_to($account_id) + $result[0]['creditTotal'] - $result[0]['debitTotal'] - self::transferted_from($account_id)) : $app_params["currency_label"] . floor(-1 . ($_myaccount->opening_balance + self::transferted_to($account_id) +  $result[0]['creditTotal'] - $result[0]['debitTotal'] - self::transferted_from($account_id)));
            return (!$deficit) ? $app_params["currency_label"] . floor($_myaccount->opening_balance + self::transferted_to($account_id) - self::transferted_from($account_id)) : $app_params["currency_label"] . floor(-1 . ($_myaccount->opening_balance + self::transferted_to($account_id)  - self::transferted_from($account_id)));

        }
    }

    public static function transferted_from($account_id = 0, $deficit = FALSE)
    {
        $app_params = Config::load('app');
        $_myaccount = Model_Account::find($account_id);

        if (!$_myaccount) {

            return 0;
        } else {
            $query = DB::select(DB::expr(' 
                    # SUM(IF(type = 1, amount, 0)) AS creditTotal, 
                    # SUM(IF(type = 0, amount, 0 )) AS debitTotal ,
                     SUM( amount ) AS debitTotal, 
                    from_account_id as account'))->from('transactions');
            //$query->where('to_account_id', $account_id);
            $query->where('from_account_id', $account_id);
            $query->and_where('deleted_at', null);
            $query->group_by('account');
            $result = $query->execute();

            return (!$deficit) ? $app_params["currency_label"] . floor( $result[0]['debitTotal']) : $app_params["currency_label"] . floor( - ($result[0]['debitTotal']));
        }
    }

    public static function transferted_to($account_id = 0, $deficit = FALSE)
    {
        $app_params = Config::load('app');
        $_myaccount = Model_Account::find($account_id);

        if (!$_myaccount) {

            return 0;
        } else {
            $query = DB::select(DB::expr(' 
                 # SUM(IF(type = 1, amount, 0)) AS creditTotal, 
                 # SUM(IF(type = 0, amount, 0 )) AS debitTotal , 
                 SUM( amount ) AS creditTotal,
                    to_account_id as account'))->from('transactions');
            //$query->where('to_account_id', $account_id);
            $query->where('to_account_id', $account_id);
            $query->and_where('deleted_at', null);
            $query->group_by('account');
            $result = $query->execute();

            return (!$deficit) ? $app_params["currency_label"] . floor( $result[0]['creditTotal']) : $app_params["currency_label"] . floor( - ($result[0]['creditTotal']));
        }
    }



    public static function get_dropdownlist($exclude = array() ){
        $dlist = [];
        $empty= ['-' => "Please select ..."];
        $dlist['-']= "Please select ...";
        $entry = Model_Jobtitle::find('all', array('array(select)' => array( 'name')));
        foreach ($entry as $key => $row) {
            if(isset($exclude) && !in_array($row->id, $exclude)){

                $dlist[$row->id] =  "$row->name" ;
            }
        }

        return $dlist;
    }


}
