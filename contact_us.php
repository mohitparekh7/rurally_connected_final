<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Clothing website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
	<style type="text/css">
		body{
			background-image: url('images/bg11.jpg');
			background-position: center;
		}
		.navbar{
			background-color: black;
			margin-bottom: 20px;
			padding: 10px;
		}

		.navbar img{
	      width: 20%;
	    }


		.nav-item{
			padding-left: 10px;
			padding-right: 10px;
		}

		a:link , a:visited{
			color: #f3d8e6;
			font-size: 16px;
		}

		a:hover, a:active{
			color: white;
		}

		.dropdown-menu{
			background-color: black;
		}

		.form1{
			margin-top: 20px;
			background-color: #faeaf3;
			width: 40%;
			margin: auto;
			display: block;
			padding: 25px;
			margin-bottom: 40px;
		}

		td{
			padding: 10px;
		}

		.btn1{
			background-color:#c33c82;
			color: white;
			width: 30%;
			margin: auto;
			display: block;
			margin-top: 10px;
			margin-bottom: 20px
		}

		.btn1:hover{
			background-color: #404040;
		}

		footer .fa{
        padding: 15px;
        font-size: 20px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 5px;
        border-radius: 50%;
    	}


		.t2{
	      background-color: #c33c82;
	      padding: 0.5px;
	      margin-bottom: 20px;
	      width: 40%;
	      margin: auto;
	      display: block;
	      margin-bottom: 25px;
	    }

	    footer .fa hover{
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

	    footer{
	      margin-top: 30px;
	      color: white;
	      background-color: #353135;
	    }

	    footer p{
	      font-size: 14px;
	    }
	</style>


<body>
	<?php
	include("header.php");
	?>

	<div class="form1">
	<form method="post"  name="register">
	<table>
		<tr>
			<td><label>Full Name:</label></td>
			<td><input type="varchar" name="contact_name" value=""></td>
		</tr>
		<tr>
			<td><label>Email Id:</label></td>
			<td><input type="varchar" name="contact_emailid" value=""></td>
		</tr>
		<tr>
			<td><label>Mobile Number:</label></td>
			<td><input type="int" name="contact_mobilenumber" value=""></td>
		</tr>
		<tr>
			<td><label>Your query/feedback:</label></td>
			<td><textarea rows="4" cols="23" name="feedback" value=""></textarea></td>
		</tr>
		</table>
			<button type="submit" class="btn btn1" name="submit_contactus">Send</button>
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