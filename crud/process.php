<?php
require "../config/config.php";

function error422(string $message) {
    $data= [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable entity");
    echo json_encode($data);
    exit();
}


function getevents($params){
    global $conn;
    if(isset($params["id"])){
$id=mysqli_real_escape_string($conn, $params["id"]);

    $sql= "SELECT *FROM events WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $display=mysqli_fetch_assoc($result);
    echo json_encode($display) ;
    $data1= [
        'status' => 200,
        'message' => 'data fetched '
    ];
    header("HTTP/1.0 200 data fetched");
    
    return json_encode($data1);
    }

    else{
         $sql= "SELECT *FROM events";
         $result=mysqli_query($conn, $sql);
         if($result){

       while ($display =mysqli_fetch_assoc($result)){
        
        echo json_encode($display) ;

       
       }
       $data1= [
        'status' => 200,
        'message' => 'data fetched '
    ];
    header("HTTP/1.0 200 data fetched");
    
    return json_encode($data1);
       
     }

    }
       

    
    $data= [
        'status' => 404,
        'message' => 'no event  found'
    ];
    header("HTTP/1.0 404 no event found");
    return json_encode($data);
 
}



function createvent($inputdata) {
    global $conn;
    $title=mysqli_real_escape_string($conn, $inputdata["title"]);
    $description=mysqli_real_escape_string($conn, $inputdata["description"]);
    $date=mysqli_real_escape_string($conn, $inputdata["date"]);
    $location=mysqli_real_escape_string($conn, $inputdata["location"]);
    $created_at=mysqli_real_escape_string($conn, $inputdata["created_at"]);
    $updated_at=mysqli_real_escape_string($conn, $inputdata["updated_at"]);
    if(empty(trim($title))){

        return error422("enter event title");
    }
    elseif(empty(trim($description))){

        return error422("enter event description");
    }
    elseif(empty(trim($date))){

        return error422("enter event date");
    }
    elseif(empty(trim($location))){

        return error422("enter event location");
    }
    elseif(empty(trim($created_at))){

        return error422("enter event creation date");
    }
    elseif(empty(trim($updated_at))){

        return error422("enter event creation date");
    }

    else{
        $sql="INSERT INTO events(title,description,date,location,created_at,updated_at) VALUES('$title', '$description', '$date', '$location', '$created_at', '$updated_at')";
        $result=mysqli_query($conn,$sql);

        if($result){
            $data= [
                'status' => 201,
                'message' =>  ' event created succesfully '
            ];
            header("HTTP/1.0 201 event created succesfully");
            echo json_encode($data);
    }
    else{
        $data= [
            'status' => 500,
            'message' => 'Internal server error'
        ];
        header("HTTP/1.0 500 Internal server error");
        echo json_encode($data);
    }




    }
}



function  delete_events($inputdata, $params) {
    global $conn;
    //get id 
if(!isset($inputdata['id'])){
    return error422('event id not found');
}
elseif($inputdata['id']== null){
    return error422('enter event id');
}

$id=mysqli_real_escape_string($conn, $params["id"]);
$sql= "DELETE FROM events WHERE id='$id' LIMIT 1";
$result=mysqli_query($conn,$sql);
if($result){
    $data= [
        'status' => 204,
        'message' => 'event deleted'
    ];
    header("HTTP/1.0 204  Deleted");
    
    return json_encode($data);

}
else{

        $data= [
            'status' => 404,
            'message' => 'event not found'
        ];
        header("HTTP/1.0 404 event not found");
        echo json_encode($data);
    }


}





function update($inputdata , $ids) {
    global $conn;

    if(!isset($ids["id"])){
        return error422('event id not found');
    }
    elseif( $ids['id']==null){
        return error422('enter event id');
    }

$id=mysqli_real_escape_string($conn, $ids["id"]);


    $title=mysqli_real_escape_string($conn, $inputdata["title"]);
    $description=mysqli_real_escape_string($conn, $inputdata["description"]);
    $date=mysqli_real_escape_string($conn, $inputdata["date"]);
    $location=mysqli_real_escape_string($conn, $inputdata["location"]);
    $created_at=mysqli_real_escape_string($conn, $inputdata["created_at"]);
    $updated_at=mysqli_real_escape_string($conn, $inputdata["updated_at"]);
    if(empty(trim($title))){

        return error422("enter event title");
    }
    elseif(empty(trim($description))){

        return error422("enter event description");
    }
    elseif(empty(trim($date))){

        return error422("enter event date");
    }
    elseif(empty(trim($location))){

        return error422("enter event location");
    }
    elseif(empty(trim($created_at))){

        return error422("enter event creation date");
    }
    elseif(empty(trim($updated_at))){

        return error422("enter event creation date");
    }

    else{
        $sql="UPDATE events SET title='$title',description='$description',date='$date',location='$location',created_at='$created_at',updated_at='$updated_at' WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn,$sql);

        if($result){
            $data= [
                'status' => 200,
                'message' =>  ' event UPDATED succesfully '
            ];
            header("HTTP/1.0 200 event UPDATED succesfully");
            echo json_encode($data);
    }
    else{
        $data= [
            'status' => 500,
            'message' => 'Internal server error'
        ];
        header("HTTP/1.0 500 Internal server error");
        echo json_encode($data);
    }




    }
}
