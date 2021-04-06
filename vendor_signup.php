<?php
include "connection.php";
if (isset($_POST['submit_register_benef'])) {
	$benef_name = $_POST['benef_name'];
	$benef_address = $_POST['benef_address'];
	$benef_emailid = $_POST['benef_emailid'];
	$benef_mobilenumber = $_POST['benef_mobilenumber'];
	$benef_password1 = $_POST['benef_password1'];
	$benef_password2 = $_POST['benef_password2'];
	$benef_location = $_POST['benef_location'];
	$benef_category = $_POST['benef_category'];

	if ($benef_password1 != $benef_password2) {
?>
		<script type="text/javascript">
			alert("The passwords do not match");
		</script>
	<?php
	} else {
		$query = "INSERT INTO beneficiaries_details(benef_name,benef_address,benef_emailid,benef_mobilenumber,benef_password,benef_location,benef_category) 
		VALUES ('$benef_name','$benef_address','$benef_emailid','$benef_mobilenumber','$benef_password1','$benef_location','$benef_category')";
		// echo $query;
		mysqli_query($con, $query) or die(mysqli_error($con));
	?>
		<script type="text/javascript">
			window.location = 'index.php';
			alert("Successfully Added.");
		</script>
<?php
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
		background-position: center;
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

	.forms {
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
	}

	input {
		border: none;
		background: white;
		width: 100%;
		margin-bottom: 5px;
		margin-left: 30px;
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

	.forms a {
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

<script type="text/javascript">
	function validate() {
		var name = document.form1.user_name.value;
		var address = document.form1.user_address.value;
		var mob = document.form1.user_mobilenumber.value;
		var p1 = document.form1.password1.value;
		var p2 = document.form1.password2.value;
		var email = document.form1.user_emailid.value;

		if (email == null || email == "") {
			alert("Email can't be blank");
			return false;
		}
		if (name == null || name == "") {
			alert("Name can't be blank");
			return false;
		}
		if (address == null || address == "") {
			alert("address can't be blank");
			return false;
		}
		if (mob == null || mob == "") {
			alert("Mobile can't be blank");
			return false;
		}
		if (p1 == null || p1 == "") {
			alert("Password can't be blank");
			return false;
		}
		if (p2 == null || p2 == "") {
			alert("Confirm Password can't be blank");
			return false;
		}


	}
</script>

<body>
	<?php
	include("header.php");
	?>
	<div class="forms">
		<h3>Beneficiary Registration</h3>
		<form method="post" name="register">
			<table>
				<tr>
					<td>
						<label>Full Name</label>
					</td>
					<td>
						<input type="text" name="benef_name" required>
					</td>
				</tr>

				<tr>
					<td>
						<label>Address</label>
					</td>
					<td>
						<input type="varchar" name="benef_address" required>
					</td>
				</tr>
				<tr>
					<td><label>Email Id</label></td>
					<td><input type="email" name="benef_emailid" required></td>
				</tr>
				<tr>
					<td><label>Mobile Number</label></td>
					<td><input type="int" name="benef_mobilenumber" required></td>
				</tr>

				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="benef_password1" required></td>
				</tr>

				<tr>
					<td><label>Confirm Password</label></td>
					<td><input type="password" name="benef_password2" required></td>
				</tr>
				<tr>
					<td><label>Location</label></td>
					<td><input type="text" name="benef_location" required></td>
				</tr>
				<tr>
					<td><label>Category</label></td>
					<td>
						<select name="benef_category" id="benef_category">
							<option value="" selected>None</option>
							<option value="farmwaste">Farmwaste</option>
							<option value="handicraft">Handicraft</option>
							<option value="farmproduce">Farm Produce</option>
							<option value="pottery">Pottery</option>
						</select>
					</td>
				</tr>

			</table>
			<div><button type="submit" class="btn btn1" name="submit_register_benef">REGISTER</button></div>

			<a href="login.php">Already a member? Login</a>
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
<?php
include("connection.php");
if (isset($_POST['submit_register'])) {
	$user_name = $_POST['user_name'];
	$user_address = $_POST['user_address'];
	$user_emailid = $_POST['user_emailid'];
	$user_mobilenumber = $_POST['user_mobilenumber'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if ($password1 != $password2) {
?>
		<script type="text/javascript">
			alert("The passwords do not match");
		</script>
	<?php
	} else {
		$query = "INSERT INTO user_details(user_name,user_address,user_emailid,user_mobilenumber,user_password) VALUES ('$user_name','$user_address','$user_emailid','$user_mobilenumber','$password1')";
		mysqli_query($con, $query) or die('Error in updating database');

		// 	
	?>
		// <script type="text/javascript">
			window.location = 'login.php';
			alert("Successfully Added.");

			// 		
		</script>
		// <?php
		}
	}
			?>