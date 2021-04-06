<?php
    session_start();
    include("connection.php");
    $id = $_SESSION['id'];
 ?>

<DOCTYPE html>
    <head>
        <title> My Cart </title>
    </head>
    <body>
    <?php	
            
            if(isset($_POST['inc'])) 
            {
               
                    global $con;
                    $pid=$_POST["inc"];
                    $res= mysqli_query($con,"SELECT * FROM cart WHERE pid='$pid' ");
                    $row=mysqli_fetch_row($res);
                    $price=$row[2]; //price
                    $pname=$row[1]; //pname
                    $qty=$row[3]; //quantity
                    $qty = $qty + 1;
                    $query = " UPDATE cart SET qty= '$qty' WHERE pid='$pid' ";
                    if(mysqli_query($con, $query)==FALSE)
                        
                        {
                        echo '<script>alert("Failed to add item to cart. Try again.")</script>';  
                        }
                    }
                    
                if(isset($_POST['remove'])) 
                {

                    global $con;               
                    $pid=$_POST["remove"];
                    $res= mysqli_query($con,"SELECT * FROM cart WHERE pid='$pid' ");
                    $row=mysqli_fetch_row($res);
                    $price=$row[2]; //price
                    $pname=$row[1]; //pname
                    $qty=$row[3];
                            
                    if ($qty > 0) {
                        $qty = $qty - 1;
                        $query = " UPDATE cart SET qty= '$qty' WHERE pid='$pid' ";
                        if(mysqli_query($con, $query)==FALSE)  
                            {  
                            echo '<script>alert("Quantity reduction Failed.")</script>';  
                            }  
                    if ($qty == 0)
            
                        {
                             $query = "DELETE FROM cart WHERE pid='$pid'";
        
                            if(mysqli_query($con, $query))  
                            { 
                                echo '<script>alert("Failed to delete item from cart. Try again.")</script>';
                            } else{
                            echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                            }  
                        }
                    }   
                    
            }  
                     if(isset($_POST['delete'])) {

                        global $con;               
                        $pid=$_POST["delete"];
                        $res= mysqli_query($con,"SELECT * FROM cart WHERE pid='$pid' ");
                        $row=mysqli_fetch_row($res);
                        if (!empty($row))
                        {
                        $price=$row[2]; //price
                        $pname=$row[1]; //pname
                        $qty=$row[3];
                        }

                        // sql to delete a record
                            $query = "DELETE FROM cart WHERE pid='$pid'";
                       
                            if(mysqli_query($con, $query)==FALSE)  
                               
                                {
                                echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                                 }
                            }

                        if(isset($_POST['empty'])){

                            $query = "DELETE FROM cart ";
                       
                            if(mysqli_query($con, $query)==FALSE)  
                                {  
                                
                                echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                                 }
                        }
                        ?>

                        <?php
                         include("header.php");
                         ?>
                                      
                        <div id="special">
                            <div style="text-align: center; margin-bottom: 20px; font-size: 25px;background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.20);">
                                    <h3 style="color: #ff3030; padding: 10px; font-family: 'Merriweather', serif;">My Cart</h3>
                            </div>
                            <?php 

                            //Indices: pid-0,pname-1,price-2,qty-3,vendor-4
                            $total_quantity=0;
                            $total_price=0;
                            $res = mysqli_query($con,"SELECT * from cart");
                            if (!empty($res)) { 
                                while ($row=mysqli_fetch_array($res)) {
                                    if ($row[3]>0){
                                        $item_price = $row[3]*$row[2];
                                        $image_query= mysqli_query($con,"SELECT * from product where p_id= '$row[0]'");
                                        $row_img=mysqli_fetch_array( $image_query)

                            ?>      

                            <form method="post">
                                
                                
                                <div class="container" >
                                    <div class="row sp">
                                        <div>
                                            <div class="card" style="width: 18rem;">
                                        
                                                <?php 
                                                echo '<img class="card-img-top shop-item-image" src="data:image/jpeg;base64,'.base64_encode( $row_img[8] ).'"/>';
                                                ?>
                                        
                                                <div class="card-body">
                                                    <h5 class="card-title shop-item-title"><?php echo $row[1]?></h5>
                                                    <div class="shop-item-details">
                                                        <p class="shop-item-price"><?php echo "Rs ".$row[2]?></p>
                                                    </div>
                                                    <p class="card-text"><?php echo $row[5]; ?></p>
                                                    <p class="card-text"><?php echo $row[4]; ?></p>
                                                    <button type="submit" value="<?php echo $row[0] ?>" name='inc'><img src="images/plus.png" width="20" height="20"/></button>
                                                    <button type="submit" value="<?php echo $row[0] ?>" name='remove'><img src="images/minus.png" width="20"  height="20"/></button>
                                                    <button type="submit" value="<?php echo $row[0] ?>" name='delete'><img src="images/icon-delete.png" width="20" height="20"/></button>
                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                                
                            <?php
                            $total_quantity += $row[3];
                            $total_price += ($row[2]*$row[3]);

                                    
                                }	
                            } 
                        }
                        
                        else 
                        { ?>
                            <div> Cart is empty! </div> 
                            <a href="#"> Find more products to add to cart!</a>
                        <?php 
                        }

                        ?>

                    <div>
                        <div>Total:</div>
                        <div> <?php echo $total_quantity; ?> </div>
                        <div> <strong><?php echo "Rs ".number_format($total_price, 2); ?></strong> </div>
                        <form method="post">
                                <div><button type="submit" name='empty' width="20" height="20">Empty Cart!</button></div>
                        </form>    
                        <br>      
                            
                        <a href="products.php" style="color: blue;">Continue Shopping </a>
                        <a href="#" style="color: blue;">Proceed to checkout</a>
                    </div>
                   
               
                <?php
                include("footer.php");
                ?>
             
        </body>
        
        </html>



