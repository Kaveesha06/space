<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` INNER JOIN `category` ON `product`.`category_cat_id`=`category`.cat_id
    INNER JOIN `franchise` ON `product`.`franchise_fran_id`=`franchise`.fran_id");

    $num = $rs->num_rows;

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
        <title>LA-Product-Report</title>
    </head>

    <body>
        <div class="container mt-3">
            <a href="adminReport.php"><img src="resource/icons8-back.gif" height="50"/></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Product Report</h2>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Franchise</th>
                        <th>Description</th>
                        <th>Image</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    for ($i = 0; $i < $num; $i++){
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo $d["id"] ?></td>
                            <td><?php echo $d["name"] ?></td>
                            <td><?php echo $d["cat_name"] ?></td>
                            <td><?php echo $d["fran_name"] ?></td>
                            <td><?php echo $d["desciption"] ?></td>
                            <td><img src="<?php echo $d["path"] ?>" height="100"/></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-warning col-2" onclick="printDiv();">Print</button>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>



<?php
} else {
    echo ("you are not a valid admin");
}

?>