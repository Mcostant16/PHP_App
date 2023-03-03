<?php
class Insert_Stock_History{
 
    // database connection and table name
    private $conn;
    private $table_name = "history";
 
 
    // constructor with $db as database connection
    public function __construct($db, $records){
        $this->conn = $db;
        $this->records = $records;
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
        return var_dump("No issues");
    }
}
?>