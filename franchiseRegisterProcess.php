<?php 

include "connection.php";

$fran = $_POST["fran"];
//  echo($fran);

if(empty($fran)) {
    echo("Please Enter Your Franchise");
}else if (strlen($fran)>20){
    echo ("Your Franchise name should be less than 20 characters");
}else {
    // echo("Success");
    $rs = Database::search("SELECT * FROM `franchise` WHERE `fran_name`='".$fran."' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("your Franchise Name is Alredy Exists");
    } else {
       Database::iud("INSERT INTO `franchise` (`fran_name`) VALUES ('".$fran."') ");
       echo ("success");
    }
    
}

?>