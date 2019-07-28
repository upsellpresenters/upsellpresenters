<?php

$name = $_POST['Name'];
$email = $_POST['Email'];
$address = $_POST['Address'];

$card_number = $_POST['Card_Number'];
$name_on_card = $_POST['Name_on_Card'];
$expected_date = $_POST['Expected_Date'];
$cvv = $_POST['Cvv'];

$upload = $_POST['Upload'];

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
        
        $INSERT = "INSERT Into customer (ID_Number, Name, Email, Address, 
        Card_Number, Name_on_Card, Expected_Date, Cvv, Upload) values ($id_number,$name,$email,$address,$card_number,$name_on_card,$expected_date,$cvv,$upload)";
        
    $stmt = $conn->prepare($INSERT);
    $stmt ->bind_param($id_number,$name,$email,$address,$card_number,$name_on_card,$expected_date,$cvv,$upload)";       
    $stmt->execute();
    echo"Data added";
}

} else{
    echo"All fields are empty";
    die();
}
?>