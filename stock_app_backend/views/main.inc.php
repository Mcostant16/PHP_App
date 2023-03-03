<h2>Welcome to stock App!</h2>
<br>
<br>
<p>Select a Stock Ticker
<p>
<h2>Search Stock Info</h2>
<form class="example" action="index.php" method="get">
  <input type="text" placeholder="Search.." name="searchFor">
  <button type="submit"><i class="fa fa-search"></i></button>
  <input name="content" type="hidden" value="search" />
</form>

<p>Centered inside a form with max-width:</p>
<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

<?php
  // include('historical.py') ;
   //$stock_con = mysqli_connect("localhost", "test", "test", "stock") or die('Could not connect to server');
   $query = "SELECT * from symbols where Symbol = 'AAPL'";
include_once 'models/database.php';
include_once 'api/objects/historical.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$ticker = 'NFLX';
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
 #var_dump($rows);
 $s = array();
 #$t = array();
 foreach($rows as $row) {
    $t= str_getcsv($row)  ; 
    #array_push($t, $ticker);   
    array_unshift($t , $ticker);
    $t[] = $interval; 
   # $t[] = $ticker; 
   #  var_dump($t);

     $s[] = $t;
        unset($t);
 }
 #print_r($s);
 # var_dump($s);  # un comment to see results

 //isntantiate class for inserting history records
$insertHistory = new Insert_Stock_History($db, $s);

// read products will be here

// Insert History Records
$stmt = $insertHistory->insert_Records();
 #var_dump($data);
  
?>