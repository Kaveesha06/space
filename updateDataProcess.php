<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

//echo($fname);

if (empty($fname)) {
    echo("Please Enter Your First Name");
}else if (strlen($fname) > 20) {
    echo ("Your first Name Should Be More Than 20 Characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if(strlen($lname) > 20) {
    echo ("Your last Name Should Be More Than 20 Characters");
} else if(empty($email)) {
    echo ("Please Enter Your Email");
} else if(strlen($email) > 100) {
    echo ("Your email should be less than 100 characters");
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invalid");
} else if(empty($mobile)) {
    echo ("Please Enter Your Mobile");
} else if(strlen($mobile)!= 10) {
    echo ("Your mobile Number must contain 10 Characters");
} else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your mobile Number is Invalid");
}else if (empty($pw)) {
    echo ("Please Enter Your Password");
} else if(strlen($pw) < 5 || strlen($pw) > 15) {
    echo ("Your password should be must contain than 5 - 15 characters");
} else if(empty($no)) {
    echo ("Please enter your address!!");
}else if (strlen($no)>10) {
    echo ("Your address no should be less than 10 characters");
}else if (empty($line1)) {
    echo ("Please enter your addres line 01");
}else if (strlen($line1)>50){
    echo ("Your address line 01 should be less than 50 characters");
}else if (empty($line2)) {
    echo ("Please enter your addres line 02");
}else if (strlen($line2) > 50) {
    echo ("Your address line 02 should be less than 50 characters");
}else {
    //update query
    Database::iud("UPDATE `user` SET `fname` = '".$fname."',`lname`='".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',
    `password` = '".$pw."', `no` = '".$no."',`line01` = '".$line1."',`line_2` = '".$line2."' WHERE `id` = '".$user["id"]."' ");

    
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("update Successfylly");

}
?>