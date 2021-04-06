<?php
session_start();

include("connection.php");
extract($_REQUEST);
$arr = array();
if (isset($_GET['msg'])) {
	$loginmsg = $_GET['msg'];
} else {
	$loginmsg = "";
}
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$cquery = mysqli_query($con, "SELECT * FROM user_details where user_id ='$user_id'");
	$cresult = mysqli_fetch_array($cquery);
} else {
	$user_id = "";
}

if (isset($login)) {
	header("location:login.php");
}
if (isset($logout)) {
	session_destroy();
	header("location:index.php");
}
?>

<!DOCTYPE html>
<?php
include("header.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Rurally Connected</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	a:link,
	a:visited {
		color: #f3d8e6;
		font-size: 16px;
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

	.valign {
		position: relative;
		top: 40%;
	}

	.t1 {
		background-color: #c33c82;
		padding: 0.5px;
		margin-bottom: 20px;
	}

	.cat {
		margin-bottom: 20px;
		width: 75%;
	}

	.centered {
		position: absolute;
		top: 50%;
	}

	h3 {
		text-align: center;
		font-family: 'Poppins', sans-serif;
		margin-bottom: 0px;
		font-weight: 900;
		font-size: 30px;
		color: #c33c82;
		letter-spacing: 1.5px;
	}

	.zoom:hover img {
		transform: scale(1.1);
		/* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
	}

	.zoom {
		height: 30%;
		overflow: hidden;
		margin-bottom: 20px;
	}

	.zoom img {
		transition: transform .3s ease;
	}

	.zoom div {
		margin-top: 15px;
		text-align: center;
		font-style: italic;
	}

	.ite {
		/*background-color: black;*/
		padding: 10px;
		margin-bottom: 20px;
	}

	.item {
		margin-bottom: 20px;
	}

	.pr {
		margin-bottom: 0px;
	}

	.btn {
		background-color: #c33c82;
	}


	.deli {
		margin-top: 30px;
		background-color: #f9ebf2;
	}

	.data {
		margin-top: 12%;
		margin-bottom: 12%;
	}

	.sent {
		margin-top: 15px;
	}

	.ab {
		margin-top: 30px;
	}

	.ab p {
		margin-top: 20px;
	}

	.br {
		margin-top: 50px;
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

	.im {
		height: 450px;
		margin-bottom: 10px;
	}
</style>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="container-fluid">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner im">
							<div class="carousel-item active">
								<img class="d-block w-100" src="images/index_img1.jpg" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="images/index_img2.jpg" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="images/index_img3.jpg" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true" style="width: 30px; height: 30px; opacity: 100%;"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true" style="width: 30px; height: 30px; opacity: 100%;"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<br>
	<div class="t1">
	</div>

	<!-- <div class="ite">
		<h3>Categories</h3>
	</div>

	<div class="container cat">
		<div class="row">
			<div class="col-lg-4 zoom">
				<a href="womens1.php">
					<img src="images/cat121.jpg" class="col">
				</a>
				<div>Women</div>
			</div>
			<div class="col-lg-4 zoom">
				<a href="#">
					<img src="images/cat3.jpg" class="col">
				</a>
				<div>Kids</div>
			</div>
			<div class="col-lg-4 zoom">
				<a href="mens1.php">
					<img src="images/cat212.jpg" class="col">
				</a>
				<div>Men</div>
			</div>

		</div>
	</div>
	</div> -->

	<!-- 
	<div class="t1">
	</div> -->


	<div class="container ab">
		<h3>About Us</h3>

		<p> The project aims to motivate
			the rural youth of India to
			pursue agriculture and handicrafts,
			make their products available to
			a global audience and provide
			employment qualified individuals.
		</p>
	</div>

	<!-- <div class="container br">
		<div class="row">
			<div class="col-md-3">
				<div class="thumbnail text-center">
					<img src="./images/nike.jpg" style="width:60%">
				</div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail text-center">
					<img src="./images/levis.jpg" style="width:60%">
				</div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail text-center">
					<img src="./images/puma.jpg" style="width:60%">
				</div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail text-center">
					<img src="./images/zara.jpg" style="width:60%">
				</div>
			</div>
		</div>
	</div> -->



	<?php
	include("footer.php")
	?>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>