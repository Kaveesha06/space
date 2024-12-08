<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if(isset($_POST["payement"])) {
    $payement = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d-H-i-s");

    Database::iud("INSERT INTO `order_history`(`order_id`,`order_date`,`amount`,`user_id`) 
    VALUES('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistoryId = Database::$connection->insert_id;

    // Log order history ID
    //error_log("Order History ID (checkout): " . $orderHistoryId);

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user["id"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        //Order Items Insert
        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `order_item`(`oi_qty`,`order_history_ohid`,`stock_sid`) 
        VALUES('" . $d["cart_qty"] . "','" . $orderHistoryId . "','" . $d["stock_sid"] . "')");

        $rs2 = Database::search("SELECT * FROM `stock` WHERE `sid`='" . $d["stock_sid"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $d["cart_qty"];
        Database::iud("UPDATE `stock` SET `qty`='" . $newQty . "' WHERE `sid`='" . $d["stock_sid"] . "'");
    }

    Database::iud("DELETE FROM `cart` WHERE `user_id`='" . $user["id"] . "'");
    echo ("Success");
   
    // $order = array();
    // $order["resp"] = "Success";
    // $order["order_id"] = $orderHistoryId;

    // echo json_encode($order);

}

?>