<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_sid` = `stock`.`sid`
    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `cart`.`user_id` = '" . $user["id"] . "' ");

$num = $rs->num_rows;

if ($num > 0) {
    //LOad cart
?>

    <div class="mb-4 mt-5">
        <h3>Shopping Cart</h3>
    </div>

    <?php
    for ($i = 0; $i < $num; $i++) {
        #code
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;
    ?>
        <!--cart items-->
        <div class="col-12 border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $d["path"] ?>" class="rounded-4" width="200px" />
                <div class="ms-5">
                    <h4><?php echo $d["name"]  ?></h4>
                    <!-- <p class="text-muted"><?php echo $d["fran_id"] ?></p> -->
                    <h5 class="text-warning">Rs: <?php echo $d["price"] ?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" disabled />
                <button class="btn btn-light btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h4>Total: <span class="text-warning">Rs:<?php echo $total ?> </span></h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');">X</button>
            </div>
        </div>
        <!--cart items-->
    <?php
    }

    ?>


    <div class="col-12 mt-4">
        <hr>
    </div>

    <!--checkout-->
    <div class="d-flex flex-column align-items-end">
        <h6>Number Of Items:<span class="text-info"><?php echo $num ?></span></h6>
        <h6>Delivary Fee:<span class="text-info">Rs: 500</span></h6>
        <h6>Net Total:<span class="text-info"><?php echo($netTotal + 500) ?></span></h6>
        <button class="btn btn-success col-3 mt-3 mb-4" onclick="checkOut();">CHECKOUT</button>
    </div>
    <!--check out-->
<?php
} else {
    // echo("Cart is empty");
?>

    <div class="col-12 text-center mt-5">
        <h2>Your Cart is empty</h2>
        <a href="index.php" class="btn btn-primary">Start Shopping</a>
    </div>

<?php
}

?>