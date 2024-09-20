<?php  
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	if(empty($username)){
		$error['doctor']="Enter Username";
	}else if(empty($password)){
		$error['doctor']="Enter Password";
	}

	if(count($error)==0){
		$query = "select * from doctor where Doctor_Id='$username' and password='$password'";
		$result=mysqli_query($connect, $query);

		if(mysqli_num_rows($result)==1){
			echo "<script>alert('You have logged in as a doctor')</script>";
			$_SESSION['doctor']=$username;
			header("Location: doctor/index.php");
			exit();
		}else{
			echo "<script>alert('Invalid Username or Password')</script>";
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
</head>
<body>
	<?php 
		include("include/header.php");
	 ?>
	 <div style="margin-top: 20px;"></div>
	 <div class="container">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 jumbotron">
	 				<img src="img/admin.jpg" class="col-md-12">
	 				<form method="post" class="my-2">

	 					<div class="">
	 						<?php
	 						if(isset($error['doctor'])){
	 							$sh=$error['doctor'];
	 							$show="<h4 class='alert alert-danger'>$sh</h4>";
	 						}else{
	 							$show="";
	 						}

	 						echo $show;
	 						?>
	 					</div>

	 					<div class="form-group">
	 						<label>Doctor ID</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Doctor ID">
	 					</div>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control">
	 					</div>
	 					<input type="submit" name="login" class="btn btn-success" value="Login">
	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>