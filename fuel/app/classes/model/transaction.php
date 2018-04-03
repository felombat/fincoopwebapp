<?php

class Model_Transaction extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
 			'from_account_id' ,
			'to_account_id'  ,
			'amount'  ,
			'currency_code'  ,
			'currency_rate'  ,
			'payment_method'  ,
			'reference',
		'type',
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
        'Orm\Observer_Transaction' => array(
            'events' => array('after_insert','after_delete'),
            'mysql_timestamp' => false,
        ),
	);

    protected static $_belongs_to = array(
        "from_account" => array(
            'key_from' => 'from_account_id',
            'model_to' => 'Model_Account',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "to_account" => array(
            'key_from' => 'to_account_id',
            'model_to' => 'Model_Account',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "contribution" => array(
            'key_from' => 'created_at',
            'model_to' => 'Model_Contribution',
            'key_to' => 'created_at',
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


	// protected static $_many_many = array(
	//     'items' => array(
	//         'table_through' => 'items_loadings', 	// both models plural without prefix in alphabetical order
	//         'conditions' => array(
	//            'order_by' => array(
	//                 'posts_users.loading_id' => 'DESC'	// define custom through table ordering
	//             ),
	//         ),
	//     )
	// );

    protected static $_soft_delete = array(
        'mysql_timestamp' => false,
    );


	protected static $_table_name = 'transactions';


    /**
     * @param int $val
     * @param string $period
     * @return string
     */
    public static function get_total_transactions($val = 1, $period = 'month'){

        switch($period){

            case "month" :

                $sql = "SELECT  DAY(from_unixtime(`created_at`,'%Y-%m-%d')) as num_day, MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) as num_month,
                                sum(IF( type = '1', `amount` , 0)) as total_credit,
                                sum(IF( type = '0', `amount` , 0)) as total_debit
                        FROM transactions
                        WHERE MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) = :val
                        GROUP BY num_day, num_month
                        ORDER BY num_day asc";
                break;

            case "year" :
                $sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month, YEAR(paid_at) as num_year, 
                     sum(IF( type = '1', `amount` , 0)) as total_credit,
                     sum(IF( type = '0', `amount` , 0)) as total_debit
                    FROM transactions
                    WHERE YEAR(paid_at) = :val
                    GROUP BY num_month, num_year
                    ORDER BY num_month asc;";
                break;

            case "week":
                $sql = "SELECT  WEEK(paid_at, 0) as num_week, YEAR(paid_at) as num_year, 
                      sum(IF( type = '1', `amount` , 0)) as total_credit,
                      sum(IF( type = '0', `amount` , 0)) as total_debit
                    FROM transactions
                    WHERE WEEK(paid_at) = :val
                    GROUP BY num_week, num_year
                    ORDER BY num_week asc;";
                break;

            case "day":
                $sql = "SELECT  HOUR(paid_at) as num_hour, DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  
                      sum(IF( type = '1', `amount` , 0)) as total_credit,
                      sum(IF( type = '0', `amount` , 0)) as total_debit
                    FROM transactions
                    WHERE HOUR(paid_at) = :val
                    GROUP BY num_hour, num_day, num_month
                    ORDER BY num_day asc;";
                break;

            default:
                $sql = "SELECT  DAY(from_unixtime(`created_at`,'%Y-%m-%d')) as num_day, MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) as num_month,
                        sum(IF( type = '1', `amount` , 0)) as total_credit,
                        sum(IF( type = '0', `amount` , 0)) as total_debit
                FROM transactions
                WHERE MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) = :val
                GROUP BY num_day, num_month
                ORDER BY num_day asc;";
                break;

        };

        /*$sql = "SELECT  DAY(paid_at) as num_day, MONTH(paid_at) as num_month,  sum(amount) as total
                    FROM transactions
                    WHERE MONTH(paid_at) = 3
                    GROUP BY num_day, num_month
                    ORDER BY num_day asc;";*/
        /* $sql = "SELECT  DAY(from_unixtime(`created_at`,'%Y-%m-%d')) as num_day, MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) as num_month,
                        sum(IF( type = '1', `amount` , 0)) as total_credit,
                        sum(IF( type = '0', `amount` , 0)) as total_debit
                FROM transactions
                WHERE MONTH(from_unixtime(`created_at`,'%Y-%m-%d')) = :val
                GROUP BY num_day, num_month
                ORDER BY num_day asc";*/
        $query = DB::select(DB::expr('DAY(from_unixtime(`created_at`,\'%Y-%m-%d\')) as num_day, MONTH(from_unixtime(`created_at`,\'%Y-%m-%d\')) as num_month,
                        sum(IF( type = \'1\', `amount` , 0)) as total_credit,
                        sum(IF( type = \'0\', `amount` , 0)) as total_debit'))->from('transactions');
        $query->where(DB::expr('MONTH(from_unixtime(`created_at`,\'%Y-%m-%d\'))', $val));
        $query->and_where('deleted_at', null);
        $query->group_by('num_day','num_month');
        $result = $query->execute();


        //$query = DB::query($sql)->bind("val", $val);

        //$result = $query->execute();

        return  $result;
    }

    public static function validate($factory)
    {
        $account = Model_Account::find(Input::post('from_account_id'));
        $account_balance = Model_Account::balance($account->id);
        $diff_allowed = $account_balance - Input::post('amount') - 5000 ; // Maintenance Costs TODO: set '10000' as app params
        $diff_allowed = ($diff_allowed > 5000 ) ? $diff_allowed : 0;

        $val = Validation::forge($factory);
        $val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
        $val->add_field('from_account_id', 'Source Account Id', 'required|valid_string[numeric]');
        $val->add_field('to_account_id', 'Destination Account Id', 'required|valid_string[numeric]');
        $val->add_field('amount', 'Amount', "required|valid_string[numeric]|numeric_max[$diff_allowed]");
        $val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
        $val->add_field('currency_rate', 'Currency Rate', 'required');
        //$val->add_field('description', 'Description', 'required');
        $val->add_field('payment_method', 'Payment Method', 'required');
        $val->add_field('reference', 'Reference', 'required|max_length[255]');
        //$val->add_field('status', 'Status', 'required');
        $val->add_field('type', 'Type', 'required');
        //$val->add_field('created_by', 'Created_by', 'required|valid_string[numeric]');
        //$val->add_field('category_id', 'Category', 'required|valid_string[numeric]');
        
        return $val;
    }

}
