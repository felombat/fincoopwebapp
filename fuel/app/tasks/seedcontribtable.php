<?php

namespace Fuel\Tasks;

class Seedcontribtable
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seedcontribtable
	 *
	 * @return string
	 */
	public function run($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning DEFAULT task [Seedcontribtable:Run]";
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
	 * php oil r seedcontribtable:fixfields "arguments"
	 *
	 * @return string
	 */
	public function fixfields($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Seedcontribtable:Fixfields]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
		$contributions = \Model_Contribution::find('all');


        foreach ($contributions as $contribution) {
            $contribution->status = 'paid';
            $contribution->created_by = 1;
            $contribution->category_id = 1;
            $contribution->type = 'credit';

            if($contribution->save()){
                echo "\nRunning task [Seedcontribtable:Fixfields]";
                echo "\n Contribution ". $contribution->id ." updated successfully !\n\n";
            }else{
                echo "\nRunning task [Seedcontribtable:Run]";
                echo "\n Contribution ". $contribution->id ." update failed !\n\n";
            }
		}

	}

    public function fixtransactionstable($args = NULL)
    {
        echo "\n===========================================";
        echo "\nRunning task [Seedcontribtable:Fixfields]";
        echo "\n-------------------------------------------\n\n";

        /***************************
        Put in TASK DETAILS HERE
         **************************/
        $contributions = \Model_Contribution::find('all');


        foreach ($contributions as $contribution) {

            $transaction = \Model_Transaction::forge();

            $transaction->from_account_id = 0;
            $transaction->to_account_id = 1;
            $transaction->amount = $contribution->amount;
            $transaction->currency_code = 'XAF';
            $transaction->currency_rate = 1;
            $transaction->payment_method = 'cash';
            $transaction->reference = 0;
            $transaction->type = ($contribution->type == 'credit') ? 1 : 0 ;


            if($transaction->save()){
                echo "\nRunning task [Seedcontribtable:Fixfields]";
                echo "\n Contribution ". $transaction->id ." updated successfully !\n\n";
            }else{
                echo "\nRunning task [Seedcontribtable:Run]";
                echo "\n Contribution ". $transaction->id ." update failed !\n\n";
            }
        }

    }

}
/* End of file tasks/seedcontribtable.php */
