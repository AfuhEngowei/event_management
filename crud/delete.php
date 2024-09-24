<?php

include("process.php");
$requestmethod=$_SERVER["REQUEST_METHOD"];

if ($requestmethod == "DELETE"){

//get id from the user

    $data = json_decode(file_get_contents("php://input"), true);
    $id= $data["id"];
    // to check if data was passed via a form
  
            $delete=delete_events($data, $_GET);
            echo $delete;

          
}

else{
    $data= [
        'status' => 405,
        'message' => $requestmethod. ' method not allowed'
    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}

