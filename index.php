<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/lunar_arcade_logo_edit.png" />
    <title>LUNAR ARCADE</title>
</head>

<body onload="loadProduct(0);">

    <!--nav bar-->
    <?php include "navBar.php" ?>
    <!--nav bar-->

    <!--basic search-->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-5">
            <input type="text" class="form-control" placeholder="Product name" id="product" onkeyup="searchProduct(0)" />
        </div>
        <button class="btn btn-outline-info col-1 ms-3 mt-5" onclick="viewFilter();">Filters</button>

        <div class="col-1 ms-2 mt-5">
            <a href="#"><img src="resource/equalizersoutline_114523.svg" onclick="viewFilter();" height="40px;"/></a>
        </div>
    </div>
    <!--basic search-->

    <!--advanced search-->
    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">

            <div class="row col-12">

                <div class="row col-6 ms-auto">
                    <label class="col-3 form-label">Franchise :</label>
                    <select class="form-select bg-dark col-9" id="fran">
                        <option value="0">Your Franchise model here</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `franchise`");
                        $num = $rs->num_rows;

                        for($i=0;$i<$num;$i++){
                            $d = $rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $d["fran_id"]?>"><?php echo $d["fran_name"]?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Category :</label>
                    <select class="form-select bg-dark col-9" id="cat">
                        <option value="0">Favor Category Type</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs->num_rows;

                        for( $i=0; $i < $num2; $i++){
                            $d2= $rs2->fetch_assoc();
                            ?>
                            <option value="<?php echo $d2["cat_id"]?>"><?php echo $d2["cat_name"]?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>

            </div>

            <div class="mt-4 row col-12">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min price" id="min"/>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max price" id="max"/>
                </div>
                    <button class="btn btn-outline-light col-2" onclick="advSearchProduct(0);">Search</button>

            </div>

        </div>
    </div>
    <!--advanced search-->

    <!--load product-->
    <div class="row col-10 offset-1" id="pid">
    </div>
    <!--load product-->


    <!--footer-->
    <?php include "footer.php"; ?>
    <!--footer-->


    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>