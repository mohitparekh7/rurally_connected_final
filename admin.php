<?php
session_start();
include("connection.php");

if (isset($_POST['submit_login_admin'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $query = mysqli_query($con, "SELECT * FROM admin_details WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
    $num_rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if ($num_rows > 0) {
        $_SESSION["id"] = $row['admin_id'];
        $_SESSION["username"] = $row['admin_username'];
        $_SESSION["success"] = 'You are now logged in';
        echo $row['admin_username'];
?>
        <script>
            alert('Successfully logged in');
            window.location = 'dashboard.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid Username or Password');
        </script>
<?php
    }
}
?>

<?php
include("header.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
    body {
        background-image: url('images/bg11.jpg');
        background-position: right;
    }

    .navbar {
        background-color: black;
        margin-bottom: 20px;
        padding: 10px;
    }

    .navbar img {
        width: 20%;
    }

    .nav-item {
        padding-left: 10px;
        padding-right: 10px;
    }

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

    .form1 {
        background-color: #faeaf3;
        width: 40%;
        margin: auto;
        display: block;
        padding: 20px;
        margin-top: 30px;
        text-align: center;
    }

    h3 {
        margin-bottom: 15px;
    }

    label {
        font-weight: 500;
        margin-left: 20px;
    }

    input {
        border: none;
        background: white;
        width: 100%;
        margin-bottom: 5px;
        margin-left: 60px;
    }

    td {
        padding: 10px;
    }

    .btn1 {
        background-color: #c33c82;
        color: white;
        width: 30%;
        margin: auto;
        display: block;
        margin-top: 10px;
        margin-bottom: 20px
    }

    .btn1:hover {
        background-color: #404040;
    }

    .form1 a {
        color: black;
    }

    footer .fa {
        padding: 15px;
        font-size: 20px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 5px;
        border-radius: 50%;
    }

    .t2 {
        background-color: #c33c82;
        padding: 0.5px;
        margin-bottom: 20px;
        width: 40%;
        margin: auto;
        display: block;
        margin-bottom: 25px;
    }

    footer .fa hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-instagram {
        background: #e95950;
        color: white;
    }

    footer {
        margin-top: 30px;
        color: white;
        background-color: #353135;
    }

    footer p {
        font-size: 14px;
    }
</style>

<body>
    <div class="form1">
        <h3>Admin Login</h3>
        <form method="post" name='form' onsubmit="return valform()">
            <table>
                <tr>
                    <td><label>Username: </label></td>
                    <td><input type="text" required name="admin_username"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" required name="admin_password"></td>
                </tr>
            </table>
            <div><button type="submit" class="btn btn1" name="submit_login_admin">Login</button></div>
        </form>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>