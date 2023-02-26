<?php
class Symbols{
 
    // database connection and table name
    private $conn;
    private $table_name = "Symbol";
 
    // object properties
    public $symbol_id;
    public $name;
    public $description;
    public $market_cap;
    public $volume;
    public $sector;
    public $industry;
 
    // constructor with $db as database connection
    public function __construct($db, $search){
        $this->conn = $db;
        $this->search = "%$search%";
    }

    public function get_Symbols() {
        //$this->wild_card_search = "%search%";
        
        //$v_yearvalue = SUBSTR($p_full_academic_year,2,2).SUBSTR($p_full_academic_year,7,2);
        //$query = "select * from symbols order by Symbol limit 5";
        $symbol_query = "select * 
                          from symbols 
                          where Symbol LIKE :symbol 
                          or Name LIKE :symbol";
        //var_dump($query);
        //var_dump($this->db);
        //$this->db->prepare($query);
        //$this->setQuery($this->db, $symbol_query);
        //var_dump($this->db);
        //var_dump($db);
       // $this->statement_get_course = $this->db;
        //$this->db->prepare($symbol_query);
        //$this->statement_get_course = $this->db->prepare($query);
        $statement_get_course = $this->conn->prepare($symbol_query);
       // var_dump($statement_get_course);
       //sanitize
       $this->search=htmlspecialchars(strip_tags($this->search));
        $statement_get_course->bindValue(':symbol', $this->search); 
       // $this->conn->bindValue(':symbol', $this->search); 
        //var_dump($statement_get_course);
        //used wild cards for search
    //	$statement_get_course->bindValue(':in_prefix', $p_prefix);
    //	$statement_get_course->bindValue(':in_code', $p_code);
       // var_dump($this->db);
        try {
            $statement_get_course->execute();
            } catch (Exception $e) 
                {
                    $error_message = $e->getMessage();
                    $this->search_results[0] = 'Error: '.$error_message;
                    return $this->search_results;
                    exit();
                } 
         /* Not Using this part. 
            try {
                //I like the to retrieve the results here
                //  $search_results = $statement_get_course->fetchAll();
            } catch (Exception $e) 
                {
                    $search_results[0] = 'Error: '.$error_message;
                    return $search_results;
                    exit();
                }	
            */	
       // $search_results->closeCursor();
       // var_dump($this->search_results);
        //var_dump($search_results);		
        //return $search_results;
        return $statement_get_course;
        }
}
?>