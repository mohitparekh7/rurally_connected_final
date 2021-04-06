<?php
session_start();
$id = $_SESSION['id'];
include('connection.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rurally Connected</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <style type="text/css">
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


        .dropdown .fa {
            font-size: 24px;
        }

        .vmenu {
            background-color: #404040;
            overflow-x: hidden;
            padding: 10px;
        }

        .vmenu a {
            color: #f3d8e6;
        }

        .vmenu a:hover {
            background-color: white;
            color: black;
        }

        .card img {
            height: 270px;
        }

        .card {
            height: 95%;
            margin-bottom: 20px;
            text-align: center;
        }


        .card img{
            height: 58%;
        }

        .card-title{
            font-size: 16px;
        }

        .card-text {
            font-style: italic;
            font-size: 13px;
            color: #404040;
        }

        .card a:hover {
            color: #404040;
        }

        .btn {
            color: white;
            background-color: #c33c82;
        }


        .btn1:hover {
            background-color: #404040;
        }


        .modal-header h4 {
            text-align: center;
            font-family: 'Merriweather', serif;
            letter-spacing: 1px;
            font-weight: 900;
        }

        .cart-price {
            margin-top: 10px;
        }

        .cart-total {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="vmenu" id="vmenus">

                    <ul class="nav flex-column menu">
                        <li class="nav-item">
                            <a class="nav-link active-link" href="?page=mens">Men</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=womens">Women</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-10">
                <form method=POST>

                    <?php
                    if (isset($_GET['page'])) {
                        $p = $_GET['page'];
                        $page = $p . ".php";

                        if (file_exists($page))
                            include($page);
                    } else {
                        include 'mens.php';
                    }
                    ?>
                </form>
            </div>
            <?php

            if (isset($_POST['add'])) {

                $pid = $_POST["add"];
                $res = mysqli_query($con, "SELECT * FROM product WHERE p_id='$pid'");
                $row = mysqli_fetch_array($res);
                $price = $row[7]; //price
                $pname = $row[3]; //pname
                $img = $row[8];
                $vendor = $row[2]; //vendor name
                $pdesc = $row[6];

                $create = "CREATE TABLE IF NOT EXISTS cart (c_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,u_id INT, pid INT, pname VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, qty INT, p_img longblob NOT NULL)";
                if (mysqli_query($con, $create)) {

                    global $con;
                    $result = mysqli_query($con, "SELECT * FROM cart WHERE pid = '$pid' ");
                    $res1 = mysqli_fetch_row($result);
                    if ($res1) {

                        $q = $res1[3];
                        $q = $q + 1;
                        $query = " UPDATE cart SET qty= '$q' WHERE pid='$pid' ";
                        if (mysqli_query($con, $query) == FALSE) {
                            echo '<script>alert("Failed to add item to cart. Try again.")</script>';
                        }
                    } else {

                        //Implies adding first time to cart
                        $query = "INSERT INTO cart (u_id,pid,pname,price,qty) VALUES('$id','$pid','$pname','$price','1')";
                        if (mysqli_query($con, $query) == FALSE) {
                            echo $query;
                            echo mysqli_error($con);
                        }
                    }
                } else {
                    echo "Sorry, couldn't connect to the database: " . mysqli_error($con);
                }
            }
            if (isset($_POST['query'])) {
                session_start();
                $pid = $_POST["query"];
                echo $pid;
                $_SESSION['pid'] = $pid;
                ?>
                <script>
                    document.location = 'query.php';
                </script>
                <?php
            }

            ?>


        </div>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>