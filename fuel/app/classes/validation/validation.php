<?php
# fuel/app/classes/validation/validation.php
 
class Validation extends Fuel\Core\Validation
{
  /**
  * Unique field validation
  * Use inside a Model:
  *
  * property_name =>  array(
  *    'validation' => array(
  *      'unique' => array('table_name.column_name')
  *    ),
  * ),
  */
  public static function _validation_unique($val, $options)
  {
    list($table, $field) = explode('.', $options);
 
    $result = \DB::select("LOWER (\"" . $field . "\")")
    ->where($field, '=', MBSTRING ? mb_strtolower($val) : strtolower($val))
    ->from($table)->execute();
 
    if($result->count() > 0)
      return false;
    else
      return true;
  }

  public static function _validation_silocapacityexceeded($val, $options)
  {
    // $options = "site_id.silo_id"
    list($site_id, $silo_id) = explode('.', $options);
    list($table, $silo_id) = explode('.', $options);

    // $sql = "SELECT  SUM(weight) as 'total_capacity', 'silo_id', 'company_id' 
    //         FROM `loadings` 
    //         WHERE 'canceled' = 0 and site_id = :site_id AND silo_id = :silo_id AND company_id = 1
    //         GROUP by silo_id";
     $sql = "SELECT  SUM(weight) as 'capacity' 
             FROM `$table` 
             WHERE   silo_id = :silo_id  ";
 
   // $result = \DB::select("LOWER (\"" . $field . "\")")
   // ->where($field, '=', MBSTRING ? mb_strtolower($val) : strtolower($val))
   // ->from($table)->execute();
            // $query = DB::query($sql)->parameters(array('site_id' => &$site_id, 'silo_id' => &$silo_id ) );
            $query = DB::query($sql)->parameters(array('silo_id' => &$silo_id ) );
             $result = $query->execute();

 
    //if($result['total_capacity'] > Model_Silo::get_total_capacity($silo_id))
    if($result['capacity'] > Model_Silo::get_total_capacity($silo_id) + $val)
      return false;
    else
      return true;
  }
 
  /**
  * Allow alphanumeric characters and underscores in screen names
  */
  public static function _validation_username($val)
  {
    return $val === '' || preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $val);
  }
 
  /**
  * Valid MySQL date -- YYYY-MM-DD
  */
  public static function _validation_valid_mysql_date($val)
  {
    return $val === '' || preg_match('/\d{4}-\d{2}-\d{2}/', $val);
  }
}