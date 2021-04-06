<?php
include("connection.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <style type="text/css">
        .entire {
            background-color: white;
            width: 40%;
            margin: auto;
            padding: 10px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .header {
            margin-top: 20px;
            font-family: 'Merriweather', serif;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 700;
        }

        table {
            margin-bottom: 20px;
        }

        th {
            background-color: #c33c82;
            color: white;
            font-weight: 500;
            padding: 8px;
        }

        td {
            padding: 8px;
        }

        .fa {
            font-size: 30px;
            margin-right: 10px;
        }

        .foot {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <!-- <div class="content">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
				</h3>
			</div>
		<?php endif ?>
	</div> -->

    <?php
    include("header.php");
    ?>

    <div class="entire">
        <div class="header container-fluid">
            <h4>Your Previous Orders</h4>
        </div>

        <div class="container-fluid">
            <table border="3">
                <tr>
                    <th>Order Number</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Order Status</th>
                </tr>
                <?php

                $query = mysqli_query($con, "SELECT * FROM orders WHERE u_id = '$id'") or die(mysqli_error($con));
                $row = mysqli_fetch_array($query);
                if (!empty($query)) {
                    while ($row = mysqli_fetch_array($query)) {
                        $o_id = $row['order_id'];
                        $pname = $row['order_pname'];
                        $price = $row['order_price'];
                        $qty = $row['order_qty'];
                        $status = $row['orderstatus']
                ?>
                        <tr>
                            <td><?php echo $o_id ?></td>
                            <td><?php echo $pname ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $qty ?></td>
                            <td><?php echo $status ?></td>
                        </tr>
                <?php
                    }
                }

                ?>
            </table>

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