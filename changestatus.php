<?php
include("connection.php");
session_start();
extract($_REQUEST);
if (isset($updstatus)) {
    if (!empty($_SESSION['id'])) {
        if (mysqli_query($con, "update  orders set orderstatus='$status' where order_id='$order_id'")) {
            header("location:myproducts.php");
        }
    } else {
        header("location:vendor_login1.php?msg=You Must Login First");
    }
}

?>
<html>

<head>
    <title>change order Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--bootstrap files-->
    <style>
        ul li a {
            color: black;
        }

        ul li a:hover {
            color: black;
            font-weight: bold;
        }

        ul li {
            list-style: none;
        }
    </style>
</head>

<body>

    <?php
    include("header.php");
    ?>
    <br><br><br><br><br><br>
    <div class="container">
        <form method="post">
            <div class="row">

                <div class="col-sm-4">Update Order Status</div>
                <div class="col-sm-4">Delivered<input type="radio" name="status" value="Delivered">&nbsp;&nbsp;&nbsp;<br>Shipped<input type="radio" name="status" value="Shipped">&nbsp;&nbsp;&nbsp;<br>Out for Delivery<input type="radio" name="status" value="Out for Delivery">&nbsp;&nbsp;&nbsp;<br>Out Of Stock<input type="radio" name="status" value="Out Of Stock"><br>
                    <br>

                    <button type="submit" class="btn btn-outline-success" name="updstatus">Update Status</button>
                </div>
                <div class="col-sm-4"></div>

            </div>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include("footer.php");
    ?>
</body>

</html>