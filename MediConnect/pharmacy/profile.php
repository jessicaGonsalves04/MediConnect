<?php
session_start();
include("../include/connection.php");
$user=$_SESSION['pharmacy']; /*admin is*/

// Retrieve patient details from the database

$query = "SELECT * FROM pharmacy WHERE Pharmacy_Id = '$user'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $name = $row['P_name'];
    $state = $row['p_State'];
    $city = $row['p_City'];
    $hid= $row['Hospital_Id'];
    
    $query1 = "SELECT Name FROM hospital WHERE Hospital_Id = '$hid'";
    $result1 = mysqli_query($connect, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $hname = $row1['Name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Profile</title>
    <style>
        .jumbotron {
            background-color: gray; /* Light gray */
            padding: 20px;
            border-radius: 10px;
        }
        body {
            background-color: gray; /* Gray background */
        }
    </style>
</head>
<body>
    <?php include("../include/header.php"); ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                    include("sidenav.php");
                    include("../include/connection.php");
                     ?>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info my-2">Pharmacy Profile</h5>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" style="background-color: lightgray;" readonly>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $state; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" style="background-color: lightgray;"  class="form-control" value="<?php echo $city; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Hospital</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $hname; ?>" readonly>
                    </div>
                    
                    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
