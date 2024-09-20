<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
</head>
<body>
    <?php 
    include("../include/header.php");
     ?>
     <div class="contaier-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                    include("sidenav.php");
                    include("../include/connection.php");
                     ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Medicine Inventory</h5>

                                <?php 
                                $phid=$_SESSION['pharmacy'];
                                $query="select * from medicine_inventory natural join medicine where Pharmacy_id='$phid'";
                                $res=mysqli_query($connect, $query);

                                $output="<table class='table table-bordered'>
                                <tr>
                                    <th>Id</th>
                                    <th>Medicine</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>";
                                if(mysqli_num_rows($res)<1){
                                    $output.="<tr><td colspan='5' class='text-center'>No doctors</td></tr>";
                                }
                                while($row=mysqli_fetch_array($res)){
                                    $mid=$row['Medicine_id'];
                                    $name=$row['med_Name'];
                                    $qty=$row['Quantity'];
                                    $pr=$row['price'];
                                    $stock=$row['Stock'];
                                    
                                   
                                    
                                    $output.="
                                    <tr>
                                        <td>$mid</td>
                                        <td>$name</td>
                                        <td>$qty</td>
                                        <td>$pr</td>
                                        <td>$stock</td>
                                    ";

                                }
                                $output.="</tr></table>";
                                echo $output;
                                 ?>

                                
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>