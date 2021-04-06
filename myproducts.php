<?php
session_start();
include("connection.php");
extract($_REQUEST);
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $vq = mysqli_query($con, "select * from vendor where vendor_email='$id'");
    $vr = mysqli_fetch_array($vq);
    $vrid = $vr['vendor_id'];
}

if (!isset($_SESSION['id'])) {
    header("location:vendor_login.php?msg=Please Login To continue");
} else {
    $query = mysqli_query($con, "select * from vendor   where vendor_email='$id'");
    if (mysqli_num_rows($query)) {

        $row = mysqli_fetch_array($query);
        $v_id = $row['vendor_id'];
    } else {
        header("location:index.php");
    }
}


if (isset($add)) {
    if (isset($_SESSION['id'])) {
        // $img_name = $_FILES['p_img']['p_name'];
        if (!empty($chk)) {
            $gender = implode(",", $chk);
            if (mysqli_query($con, "insert into product(vendor_id,p_name,p_price,p_category,p_gender) values
	
	('$v_id','$product_name','$cost','$category','$gender')")) {
            } else {
                echo mysqli_error($con);
            }
        } else {
            $paymessage = "please select a gender";
        }
    } else {
        header("location:vendor_login.php");
    }
}

if (isset($logout)) {
    session_destroy();
    header("location:index.php");
}
if (isset($upd_account)) {

    //echo $fn;
    //echo $emm;
    //echo $add;
    if (mysqlI_query($con, "update vendor set vendor_name='$fn',vendor_email='$emm',vendor_address='$add',vendor_contact='$mob',vendor_password='$pwsd' where vendor_email='$id'")) {
        header("location:infoUpdate.php");
    }
}
if (isset($upd_logo)) {
    if (isset($_SESSION['id'])) {
        $log_img = mysqli_query($con, "select * from vendor where vendor_id='$id'");
        $log_img_row = mysqli_fetch_array($log_img);
        $old_logo = $log_img_row['vendor_img'];
        $new_img_name = $_FILES['logo_pic']['name'];

        if (mysqli_query($con, "update vendor set vendor_img ='$new_img_name' where vendor_id='$id'")) {
            // unlink("image/restaurant/$id/$old_logo");
            // move_uploaded_file($_FILES['logo_pic']['tmp_name'], "image/restaurant/$id/" . $_FILES['logo_pic']['name']);

            header("location:update_food.php");
        }
    } else {
        header("location:vendor_login.php?msg=Please Login To continue");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .btn {
            background-color: #c33c82;
            color: white;
        }
    </style>

</head>

<body>

    <?php
    include("header.php");
    ?>


    <br><br>
    <!--tab heading-->
    <div class="container">
        <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#c33c82;border-radius:10px 10px 10px 10px;" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="home" aria-selected="true">Manage Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="profile" aria-selected="false">Add Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="accountsettings-tab" data-toggle="tab" href="#accountsettings" role="tab" aria-controls="accountsettings" aria-selected="false">Account Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Order Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="queries-tab" data-toggle="tab" href="#queries" role="tab" aria-controls="queries" aria-selected="false">Customer Queries</a>
            </li>

        </ul>
        <br><br>
        <span style="color:green;"><?php if (isset($msgs)) {
                                        echo $msgs;
                                    } ?></span>
        <!--tab 1 starts-->
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table border="1" bordercolor="#F0F0F0" cellpadding="20px">
                        <th>Product Image</th>
                        <th>Product name</th>
                        <th>Product Price</th>
                        <th>Product Category </th>
                        <th>Gender </th>
                        <th>Delete Item </th>
                        <th>Update item Details </th>
                        <?php
                        if ($query = mysqli_query($con, "select vendor.vendor_id,vendor.vendor_email,product.p_id,product.p_name,product.p_price,product.p_gender,product.p_category,product.p_img,vendor.vendor_name from vendor inner join product on vendor.vendor_id=product.vendor_id where vendor.vendor_email='$id'")) {
                            if (mysqli_num_rows($query)) {
                                while ($row = mysqli_fetch_array($query)) {

                        ?>
                                    <tr>

                                        <td><?php echo '<img class="" src="data:image/jpeg;base64,' . base64_encode($row['p_img']) . '" height="250px" width="200px" />'; ?></td>
                                        <td style="width:150px;"><?php echo $row['p_name'] . "<br>"; ?></td>
                                        <td align="center" style="width:150px;"><?php echo $row['p_price'] . "<br>"; ?></td>
                                        <td align="center" style="width:150px;"><?php echo $row['p_category'] . "<br>"; ?></td>
                                        <td align="center" style="width:150px;"><?php echo $row['p_gender'] . "<br>"; ?></td>
                                        <td align="center" style="width:150px;">

                                            <a href="vendor_delete_product.php?p_id=<?php echo $row['p_id']; ?>"><button type="button" class="btn btn-danger">Delete </button></a>

                                        </td>
                                        <td align="center" style="width:150px;">

                                            <!-- <a href="update.php?food_id=<?php echo $row['p_id']; ?>"><button type="button" class="btn">Update </button></a> -->
                                            <a href="update.php?p_id=<?php echo $row['p_id']; ?>"><button type="button" class="btn">Update </button></a>
                                        </td>
                                    </tr>

                        <?php

                                    $productname = "";
                                    $category = "";
                                    $price = "";
                                }
                            } else {
                                $msg = "please add some Items";
                            }
                        } else {
                            echo "failed";
                        }

                        ?>
                    </table>
                </div>
            </div>
            <!--tab 1 ends-->


            <!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="profile-tab">
                <!--add Product-->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <!--product_name-->
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" value="<?php if (isset($product_name)) {
                                                                                                echo $product_name;
                                                                                            } ?>" placeholder="Enter Product Name" name="product_name" required>
                    </div>


                    <div class="form-group">
                        <!--cost-->
                        <label for="cost">Price :</label>
                        <input type="number" class="form-control" id="cost" value="<?php if (isset($cost)) {
                                                                                        echo $cost;
                                                                                    } ?>" placeholder="10000" name="cost" required>
                    </div>


                    <div class="form-group">
                        <!--category-->
                        <label for="category">Categories :</label>
                        <input type="text" class="form-control" id="category" value="<?php if (isset($category)) {
                                                                                            echo $category;
                                                                                        } ?>" placeholder="Enter category" name="category" required>
                    </div>

                    <div class="form-group">
                        <!--payment_mode-->
                        <input type="checkbox" name="chk[]" value="Men" />Men
                        <input type="checkbox" name="chk[]" value="Women" />Women
                        <br>
                        <span style="color:red;"><?php if (isset($gendermessage)) {
                                                        echo $gendermessage;
                                                    } ?></span>
                    </div>

                    <!-- <div class="form-group">
                        <input type="file" accept="image/*" name="product_pic" />Product Image
                    </div> -->

                    <button type="submit" name="add" class="btn">ADD Item</button>
                    <br>
                    <span style="color:red;"><?php if (isset($msg)) {
                                                    echo $msg;
                                                } ?></span>
                </form>

            </div>
            <!--tab 2 ends-->


            <!--tab 3-- starts-->
            <div class="tab-pane fade" id="accountsettings" role="tabpanel" aria-labelledby="accountsettings-tab">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    $upd_info = mysqli_query($con, "select * from vendor where vendor_email='$id'");
                    $upd_info_row = mysqlI_fetch_array($upd_info);
                    $nm = $upd_info_row['vendor_name'];
                    $emm = $upd_info_row['vendor_email'];
                    $log = $upd_info_row['vendor_img'];
                    $ad = $upd_info_row['vendor_address'];
                    $mb = $upd_info_row['vendor_contact'];
                    $psd = $upd_info_row['vendor_password'];

                    ?>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="username" value="<?php if (isset($nm)) {
                                                                    echo $nm;
                                                                } ?>" class="form-control" name="fn" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" value="<?php if (isset($emm)) {
                                                                    echo $emm;
                                                                } ?>" class="form-control" name="emm" readonly="readonly" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" value="<?php if (isset($ad)) {
                                                                    echo $ad;
                                                                } ?>" class="form-control" name="add" required />
                    </div>
                    <div class="form-group">
                        <label for="mobile">Contact</label>
                        <input type="text" id="mobile" pattern="" value="<?php if (isset($mb)) {
                                                                                echo $mb;
                                                                            } ?>" class="form-control" name="mob" required />
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwsd" class="form-control" value="<?php if (isset($psd)) {
                                                                                            echo $psd;
                                                                                        } ?>" id="pwd" required />
                    </div>



                    <button type="submit" name="upd_account" class="btn">Update</button>

                </form>
            </div>


            <!-- Tab Order Status starts  -->

            <div class="tab-pane fade " id="status" role="tabpanel" aria-labelledby="status-tab">
                <table class="table">
                    <tbody>
                        <th>Order Id</th>
                        <th>Customer Email</th>
                        <th>Product Id</th>
                        <th>Order Status</th>
                        <th>Update Status</th>

                        <?php
                        $orderquery = mysqli_query($con, "select * from orders  join product on orders.p_id=product.p_id where vendor_id='$vrid'");
                        if (mysqli_num_rows($orderquery) > 0) {
                            while ($orderrow = mysqli_fetch_array($orderquery)) {
                                $userid = $orderrow['u_id'];
                                $userquery = mysqli_query($con, "SELECT * FROM user_details  WHERE  user_id ='$userid'");
                                $userrow = mysqli_fetch_array($userquery);
                                $stat = $orderrow['orderstatus'];
                        ?>
                                <tr>
                                    <td><?php echo $orderrow['order_id']; ?></td>
                                    <td><?php echo $userrow['user_emailid']; ?></td>
                                    <td><?php echo $orderrow['p_id']; ?></td>
                                    <?php
                                    if ($stat == "cancelled" || $stat == "Out Of Stock") {
                                    ?>
                                        <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $orderrow['orderstatus']; ?></span></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><span style="color:green;"><?php echo $orderrow['orderstatus']; ?></span></td>
                                    <?php
                                    }
                                    ?>
                                    <form method="post">
                                        <td><a href="changestatus.php?order_id=<?php echo $orderrow['order_id']; ?>"><button type="button" name="changestatus" class="btn">Update Status</button></a></td>
                                    </form>
                                <tr>
                            <?php
                            }
                        }
                            ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab Order Status Ends  -->

            <!-- Tab Queries Start  -->
            <div class="tab-pane fade " id="queries" role="tabpanel" aria-labelledby="queries-tab">
                <table class="table">
                    <tbody>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Customer Contact</th>
                        <th>Query Status</th>
                        <th>Update Status</th>

                        <?php
                        $customerquery = mysqli_query($con, "select * from query_details  join product on query_details.p_id=product.p_id where vendor_id='$vrid'");
                        if (mysqli_num_rows($customerquery) > 0) {
                            while ($orderrow = mysqli_fetch_array($customerquery)) {
                                $userid = $orderrow['u_id'];
                                $userquery = mysqli_query($con, "SELECT * FROM user_details  WHERE  user_id ='$userid'");
                                $userrow = mysqli_fetch_array($userquery);
                                $stat = $orderrow['querystatus'];
                        ?>
                                <tr>
                                    <td><?php echo $orderrow['p_id']; ?></td>
                                    <td><?php echo $orderrow['p_name']; ?></td>
                                    <td><b>Name: </b><?php echo $userrow['user_name']; ?><br><b>Email: </b><?php echo $userrow['user_emailid']; ?><br><b>Phone: </b><?php echo $userrow['user_mobilenumber']; ?><br></td>
                                    <td><?php echo $orderrow['q_customerquery']; ?></td>
                                    <?php
                                    if ($stat == "Unresolved") {
                                    ?>
                                        <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $orderrow['querystatus']; ?></span></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><span style="color:green;"><?php echo $orderrow['querystatus']; ?></span></td>
                                    <?php
                                    }
                                    ?>
                                    <form method="post">
                                        <td><a href="changequerystatus.php?q_id=<?php echo $orderrow['q_id']; ?>"><button class="btn" type="button" name="changestatus">Update Status</button></a></td>
                                    </form>
                                <tr>
                            <?php
                            }
                        }
                            ?>
                    </tbody>
                </table>
            </div>
            <!-- Tab Queries End  -->

        </div>
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</html>