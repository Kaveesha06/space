<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$num_of_pages=0;

$cat = $_POST["cat"];
$fran = $_POST["fran"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];
//echo($color);

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = ("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
        INNER JOIN `franchise` ON `product`.`franchise_fran_id` = `franchise`.`fran_id`");

//search by franchise
if ($status == 0 && $fran != 0) {
    //1st time seach by fren
    $q .= "WHERE `franchise`.`fran_id` = '" . $fran . "'";
} else if ($status != 0 && $fran != 0) {
    //2nd time search
    $q .= " AND `franchise`.`fran_id` = '" . $fran . "'";
}

//search by category
if ($status == 0 && $cat != 0) {
    //1st time 
    $q .= "WHERE `category`.`cat_id` = '" . $cat . "'";
} else if ($status != 0 && $cat != 00) {
    //2nd time 
    $q .= "AND `category`.`cat_id` = '" . $cat . "'";
}

//search by min price 
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;

    } else if ($status != 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//search by max price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    
    } else if ($status != 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//price range 
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_page = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . "LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    //no result
?>
    <div class="d-flex flex-column justify-content-center mt-5 offset-4 mb-5">
        <h5 class="offset-1">Search No Result</h5>
        <img src="resource/Astronot.gif" height="400px;" width="350px" />
        <p><b>We are sorry, cannot find any matches for your search item..</b></p>
    </div>
    <?php
} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>

        <!--card-->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
                <a href="singleProductView.php?s=<?php echo $d["sid"] ?>">
                    <img src="<?php echo $d["path"] ?>" class="card-img-top" />
                </a>
                
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["desciption"] ?></p>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="card-text">Rs: <?php echo$d["price"]?></p>

                        <a href="myWishlist.php">
                            <img src="resource/wishlist.svg" height="35px"/> 
                        </a>
                    </div>

                    <div class="d-flex justify-content-center mb-2">
                        <button class="btn btn-outline-info col-6" onclick="addtoCart();">Add to cart</button>
                        <button class="btn btn-outline-info col-6 ms-2" onclick="buyNow();">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    ?>
    <!--pagination-->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                        }
                                                                                                                            ?>>Previous</a></li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"> <?php echo $y ?> </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"> <?php echo $y ?> </a>
                        </li>
                <?php
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" href="#">1</a></li>

                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!--pagination-->

<?php


}

?>