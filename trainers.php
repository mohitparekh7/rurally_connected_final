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


        .card img {
            height: 58%;
        }

        .card-title {
            font-size: 16px;
        }

        .card-text {
            /* font-style: italic; */
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
    include('header.php');
    ?>

    <div>
        <?php
        include("trainers_all.php");
        ?>
    </div>


    <?php
    if (isset($_POST['query'])) {
        session_start();
        $tid = $_POST["query"];
        echo $tid;
        $_SESSION['tid'] = $id;
    ?>
        <script>
            document.location = 'query.php';
        </script>
    <?php
    }

    ?>
    <?php
    include('footer.php');
    ?>
</body>

</html>