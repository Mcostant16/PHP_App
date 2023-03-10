<?php
//this classes call the historial.php object which inserts history into the database
include_once '../models/database.php';
include_once 'objects/historical.php';
class StockHistory {
  // required headers
//can change the Header to only allow front end when done. 
//header('Access-Control-Allow-Origin: http://localhost:3000');
//taking this out and call this class from the index router
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
private $stock;
  function __construct($symbol) {
    $this->database = new Database();
    $this->db = $this->database->getConnection();
    $this->stock = $symbol;

  }

// instantiate database and product object


  public function uploadRecords() {
    $ticker = $this->stock;
    $iMonth = 1;
    $iDay = 1;
    $iYear = 1980;
    $timestampStart = mktime(0,0,0,$iMonth,$iDay,$iYear);
    $timestampEnd = time();
#$period1 = int(time.mktime(datetime.datetime(2020, 1, 1, 23, 59).timetuple()));
#$period2 = int(time.mktime(datetime.datetime(2020, 12, 31, 23, 59).timetuple()));
    $interval = '1wk'; # 1d, 1m
 //  $result = mysqli_query($con, $query);
    $data = file_get_contents("https://query1.finance.yahoo.com/v7/finance/download/$ticker?period1=$timestampStart&period2=$timestampEnd&interval=$interval&events=history&includeAdjustedClose=true");
    $rows = explode("\n",$data);

    $s = array();

      foreach($rows as $row) {
          $t= str_getcsv($row)  ; 
          #array_push($t, $ticker);   
          array_unshift($t , $ticker);
          $t[] = $interval; 

          #  var_dump($t);

          $s[] = $t;
          unset($t);
 }
#print_r($s);
# var_dump($s);  # un comment to see results

//isntantiate class for inserting history records
  $insertHistory = new Stock_History($this->db, $s, $ticker);

// read products will be here

// Insert History Records calling insert query method on class
  $stmt = $insertHistory->insert_Records();
 #var_dump($data);
  }

  public function deleteRecords() {
    $ticker = $this->stock;
    $iMonth = 1;
    $iDay = 1;
    $iYear = 1980;
    $timestampStart = mktime(0,0,0,$iMonth,$iDay,$iYear);
    $timestampEnd = time();
#$period1 = int(time.mktime(datetime.datetime(2020, 1, 1, 23, 59).timetuple()));
#$period2 = int(time.mktime(datetime.datetime(2020, 12, 31, 23, 59).timetuple()));
    $interval = '1wk'; # 1d, 1m
 //  $result = mysqli_query($con, $query);
   
 
#print_r($s);
# var_dump($s);  # un comment to see results
//don't need to pass any records so put null
//isntantiate class for deleting history records
  $deleteHistory = new Stock_History($this->db, null, $this->stock);

// read products will be here

// Insert History Records calling insert query method on class
  $stmt = $deleteHistory->delete_Records();
 #var_dump($data);
  }

  public function getRecords($interval,$time) {
   // $ticker = $this->stock;
    $iMonth = 1;
    $iDay = 1;
    $iYear = 1980;
    $timestampStart = mktime(0,0,0,$iMonth,$iDay,$iYear);
    $timestampEnd = time();
#$period1 = int(time.mktime(datetime.datetime(2020, 1, 1, 23, 59).timetuple()));
#$period2 = int(time.mktime(datetime.datetime(2020, 12, 31, 23, 59).timetuple()));
   // $interval = '1wk'; # 1d, 1m
   
 
#print_r($s);
# var_dump($s);  # un comment to see results
//don't need to pass any records so put null
//isntantiate class for inserting history records
    $getHistory = new Stock_History($this->db, $s, $this->stock);

// read products will be here

// Insert History Records calling insert query method on class
    $stmt = $getHistory->get_Records($interval,$time);
      
    return $stmt;
 #var_dump($data);
  }

}
?>