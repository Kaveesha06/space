<?php

include "connection.php";

$ProductID = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

//echo ($ProductID);

if (empty($qty)) {
    echo ("Please Enter Qty");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can entereed for qty");
} else if (strlen($qty) > 10) {
    echo ("Your Qty Should less than 10 characters");
} else if (empty($price)) {
    echo ("Please Enter price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can entereed for price");
} else if (strlen($price) > 10) {
    echo ("Your price Should less than 10 characters");
} else {

    $rs =  Database::search("SELECT * FROM `stock` WHERE `product_id`='" . $ProductID . "'
          AND `price`='" . $price . "' ");

    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty`='" . $newQty . "' WHERE `id`='" . $d["stock_sid"] . "' ");
        echo ("Stock Update Successfully");
    } else {

        Database::iud("INSERT INTO `stock`(`price`,`qty`,`product_id`) VALUES ('" . $price . "','" . $qty . "','" . $ProductID . "') ");

        echo ("New Stock Added Successfully");
    }
}
