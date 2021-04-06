<?php
session_start();
include("connection.php");
extract($_REQUEST);
if (!isset($_SESSION['username'])) {
    header("location:admin.php");
} else {
    $admin_username = $_SESSION['username'];
}
if (isset($logout)) {
    unset($_SESSION['username']);
    setcookie('logout', 'loggedout successfully', time() + 5);
    header("location:admin.php");
}
if (isset($delete)) {
    header("location:deleteproduct.php?id=$delete");
}
if (isset($deleteVendor)) {
    header("location:deleteVendor.php?Vendorid=$deleteVendor");
}
$admin_info = mysqli_query($con, "select * from admin_details where admin_username='$admin_username'");
$row_admin = mysqli_fetch_array($admin_info);
$user = $row_admin['admin_username'];
$pass = $row_admin['admin_password'];

//update
if (isset($update)) {
    if (mysqli_query($con, "update admin set admin_password='$password'")) {
        //$_SESSION['pas_update_success']="Password Updated Successfully Login with New Password";
        unset($_SESSION['username']);
        // header("location:admin_info_update.php");  CHECK FOR UPDATE
    } else {
        echo "failed";
    }
}
?>
<html>

<head>
    <title>Admin control panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        a:link,
    a:visited {
        color: #f3d8e6;
        font-size: 16px;
    }

    a:hover,
    a:active {
        color: white;
    }

    .dropdown-menu {
        background-color: black;
    }

    .sum {
        margin-top: 25px;
        margin-bottom: 30px;
    }

    .sum p {
        font-size: 25px;
    }

    .sum a:link,
    .sum a:visited {
        background-color: #c33c82;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .sum a:hover,
    .sum a:active {
        background-color: #9c3068;
    }

        .tabb ul li a {
            color: black;
        }

        .tabb ul li a:hover {
            color: black;
            font-weight: bold;
        }

        ul li {
            list-style: none;
        }

        ul li a:hover {
            text-decoration: none;
        }

        #social-fb,
        #social-tw,
        #social-gp,
        #social-em {
            color: blue;
        }

        #social-fb:hover {
            color: #4267B2;
        }

        #social-tw:hover {
            color: #1DA1F2;
        }

        #social-gp:hover {
            color: #D0463B;
        }

        #social-em:hover {
            color: #D0463B;
        }
    </style>
    <script>
        function delRecord(id) {
            //alert(id);

            var x = confirm("You want to delete this record? All Products Of that Vendor Will Also Be Deleted");
            if (x == true) {

                //document.getElementById("#result").innerHTML="success";
                window.location.href = 'deleteVendor.php?Vendorid=' + id;
            } else {
                window.location.href = '#';
            }

        }
    </script>

</head>


<body>
    <?php
    include("header.php");
    ?>

    <br><br><br><br>
    <!--details section-->

    <div class="container tabb">
        <!--tab heading-->
        <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#c33c82;border-radius:10px 10px 10px 10px;" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" style="color:black" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:black;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:black;" id="ManageVendors-tab" data-toggle="tab" href="#ManageVendors" role="tab" aria-controls="ManageVendors" aria-selected="false">Manage Vendors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:black;" id="orderstatus-tab" data-toggle="tab" href="#orderstatus" role="tab" aria-controls="orderstatus" aria-selected="false">Order status</a>
            </li>

        </ul>
        <br><br>
        <!--tab 1 starts-->
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="viewitem-tab">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Vendor_Id</th>
                                <th scope="col">Product View</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Categories</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Remove Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select vendor.vendor_id,vendor.vendor_name,vendor.vendor_email,product.p_id,product.p_name,product.p_category,product.p_img from  vendor right join product on vendor.vendor_id=product.vendor_id");
                            while ($row = mysqli_fetch_array($query)) {

                            ?>

                                <tr>
                                    <th scope="row"><?php echo $row['vendor_id']; ?></th>
                                    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['p_img']).'" height="250px" width="150px" />' ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td><?php echo $row['p_category']; ?></td>
                                    <td><?php echo $row['vendor_name']; ?></td>
                                    <td><?php echo $row['p_id']; ?></td>


                                    <form method="post">
                                        <td><a href=""><button type="submit" value="<?php echo $row['p_id']; ?>" name="delete" class="btn btn-danger">Remove </button></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

                <span style="color:green; text-align:centre;"><?php if (isset($success)) {
                                                                    echo $success;
                                                                } ?></span>


            </div>

            <!--tab 1 ends-->


            <!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="username" value="<?php if (isset($user)) {
                                                                    echo $user;
                                                                } ?>" class="form-control" name="name" readonly="readonly" />
                    </div>



                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" value="<?php if (isset($pass)) {
                                                                                                echo $pass;
                                                                                            } ?>" id="pwd" required />
                    </div>



                    <button type="submit" name="update" style="background:#c33c82; border:1px solid #ED2553;" class="btn btn-primary">Update</button>
                    <div class="footer" style="color:red;"><?php if (isset($ermsg)) {
                                                                echo $ermsg;
                                                            } ?><?php if (isset($ermsg2)) {
                                                                    echo $ermsg2;
                                                                } ?></div>
                </form>
            </div>
            <!--tab 2 ends-->

            <div class="tab-pane fade show" id="ManageVendors" role="tabpanel" aria-labelledby="ManageVendors-tab">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Vendor Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Remove Vendor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select  * from vendor");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row['vendor_id']; ?></th>
                                    <td><?php echo $row['vendor_name']; ?></td>
                                    <td><?php echo $row['vendor_address']; ?></td>
                                    <td><b>Email: </b><?php echo $row['vendor_email']; ?><br><b>Phone: </b><?php echo $row['vendor_contact']; ?></td>

                                    <form method="post">
                                        <td><a href="#" style="text-decoration:none; color:white;" onclick="delRecord(<?php echo $row['vendor_id']; ?>)"><button type="button" class="btn btn-danger">Remove Vendor</a></a></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--tab 4-->
            <div class="tab-pane fade" id="orderstatus" role="tabpanel" aria-labelledby="orderstatus-tab">
                <table class="table">
                    <th>Order Id</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>User Id</th>
                    <th>Order Status</th>
                    <tbody>
                        <?php
                        $rr = mysqli_query($con, "select * from orders");
                        while ($rrr = mysqli_fetch_array($rr)) {
                            $stat = $rrr['orderstatus'];
                            $productid = $rrr['p_id'];
                            $r_f = mysqli_query($con, "select * from product where p_id='$productid'");
                            $r_ff = mysqli_fetch_array($r_f);

                        ?>
                            <tr>
                                <td><?php echo $rrr['order_id']; ?></td>
                                <td><?php echo $rrr['p_id']; ?></td>
                                <td><?php echo $rrr['order_pname']; ?></td>
                                <td><?php echo $rrr['u_id']; ?></td>
                                <?php
                                if ($stat == "cancelled" || $stat == "Out Of Stock") {
                                ?>
                                    <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $rrr['orderstatus']; ?></span></td>
                                <?php
                                } else {
                                ?>
                                    <td><span style="color:green;"><?php echo $rrr['orderstatus']; ?></span></td>
                                <?php
                                }
                                ?>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <br><br><br>
    <?php
    include("footer.php");
    ?>


</body>

</html>