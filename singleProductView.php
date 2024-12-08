<?php

include "connection.php";

$stockId = $_GET["s"];
//echo($stockId);
if (isset($stockId)) {

    $q = ("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
    INNER JOIN `category` ON `product`.`category_cat_id` = `category`.cat_id
    INNER JOIN `franchise` ON `product`.`franchise_fran_id` = `franchise`.`fran_id` 
    WHERE `stock`.`sid` = '".$stockId."';");

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

    ?>
    
    <!DOCTYPE html>
        <html lang="en" data-bs-theme="dark">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
            <title>Lunar-Arcade</title>
        </head>

        <body>
            <!--nav bar-->
            <?php include "navBar.php"; ?>
            <!--nav bar-->

            <div class="singleProductView">
                <div class="col-12 row shadow-lg p-5 rounded-2 bg-body-tertiary m-auto">
                    
                    <div class="col-6">
                        <img src="<?php echo $d['path'] ?>" class="rounded-3 shadow-lg" height="400vh;" />
                    </div>

                    <div class="col-6">
                        <h3 class="text-info"> <?php echo $d ['name'] ?> </h3>
                        <h5 class="mt-3"> <?php echo $d ['fran_name'] ?> </h5>
                        <h6 class="mt-3"><?php echo $d ['cat_name'] ?></h6>
                        <p class="mt-3"><?php echo $d['desciption'] ?></p>
                        <div class="row mt-5">
                            <div class="col-2">
                                <input type="text" placeholder="Qty" class="form-control" id="qty"/>
                            </div>
                            <div class="col-6 mt-2">
                                <h6 class="text-warning">Available quantity: <?php echo $d['qty'] ?></h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4 mb-2">

                            <h5 class="card-text">Rs: <?php echo$d["price"]?> /= </h5>

                            <a href="#" onclick="addtoWishlist('<?php echo $d['sid'] ?>');">
                                <img src="resource/wishlist.svg" height="40px"/> 
                            </a>
                        </div>
                    
                        <div class=" d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-warning col-6 mb-2 ms-2" onclick="addtoCart('<?php echo $d['sid'] ?>');" >Add to cart</button>
                            <button class="btn btn-outline-success col-6 mb-2 ms-2" onclick="buyNow('<?php echo $d['sid'] ?>');">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <?php include "footer.php"; ?>
            <!--footer-->

            
            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        </body>

    </html>

    <?php

} else {
    header("location: index.php");

}

?>
