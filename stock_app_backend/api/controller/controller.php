<?php
include_once 'stocks_api/stockhistory.php';
class Controller
{
    /** 
* __call magic method. 
*/
//private $url;

function __construct() {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->query_string = $_SERVER['QUERY_STRING'];
    //var_dump($_SERVER['QUERY_STRING']);
  }

public function  main_function() {

     $endpoint = $this->getUriSegments();
     $activity = $this->getMethod();
     $params = $this->getQueryStringParams();
     //print_r($params['symbol'] . 'Hello World');
     //var_dump($params['symbol']);
 
     $x = 4; #var to check if uri has 4th segmant
     //$params   = $this->getQueryStringParams();
     //var_dump($params);
     //var_dump($this->getUriSegments());
     //var_dump($endpoint);
     //check if the uri has fourth segment if it does not get the third segment
     if (!$endpoint[$x]) {
              $x = 3; 
       }
    //var_dump($endpoint[$x]);
     switch  ($endpoint[$x]) {
        case "getHistory":
            $addStocks = new StockHistory($params['symbol']); 
            $addStocks->uploadRecords();
            return $endpoint[$x].'_'.$activity;
        case "getSymbols":
            return $endpoint[$x].'_'.$activity;
        case "read":
            header("HTTP/1.1 404 Not Found");
            include_once 'stocks_api/read.php';
            exit();
        case "deleteHistory":
            $deleteStocks = new StockHistory($params['symbol']); 
            $deleteStocks->deleteRecords();
            return $endpoint[$x].'_'.$activity;
        case "getStockData":
            $getStocks = new StockHistory($params['symbol']); 
            $data = $getStocks->getRecords($params['interval'],$params['time']);
            return $data;
        default:
            //this route needs to be built
            //header("HTTP/1.1 404 Not Found");
            //include_once 'stocks_api/read.php';
            exit();
            //return "Page Not Found";
     }
}


public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
    /** 
* Get URI elements. 
* 
* @return array 
*/
    private function getUriSegments()
    {
        $url = parse_url($this->uri, PHP_URL_PATH);
        $url = explode( '/', $url );
        //var_dump($this->url);
        return $url;
    }
/* 
    * Get Method. 
    * 
    * @return array 
*/
    private function getMethod()
        {
            $method = $this->method;
            return $method;
        }
/** 
 *
* Get querystring params. 
* 
* @return array 
*/
    private function getQueryStringParams()
    {
            parse_str($this->query_string, $query);
            //$query = explode( '/', $query );
            //print_r($query);
            return $query;
    }
    /** 
* Send API output. 
* 
* @param mixed $data 
* @param string $httpHeader 
*/
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
        echo $data;
        exit;
    }
}