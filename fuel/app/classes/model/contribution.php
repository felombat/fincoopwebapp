<?php
use Orm\Model;

class Model_Contribution extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'company_id',
		'budget_id',
        'status',
        'created_by',
        'category_id',
        'type',
		'paid_at',
		'amount',
        'category_id',
		'currency_code',
		'currency_rate',
		'description',
		'payment_method',
		'reference',
		'created_at',
        'deleted_at',
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
		'Orm\Observer_Contribution' => array(
       	    'events' => array('after_insert','after_delete'),
       	     'mysql_timestamp' => false,
       	 ),
	);

    protected static $_belongs_to = array(
        "client" => array(
            'key_from' => 'budget_id',
            'model_to' => 'Model_Client',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "category" => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );

    protected static $_has_one = array(
        "transaction" => array(
            'key_from' => 'created_at',
            'model_to' => 'Model_Transaction',
            'key_to' => 'created_at',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),

    );

	protected static $_conditions = array(
        'order_by' => array('paid_at' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

    protected static $_soft_delete = array(
        'mysql_timestamp' => false,
    );

	public static function validate($factory)
	{
        $_request =  \Request::active();
        $params_id = (int) $_request->method_params[0];
        // \Debug::dump(Input::post('budget_id') ); die();

	    $budget = (is_null(Input::post('budget_id') )) ? Model_Contribution::find($params_id) : Model_Client::find(Input::post('budget_id')) ;

	    $account_balance = (is_null(Input::post('budget_id') )) ? Model_Account::client_balance($budget->budget_id) : Model_Account::client_balance($budget->id);
	    $diff_allowed = $account_balance - Model_Account::transferted_to($budget->id)  ; // Maintenance Costs TODO: set '3000' as app params
        $diff_allowed = ($diff_allowed > 0 ) ? $diff_allowed : 0;
		$val = Validation::forge($factory);
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('budget_id', 'Budget Id', 'required|valid_string[numeric]');
		$val->add_field('paid_at', 'Paid At', 'required');
		//$val->add_field('amount', 'Amount', 'required|valid_string[numeric]');
		$val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
		$val->add_field('currency_rate', 'Currency Rate', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('payment_method', 'Payment Method', 'required');
		$val->add_field('reference', 'Reference', 'required|max_length[255]');
        //$val->add_field('status', 'Status', 'required');
        $val->add_field('type', 'Type', 'required');
        //$val->add_field('created_by', 'Created_by', 'required|valid_string[numeric]');
        //$val->add_field('category_id', 'Category', 'required|valid_string[numeric]');
        if(Input::post('type') == 'credit' ){
            $val->add_field('amount', 'Amount', 'required|valid_string[numeric]');
        }else{
            $val->add_field('amount', 'Amount', "required|valid_string[numeric]|numeric_max[$diff_allowed]");
        }

		return $val;
	}

    /**
     * @param int $val
     * @param string $period
     * @return string
     */
    public static function get_total_contributions($val = 1, $period = 'month'){

	    switch($period){

            case "month" :

                $sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  sum(amount) as total
                    FROM contributions
                    WHERE MONTH(paid_at) = :val
                    GROUP BY num_day, num_month
                    ORDER BY num_day asc;";
                break;

            case "year" :
                $sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month, YEAR(paid_at) as num_year,  sum(amount) as total
                    FROM contributions
                    WHERE YEAR(paid_at) = :val
                    GROUP BY num_month, num_year
                    ORDER BY num_month asc;";
                 break;

            case "week":
                $sql = "SELECT  WEEK(paid_at, 0) as num_week, YEAR(paid_at) as num_year,  sum(amount) as total
                    FROM contributions
                    WHERE WEEK(paid_at) = :val
                    GROUP BY num_week, num_year
                    ORDER BY num_week asc;";
                break;

            case "day":
                $sql = "SELECT  HOUR(paid_at) as num_hour, DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  sum(amount) as total
                    FROM contributions
                    WHERE HOUR(paid_at) = :val
                    GROUP BY num_hour, num_day, num_month
                    ORDER BY num_day asc;";
                break;

            default:
                $sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  sum(amount) as total
                    FROM contributions
                    WHERE MONTH(paid_at) = :val
                    GROUP BY num_day, num_month
                    ORDER BY num_day asc;";
                break;

        };

	    /*$sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  sum(amount) as total
                    FROM contributions
                    WHERE MONTH(paid_at) = 3
                    GROUP BY num_day, num_month
                    ORDER BY num_day asc;";*/
        /*$sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month,
                  sum(IF( type = 'credit', amount , 0)) as total_credit,
                  sum(IF( type = 'debit', amount , 0)) as total_debit
                FROM contributions
                WHERE MONTH(paid_at) = 3
                GROUP BY num_day, num_month
                ORDER BY num_day asc";*/
	    $query = DB::query($sql)->bind("val", $val);
        //$query = DB::query(DB::expr($sql));
	    $result = $query->execute();

	    return $result;
    }

    public static function get_contributions($val = 1, $period = 'month'){

        $sql = "SELECT  budget_id, DAY(paid_at) as num_day, MONTH(paid_at) as num_month
                #  sum(IF( type = 'credit', amount , 0)) as total_credit,
                #  sum(IF( type = 'debit', amount , 0)) as total_debit
                FROM contributions
                WHERE MONTH(paid_at) = 3
                # GROUP BY budget_id, num_month
                ORDER BY budget_id asc";
        //$query = DB::query($sql)->bind("val", $val);
        $query = DB::query(DB::expr($sql));

        $result = $query->execute();

        return  $result;

    }

}
