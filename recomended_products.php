<?php
include("connection.php");
?>

<div id="special">
<div style="text-align: center; margin-bottom: 20px; font-size: 25px;background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.20);">
        <h3 style="color:#c33c82; padding: 10px; font-family: 'Merriweather', serif;"> Recomended Products</h3>
    </div>
  <div class="container" style="width:100%; margin: auto;">
    <div class="row sp">
      <?php
      
      $company = mysqli_query($con,"SELECT * FROM companies_details");
      $companyrow = mysqli_fetch_array($company);
      $c_category = $companyrow['company_category'];
      $product = mysqli_query($con, "SELECT * FROM product WHERE p_category='$c_category'");
      if (!empty($product)) {
        while ($row = mysqli_fetch_array($product)) {
      ?>
          <div>
            <div class="col-lg-4">
              <div class="card" style="width: 18rem;">
                <?php
                echo '<img class="card-img-top shop-item-image" src="data:image/jpeg;base64,' . base64_encode($row['p_img']) . '"/>';
                ?>
                <div class="card-body">
                  <h5 class="card-title shop-item-title"><?php echo $row['p_name'] ?></h5>
                  <div class="shop-item-details">
                    <p class="shop-item-price"><?php echo "Rs " . $row['p_price'] ?></p>
                  </div>
                  <p class="card-text"><?php echo $row['p_desc']; ?></p>
                  <centre><button class="btn shop-item-button" type="submit" value="<?php echo $row["p_id"] ?>" name="add">Add to cart</button></centre>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "No Records.";
      }
      ?>

    </div>
  </div>
</div>