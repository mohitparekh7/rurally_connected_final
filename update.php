<?php
session_start();
include("connection.php");
extract($_REQUEST);
if (isset($_SESSION['id'])) {
    if (!empty($_GET['p_id'])) {
        $product_id = $_GET['p_id'];
        $query = mysqli_query($con, "select * from product where p_id='$product_id'");
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_array($query);
            $rproductname = $row['p_name'];
            $rp_price = $row['p_price'];
            $rp_category = $row['p_category'];
            $rfldimageold = $row['p_img'];
            $em = $_SESSION['id'];
        } else {
            header("location:myproducts.php");
        }
    } else {

        header("location:myproducts.php");
    }
} else {
    header("location:vendor_login.php");
}
if (isset($update)) {
    if (!empty($_SESSION['id'])) {
        $paymentmode = implode(",", $chk);
        $img_name = $_FILES['p_img']['name'];


        if (!empty($chk)) {
            if (empty($img_name)) {
                $paymentmode = implode(",", $chk);
                if (mysqli_query($con, "update  product  set p_name='$p_name',p_price='$p_price',p_category='$p_category', where p_id='$food_id'")) {
                    header("location:update_food.php?food_id=$food_id");
                    //echo "update with old pic";
                    //move_uploaded_file($_FILES['food_pic']['tmp_name'],"../image/restaurant/$em/foodimages/".$_FILES['food_pic']['name']);
                } else {
                    echo "failed";
                }
            } else {
                $paymentmode = implode(",", $chk);
                echo $p_name . "<br>";
                echo $p_price . "<br>";
                echo $p_category . "<br>";
                echo $paymentmode . "<br>";
                echo $img_name . "<br>";
                if (mysqli_query($con, "update  tbfood  set foodname='$p_name',p_price='$p_price',p_category='$p_category',paymentmode='$paymentmode', fldimage='$img_name' where food_id='$food_id'")) {
                    echo "update with new pic";
                    // move_uploaded_file($_FILES['food_pic']['tmp_name'], "image/restaurant/$em/foodimages/" . $_FILES['food_pic']['name']);
                    // unlink("image/restaurant/$em/foodimages/$rfldimageold");
                    header("location:update_food.php?food_id=$food_id");
                } else {
                    echo "failed to upload new pic";
                }
            }
        } else {

            $paymessage = "please select a payment mode";
        }
    } else {
        header("location:vendor_login.php");
    }
}
if (isset($logout)) {
    session_destroy();
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include("header.php");
    ?>


<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
        .btn {
        background-color: #c33c82;
        color: white;
    }
    </style>

</head>

<body>

    <br>
        <!--tab heading-->
        <div class="container">
        <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#c33c82;border-radius:10px 10px 10px 10px;" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="home" aria-selected="true">Update Products</a>
            </li>

            <!-- <a class="nav-link" style="color:white;" id="profile-tab" aria-selected="false">Product Details</a> -->


        </ul>
        <br><br>
        <!--tab 1 starts-->
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
                <!--add Product-->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <!--p_name-->
                        <label for="p_name">Product Name:</label>
                        <input type="text" class="form-control" id="p_name" value="<?php if (isset($rproductname)) {
                                                                                        echo $rproductname;
                                                                                    } ?>" placeholder="Enter Food Name" name="p_name" required>
                    </div>


                    <div class="form-group">
                        <!--p_price-->
                        <label for="p_price">Cost :</label>
                        <input type="number" class="form-control" id="p_price" value="<?php if (isset($rp_price)) {
                                                                                            echo $rp_price;
                                                                                        } ?>" placeholder="10000" name="p_price" required>
                    </div>


                    <div class="form-group">
                        <!--p_category-->
                        <label for="p_category">Category :</label>
                        <input type="text" class="form-control" id="p_category" value="<?php if (isset($rp_category)) {
                                                                                            echo $rp_category;
                                                                                        } ?>" placeholder="Enter Cuisines" name="p_category" required>
                    </div>

                    <!-- <div class="form-group">
                        // payment_mode
                        <?php

                        $pay = explode(",", $rpaymentmode);

                        ?>
                        <input type="checkbox" <?php if (in_array("COD", $pay)) {
                                                    echo "checked";
                                                } ?> name="chk[]" value="COD" />Cash On Delivery
                        <input type="checkbox" <?php if (in_array("Online Payment", $pay)) {
                                                    echo "checked";
                                                } ?> name="chk[]" value="Online Payment" />Online Payment
                        <br>
                        <span style="color:red;"><?php if (isset($paymessage)) {
                                                        echo $paymessage;
                                                    } ?></span>
                    </div> -->

                    <div class="form-group">

                        <!-- <input type="file" accept="image/*" name="food_pic" />Item Image -->
                    </div>

                    <button type="submit" name="update" class="btn">Update Item</button>
                    <br>

                </form>
            </div>
            <!--tab 1 ends-->

        </div>
    </div>
    </div>

    <?php
    include("Footer.php");
    ?>


</body>


</html>