<?php
include "connection.php";
if(isset($_POST['submit_login_company'])){
	// echo "in if";
	$company_emailid = $_POST['company_emailid'];
	$company_password = $_POST['company_password'];
	$query = mysqli_query($con, "SELECT * FROM companies_details WHERE company_emailid = '$company_emailid' AND company_password = '$company_password'") or die(mysqli_error($con));;
	$num_rows = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	if($num_rows > 0){
		$_SESSION["id"] = $row['company_id'];
		$_SESSION["success"] = 'You are now logged in';
		echo $row['company_id'];
		?>
		<script>
			alert('Successfully logged in');
			document.location = 'index.php';
		</script>
		<?php
	}else{
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
<script type="text/javascript">
	function valform() {
		var pass = document.form1.login_password.value;
		var email = document.form1.login_email.value;

		if (email == null || email == "") {
			alert("Email can't be blank");
			return false;
		}

		if (pass == null || pass == "") {
			alert("Password can't be blank");
			return false;
		}

	}
</script>


<body>
	<div class="form1">
		<h3>Login</h3>
		<form method="post" name='form' onsubmit="return valform()">
			<table>
				<tr>
					<td><label>Email Id</label></td>
					<td><input type="email" required name="company_emailid"></td>
				</tr>

				<tr>
					<td><label>Password</label></td>
					<td><input type="password" required name="company_password"></td>
				</tr>
			</table>
			<div><button type="submit" class="btn btn1" name="submit_login_company">Login</button></div>
			<a href="registration.php">Not a member? Sign Up</a>

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