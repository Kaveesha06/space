<?php

session_start();
require "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search ("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id`
    ORDER BY `stock`.`sid` ASC");
    $num = $rs->num_rows;


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="style.css" />
            <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
            <title>LA-Stock-Report</title>

        </head>

        <body class="container">
            <div class="container mt-3">
                <a href="adminReport.php">
                    <img src="resource/icons8-back.gif" height="50"/>
                </a>
            </div>

            <div class="container mt-3" id="printArea">
                <h2 class="text-center">Stock Report</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Stock ID</th>
                            <th>Product Name</th>
                            <th>Stock QTY</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        for($i = 0; $i<$num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d ["id"]?></td>
                                <td><?php echo $d ["name"]?></td>
                                <td><?php echo $d ["qty"]?></td>
                                <td><?php echo $d ["price"]?></td>
                            </tr>
                        <?php
                        }
                        ?>
 
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end container mt-5 mb-5">
                <button class="btn btn-warning col-2" onclick="printDiv();">Print</button>
            </div>

            <script src="script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>

<?php
} else {
    echo ("You are not a valid admin");
}

?>