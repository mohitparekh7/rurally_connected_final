<?php
session_start();
include("connection.php");
extract($_REQUEST);
if (isset($_SESSION['id'])) {
    header("location:myproducts.php");
}
if (isset($login)) {
    $sql = mysqli_query($con, "select * from vendor where vendor_email='$username' && vendor_password='$pswd' ");
    if (mysqli_num_rows($sql)) {
        $_SESSION['id'] = $username;
        header('location:myproducts.php');
    } else {
        $admin_login_error = "Invalid Username or Password";
		echo mysqli_error($con);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rurally Connected</title>
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
	<?php
	include("header.php");
	?>

	<div class="form1">
		<h3>Beneficiary Login</h3>
		<form method="post" name='form' onsubmit="return valform()">
			<table>
				<tr>
					<td><label for="username">Username:</label></td>
					<td><input type="text" id="username" placeholder="Enter Username" required name="username"></td>
				</tr>

				<tr>
					<td><label for="pwd">Password:</label></td>
					<td><input type="password" id="pwd" placeholder="Enter password" required name="pswd"></td>
				</tr>
			</table>
			<div><button type="submit" class="btn btn1" name="login">Login</button></div>
			<a href="vendor_signup.php">Not a verified vendor? Sign Up</a>

		</form>
	</div>


	<?php
	include("footer.php");
	?>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>