<?php 
session_start();
include("include/connection.php");

if(isset($_POST['create'])){
    $name=$_POST['name'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $address=$_POST['address'];
    $pass=$_POST['pass'];
    $con_pass=$_POST['con_pass'];

    $error = array();

    if(empty($name)){
        $error['ac']="Enter Name";
    }
    else if (empty($birthday)) {
        $error['ac']="Enter Birthday";
    }
    else if (($gender=="")) {
        $error['ac']="Select Gender";
    }
    else if (empty($email)) {
        $error['ac']="Enter Email";
    }
    else if (empty($contact)) {
        $error['ac']="Enter Contact";
    }
    else if (($state=="")) {
        $error['ac']="Select State";
    }
    else if (empty($city)) {
        $error['ac']="Enter City";
    }
    else if (empty($pincode)) {
        $error['ac']="Enter Pincode";
    }
    else if (empty($address)) {
        $error['ac']="Enter Address";
    }
    else if (empty($pass)) {
        $error['ac']="Enter Password";
    }
    else if ($con_pass != $pass) {
        $error['ac']="Passwords do not match!";
    }

    if(count($error)==0){
        // Check if email already exists
        $check_email_query = "SELECT * FROM patient WHERE Email='$email'";
        $check_email_result = mysqli_query($connect, $check_email_query);
        if(mysqli_num_rows($check_email_result) > 0){
           # $error['ac'] = "Email already exists!";
        	echo "<script>alert('Email alredy exists')</script>";
        } else {
            // Insert new patient into database
            $insert_query = "INSERT INTO patient (Name, DOB, Gender, Email, Contact, State, City, Pincode, residential_address, Password) VALUES ('$name', '$birthday', '$gender', '$email', '$contact', '$state', '$city', '$pincode', '$address', '$pass')";
            $insert_result = mysqli_query($connect, $insert_query);
            if($insert_result){
                echo "<script>alert('Account created successfully!')</script>";
                // Redirect to patient login page
                header("Location: patientlogin.php");
                exit();
            } else {
                #error['ac'] = "Failed to create account. Please try again.";
                echo "<script>alert('Failed to create account. Please try again.')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="background-image:url(img/accountPg.jfif);background-repeat: no-repeat;background-size: cover;">

	<?php 
	include("include/header.php");
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-2 jumbotron">
	 				<h5 class="text-center text-info my-2">Create Account
	 				</h5>
	 				<form method="post">
	 					<div class="">
	 						<?php
	 						if(isset($error['patint'])){
	 							$sh=$error['patient'];
	 							$show="<h4 class='alert alert-danger'>$sh</h4>";
	 						}else{
	 							$show="";
	 						}

	 						echo $show;
	 						?>
	 					</div>
	 					<div class="form-group">
	 						<label>Name</label>
	 						<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Enter Name">
	 					</div>
	 					<div class="form-group">
	 						<label>Birthday</label>
	 						<input type="date" name="birthday" class="form-control" autocomplete="off" placeholder="Enter Birthday">
	 					</div>
	 					<div class="form-group">
	 						<label>Gender</label>
	 						<select name="gender" class="form-control">
	 							<option value="">Select your Gender</option>
	 							<option value="Male">Male</option>
	 							<option value="Female">Female</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Email</label>
	 						<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
	 					</div>
	 					<div class="form-group">
	 						<label>Contact Number</label>
	 						<input type="number" name="contact" class="form-control" autocomplete="off" placeholder="Enter Contact Number">
	 					</div>
	 					
	 					<div class="form-group">
	 						<label>State</label>
	 						<select name="state" class="form-control">
	 							<option value="">Select your State</option>
	 							<option value="Maharashtra">Maharashtra</option>
	 							<option value="Karnataka">Karnataka</option>
	 							<option value="Kerala">Kerala</option>
	 							<option value="TamilNadu">TamilNadu</option>
	 							<option value="Telangana">Telangana</option>
	 							<option value="Goa">Goa</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>City</label>
	 						<input type="text" name="city" class="form-control" autocomplete="off" placeholder="Enter City">
	 					</div>
	 					<div class="form-group">
	 						<label>Pincode</label>
	 						<input type="number" name="pincode" class="form-control" autocomplete="off" placeholder="Enter Pincode">
	 					</div>
	 					<div class="form-group">
	 						<label>Residential Address</label>
	 						<input type="text" name="address" class="form-control" autocomplete="off" placeholder="Enter Residential Address">
	 					</div>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control"autocomplete="off" placeholder="Enter Password">
	 					</div>
	 					<div class="form-group">
	 						<label>Confirm Password</label>
	 						<input type="password" name="con_pass" class="form-control"autocomplete="off" placeholder="Enter Confirm Password">
	 					</div>
	 					<input type="submit" name="create" value="Create Account" class="btn btn-success">
	 					<p>Already have an account?<a href="patientlogin.php">Click here.</a></p>

	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>