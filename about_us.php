<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jade</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
  <style type="text/css">
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

    .ab{
      width: 75%;
      margin-bottom: 50px;
    }

    h2{
      text-align: center;
      font-family: 'Poppins', sans-serif;
      margin-bottom: 10px;
      font-weight: 900;
      font-size: 30px;
      color: #c33c82;
      letter-spacing: 1.5px;
    }

    .t1{
      background-color: #c33c82;
      padding: 0.5px;
      margin-bottom: 20px;
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

    .im{
      width: 100%;
    }

    .im img{
      padding: 25px;
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

  <div class="container ab">
  <h2>About Us</h2>

   <p> Jade is a clothing e-commerce website that provides a very smooth hassle free 
       shopping experience to the users across the country. 
       We aim at providing latest trends to our customers.
       All our products are fully authentic, we also provide various payment options such as cash 
       on delivery, UPI payment and credit/debit card payment. We have a 30 day return policy and a
       team available 24x7 to answer all customer queries. Our website understands customer needs and 
       provides them with famous international brands such as Levis, Nike, Puma, etc all on one 
       platform for comfortable shopping.
   </p>
</div>
<div class="t1"></div>

<div class="container im">
  <h2>Brands</h2>
  <div class="row">
    <div class="col-md-3">
      <div class="thumbnail">
            <img src="./images/nike.jpg" style="width:100%">
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumbnail">
          <img src="./images/levis.jpg" style="width:100%"> 
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumbnail">
          <img src="./images/puma.jpg" style="width:100%">
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumbnail">
            <img src="./images/zara.jpg" style="width:100%">   
      </div>
    </div>
  </div>
</div>


  <?php
  include("footer.php");
  ?>
</body>

<script src="./images/https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="./images/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./images/https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>