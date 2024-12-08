<?php

include "connection.php";

$pname  = $_POST["pn"];
$cat = $_POST["cat"];
$fran = $_POST["fran"];
$desc = $_POST["desc"];



if(empty($pname)) {
    echo ("Please enter product name");
}else if (strlen($pname)>30) {
    echo("Your product should be less than 30 character");
}else if ($cat=="0") {
    echo ("Please select category");
}else if (empty($desc)) {
    echo("Please enter description");
}else if (strlen($desc)>100) {
    echo ("Your product desciption should be less than 100 character");
}else {
    if (isset($_FILES["img"])) {
        $image = $_FILES["img"];

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '".$pname."'");
        $num = $rs->num_rows;

        if ($num >0) {
            echo ("Your Product Name is Already Exists");
        }else {
            $path = "resource/ProductImg//" . uniqid() . ".png";
            move_uploaded_file($image["tmp_name"], $path);
        
            Database::iud("INSERT INTO `product` (`name`,`desciption`,`path`,`franchise_fran_id`,`category_cat_id`)
            VALUES ('".$pname."','".$desc."','".$path."','".$fran."','".$cat."')");

            echo ("Success");

        }

    }else {
        echo ("Please select a Product image");
    }
}



?>