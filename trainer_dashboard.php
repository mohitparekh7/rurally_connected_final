<?php
session_start();
include("connection.php");
extract($_REQUEST);
if (!isset($_SESSION['username'])) {
    header("location:trainer_login.php");
} else {
    $trainer_username = $_SESSION['username'];
    $trainer_id = $_SESSION['id'];
}
if (isset($logout)) {
    unset($_SESSION['username']);
    setcookie('logout', 'loggedout successfully', time() + 5);
    header("location:trainer_login.php");
}
if (isset($delete)) {
    header("location:deleteproduct.php?id=$delete");
}
if (isset($deleteVendor)) {
    header("location:deleteVendor.php?Vendorid=$deleteVendor");
}
$trainer_info = mysqli_query($con, "select * from trainer where trainer_id = '$trainer_id'");
$row_trainer = mysqli_fetch_array($trainer_info);
$user = $row_trainer['trainer_name'];
$pass = $row_trainer['trainer_password'];

//update
if (isset($update)) {
    if (mysqli_query($con, "update trainer set trainer_password='$password' where trainer_id='$trainer_id'")) {
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
    <title>Trainer panel</title>
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
            <!-- <li class="nav-item">
                <a class="nav-link active" style="color:black" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Products</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link active" style="color:black;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="queries-tab" data-toggle="tab" href="#queries" role="tab" aria-controls="queries" aria-selected="false">Beneficiary Queries</a>
            </li>

        </ul>
        <br><br>

        <div class="tab-content" id="myTabContent">
            <!--tab 1 starts-->
        

           
            <div class="tab-pane fade show active" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="username" value="<?php if (isset($user)) {
                                                                    echo $user;
                                                                } ?>" class="form-control" name="name"  readonly/>
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

             <!--tab 1 ends-->

            <!--tab 2-->
            <div class="tab-pane fade " id="queries" role="tabpanel" aria-labelledby="queries-tab">
                <table class="table">
                    <tbody>
                        <th>Query Id</th>
                        <th>Contact</th>
                        <th>Query </th>
                        <th>Query Status</th>
                        <th>Update Status</th>

                        <?php
                        $customerquery = mysqli_query($con, "select * from query_details where trainer_id='$trainer_id'");
                        if (mysqli_num_rows($customerquery) > 0) {
                            while ($orderrow = mysqli_fetch_array($customerquery)) {
                        ?>
                                <tr>
                                    <td><?php echo $orderrow['q_id']; ?></td>
                                    <td><b>Name: </b><?php echo $orderrow['q_username']; ?><br><b>Email: </b><?php echo $orderrow['q_useremailid']; ?><br><b>Phone: </b><?php echo $orderrow['q_contact']; ?><br></td>
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


        </div>
    </div>
    <br><br><br>
    <?php
    include("footer.php");
    ?>


</body>

</html>