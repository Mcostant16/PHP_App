<?php
class Stock_History{
 
    // database connection and table name
    private $conn;
    private $table_name = "history";
 
 
    // constructor with $db as database connection
    public function __construct($db, $records, $symbol){
        $this->conn = $db;
        $this->records = $records;
        $this->symbol = $symbol;
    }

    public function insert_Records() {
     
        $stmt = $this->conn->prepare("INSERT INTO history (Symbol, Date, Open, High, Low, Close, Adj_Close, Volume, Interval_Time) 
                                VALUES (?,?,?,?,?,?,?,?,?)");
    
        try {
            $this->conn->beginTransaction();
            foreach ($this->records as $row)
            {
                $stmt->execute($row);
            }
            $this->conn->commit();
        }catch (Exception $e){
            $this->conn->rollback();
            throw $e;
            return var_dump("There was an error:". $e);
        }
        return json_encode("No issues");
    }

    public function delete_Records() {
        //var_dump("Delete Records Called");
        $stmt = $this->conn->prepare("DELETE from history where Symbol = :symbol ");
        $this->symbol=htmlspecialchars(strip_tags($this->symbol));
        $stmt->bindValue(':symbol', $this->symbol); 
        //var_dump($stmt);
        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
        }catch (Exception $e){
            $this->conn->rollback();
            throw $e;
            return var_dump("There was an error:". $e);
        }
        return json_encode("No issues");
    }

    public function get_Records($interval, $time) {
       // var_dump($this->symbol);
        //var_dump("Delete Records Called");
        switch($time) {
            case "Current":
                $time_param = date("Y").'-01-01'; //get current year
            case "1yr":
                $time_param  = date('Y-m-d', strtotime('-1 year')); //get last year
            case "5yr":
                $time_param  = date('Y-m-d', strtotime('-5 year')); //get last year
            case "10yr":
                $time_param  = date('Y-m-d', strtotime('-10 year')); //get last year
            case "Max":
                $time_param  = '1980-01-01'; //get current year
                  
        }
       // var_dump($time_param);
        $stmt = $this->conn->prepare(
            "Select * from history 
            where Interval_Time = :interval and Symbol = :symbol and Date >= :time_param"
        );
        $this->symbol=htmlspecialchars(strip_tags($this->symbol));
        $interval=htmlspecialchars(strip_tags($interval));
        $time_param=htmlspecialchars(strip_tags($time_param));
       // var_dump('Hello'. $this->symbol);
        //var_dump($interval);
        $stmt->bindValue(':interval', $interval); 
        $stmt->bindValue(':time_param', $time_param); 
        $stmt->bindValue(':symbol', $this->symbol); 
        //var_dump($stmt);
       // var_dump("I am working db file");
        try {
            $stmt->execute();
            //if you take the PDO::FETCH_ASSOC out it will return not just names 
            //but column number with data in the json array as well
           $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
           $num = $stmt->rowCount();
         //  var_dump($num);
        }catch (Exception $e){
            throw $e;
            return var_dump("There was an error:". $e);
        }
         if ($num>0) {
             // set response code - 200 OK
            http_response_code(200);
            return $data;
         } else {
            // set response code - 404 Not found
            http_response_code(404);
            // tell the user no products found
             return array("message" => "No Stock Data.");
         }

        //return $data;
    }
}
?>