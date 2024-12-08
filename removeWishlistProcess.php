<?php

include "connection.php";

$wishlistId = $_POST["w"];

Database::iud("DELETE FROM `wishlist` WHERE `wishlist_id` = '".$wishlistId."'");
echo("Item successfully remove from wishlist");

?>