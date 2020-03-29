<?php

$myObj = new stdClass();
$myObj ->productList = array();

$servername="visitacivitavecchia_db_1";
$username="user";
$password="password";
$dbname="db";
$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connection_error){
    die("Connection failed: ".$conn->connection_error);
}

$result =$conn->query
("SELECT * FROM `products` WHERE name= 'Cattedrale'");

if($result->num_rows > 0){
    foreach ($result as $row) {
        $prod = new stdClass();
        $prod->name = $row['name'];
        $prod->name_subtitle = $row['name_subtitle'];
        $myObj->productList[] = $prod;
        $prod->video_url = $row['video_url'];
        $prod->img1_url = $row['img1_url'];
        $prod->img2_url = $row['img2_url'];
        $prod->img3_url = $row['img3_url'];
        $prod->txt1_url = $row['txt1_url'];
        $prod->txt2_url = $row['txt2_url'];
        $prod->txt3_url = $row['txt3_url'];
    }
}

echo json_encode($myObj);

?>