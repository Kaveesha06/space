<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$stockId = $_POST["s"];
$qty = $_POST ["q"];

// echo ($stockId);
$rs = Database::search("SELECT * FROM `stock` WHERE `sid` = '" . $stockId . "'");
$num = $rs->num_rows;

if($num > 0 ) {
    $d = $rs->fetch_assoc();
    $stockQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id` = '".$user["id"]."' AND `stock_sid` = '".$stockId."' ");
    $num2= $rs2->num_rows;

    if ($num2>0) {
        // echo("update");
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];

        if ($stockQty >= $newQty) {
            //update query
            Database::iud("UPDATE `cart` SET`cart_qty` = '".$newQty."' WHERE `cart_id` = '".$d2["cart_id"]."' ");
            echo("Cart item added successfully");
        }else {
            echo("Stock Quantity has been exceeded");
        }

    }else {
        //echo("Insert");
        if($stockQty >= $qty) {
            Database::iud("INSERT INTO `cart` (`cart_qty`,`user_id`,`stock_sid`)
                           VALUES ('".$qty."','".$user["id"]."','".$stockId."')");
            echo("Cart item added successfully");
        }else{
            echo("Your Quantity has been exceeded !");
        }
    }

}else {
    echo ("Your Stock is not found");
}

?>