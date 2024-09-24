<?php
include("process.php");
error_reporting(0);

$requestmethod=$_SERVER["REQUEST_METHOD"];
if ($requestmethod == "PUT"){

//collect input 
//use file_get_contents if data is passed as ajax or raw

    $input = json_decode(file_get_contents('php://input'), true);

    // if data was sent via a form
    if (empty($input)){
        

        $update_event = update($_POST ,$_GET) ;
    
        
        

    }
    else{
        $update_event  = update($input, $_GET) ;

       
    }
    echo json_encode( $update_event );
}
else 
$data= [
    'status' => 405,
    'message' => $requestmethod. ' method not allowed'
];
header("HTTP/1.0 405 Method not allowed");
echo json_encode($data);
