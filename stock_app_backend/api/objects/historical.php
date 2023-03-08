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
}
?>