<?php

$name = $_POST['firstname'];
$email = $_POST['email'];
$address = $_POST['address'];
$card_number = $_POST['cardnumber'];
$name_on_card = $_POST['cardname'];
$expected_date = $_POST['expmonth'];
$cvv = $_POST['cvv'];
$upload = $_POST['fileToUpload'];

if(!empty($id_number) || !empty ($name) || !empty($email) || !empty($address) ||
 !empty($card_number) || !empty($name_on_card) || !empty($expected_date) || !empty($cvv))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "upsell";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errorno().')'. mysqli_connect_error());
    }else{
        
        $INSERT = "INSERT Into customer (fname, email, adr, 
        ccnum, cname, zip, cvv, upload) values ($name,$email,$address,$card_number,$name_on_card,$expected_date,$cvv,$upload)";
        
    $stmt = $conn->prepare($INSERT);
         
    //$stmt->execute();
    echo"Data added";
}

} else{
    echo"All fields are empty";
    die();
}
?>