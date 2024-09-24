<?php
error_reporting(0);
// header('Access-Control-Allow-Origin:*');
// header('Content-Type: aplication/json');
// header('Access-Control-Allow-Method: GET');
// header('Access-Control-Allow-Headers: Content-Type, Access-control-Allow-Headers, Authorization');
//asign and check the request method
include("process.php");

$requestmethod=$_SERVER["REQUEST_METHOD"];
if ($requestmethod == "POST"){

//collect input 
//use file_get_contents if data is passed as ajax or raw

    $input = json_decode(file_get_contents('php://input'), true);

    // if data was sent via a form
    if (empty($input)){
        

        $store_event = createvent($_POST) ;
    
        
        

    }
    else{
        $store_event = createvent($input) ;

       
    }
    echo json_encode( $store_event);



}
else{
    
        $data= [
            'status' => 405,
            'message' => $requestmethod. ' method not allowed'
        ];
        header("HTTP/1.0 405 Method not allowed");
        echo json_encode($data);
    }