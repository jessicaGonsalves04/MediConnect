<?php
session_start();
include("../include/connection.php");

// Retrieve patient details from the database
$patient_id = $_SESSION['patient'];
$query = "SELECT * FROM patient WHERE Patient_ID = '$patient_id'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $birthday = $row['DOB'];
    $gender = $row['Gender'];
    $email = $row['Email'];
    $contact = $row['contact'];
    $state = $row['State'];
    $city = $row['City'];
    $pincode = $row['Pincode'];
    $address = $row['Residential_address'];
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
                    <h5 class="text-center text-info my-2">Patient Profile</h5>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" style="background-color: lightgray;" readonly>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $birthday; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" style="background-color: lightgray;"  class="form-control" value="<?php echo $gender; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $contact; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $state; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $city; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pincode</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $pincode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Residential Address</label>
                        <input type="text" style="background-color: lightgray;" class="form-control" value="<?php echo $address; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
