<?php
include("connection.php");
?>

<div id="special">
    <div style="text-align: center; margin-bottom: 20px; font-size: 25px;background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.20);">
        <h3 style="color:#c33c82; padding: 10px; font-family: 'Merriweather', serif;">Trainers</h3>
    </div>
    <div class="container" style="width:95%; margin: auto;">
        <div class="row sp">
            <?php
            $product = mysqli_query($con, "SELECT * FROM trainer ");
            if (!empty($product)) {
                while ($row = mysqli_fetch_array($product)) {
            ?>
                    <div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <?php
                                echo '<img class="card-img-top shop-item-image" src="data:image/jpeg;base64,' . base64_encode($row['trainer_img']) . '"/>';
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title shop-item-title"><?php echo $row['trainer_name'] ?></h5>
                                    <p class="card-text"><b>Bio: </b><?php echo $row['trainer_desc']; ?></p>

                                    <p class="card-text"><b>Key Skills: </b><?php echo $row['trainer_skills'] ?></p>

                                    <centre><button class="btn shop-item-button" type="submit" value="<?php echo $row["trainer_id"] ?>" name="query">Contact Now</button></centre>
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