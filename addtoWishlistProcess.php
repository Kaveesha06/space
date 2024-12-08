<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$stockId = $_POST["s"];
$qty = $_POST["q"];

// echo ($stockId);
$rs = Database::search("SELECT * FROM `stock` WHERE `sid` = '".$stockId."'");
$num = $rs->num_rows;

if($num > 0) {
    $d = $rs->fetch_assoc();
    $stockQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `wishlist` WHERE `user_id` = '".$user["id"]."' AND `stock_sid` = '".$stockId."' ");
    $num2 = $rs2->num_rows;

    if($num2>0) {
        // echo("UPdate");
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["wishlist_qty"];

        if ($stockQty >=$newQty) {
            Database::iud("UPDATE `wishlist` SET `wishlist_qty` ='".$newQty."' WHERE wishlist_id = '".$d2["wishlistid"]."' ");
            echo("Cart Item Added Successfully");
        }else {
            echo("Stock Quantity has been EXCEEDED");
        }
    }else {
        // echo("Insert");
        if ($stockQty >= $qty) {
            Database::iud("INSERT INTO `wishlist` (`wishlist_qty`,`user_id`,`stock_sid`)
            VALUES ('".$qty."','".$user["id"]."','".$stockId."') ");
            echo("Wishlist added successfully");
        }else {
            echo("Your Quantity has been exceeded !");
        }
    }

}else {
    echo("Your Product has been exeeded");
}

?>