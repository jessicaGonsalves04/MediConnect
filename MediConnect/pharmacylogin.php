<?php  
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	if(empty($username)){
		$error['pharmacy']="Enter User ID";
	}else if(empty($password)){
		$error['pharmacy']="Enter Password";
	}

	if(count($error)==0){
		$query = "select * from pharmacy where Pharmacy_Id='$username' and pharma_password='$password'";
		$result=mysqli_query($connect, $query);

		if(mysqli_num_rows($result)==1){
			echo "<script>alert('You have logged in sccesflly')</script>";
			$_SESSION['pharmacy']=$username;
			header("Location: pharmacy/index.php");
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
	<title>Pharmacy Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

	 <--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
	
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
	 				<img src="img/logo.png" class="col-md-12">
	 				<form method="post" class="my-2">

	 					<div class="">
	 						<?php
	 						if(isset($error['pharmacy'])){
	 							$sh=$error['pharmacy'];
	 							$show="<h4 class='alert alert-danger'>$sh</h4>";
	 						}else{
	 							$show="";
	 						}

	 						echo $show;
	 						?>
	 					</div>

	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
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