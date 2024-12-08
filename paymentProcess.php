<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$stockList = array();
$qtyList = array();

if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
    //echo ("From cart");

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $user["id"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $stockList[] = $d["stock_sid"];
        $qtyList[] =$d["cart_qty"];
    }

}else {
    //echo ("From buy now");
    $stockList[] = $_POST["stockId"];
    $qtyList[] = $_POST["qty"];
}

$merchantId = "1224153";
$merchantSecret = "MjU3NDIxNzkwNDM4MjM0ODgwODAyMDEzMjY3OTM5OTEyNTM4NzY2";
$items = "";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($i = 0; $i< sizeof($stockList); $i++) {

    $rs2 = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    WHERE `stock`.`sid` = '".$stockList[$i]."'");

    $d2 = $rs2->fetch_assoc();
    $stockQty = $d2["qty"];

    if ($stockQty >= $qtyList[$i]){
        //stock available
        
        $items .= $d2["name"];

        if($i != sizeof($stockList)-1) {
            $items .=", ";
        }

        $netTotal +=(intval($d2["price"]) * intval($qtyList[$i]));
    }else{
        echo("Product has no available stock");
    }

}

//delivary fee
$netTotal +=500;

$hash = strtoupper(
    md5(
        $merchantId . 
        $orderId . 
        number_format($netTotal, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchantSecret)) 
    ) 
);

$payment = array();
$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user["email"];
$payment["phone"] = $user["mobile"];
$payment["address"] = $user["no"].",".$user["line01"];
$payment["city"] = $user["line_2"];
$payment["country"] = "Sri Lanka";
$payment["order_id"] = $orderId;
$payment["items"] = $items;
$payment["currency"] = $currency;
$payment["amount"] = number_format($netTotal, 2, '.', '');
$payment["hash"] = $hash;
$payment["return_url"] = "";
$payment["cancel_url"] = "";
$payment["notify_url"] = "";

echo json_encode($payment);


?>