<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Dashboard</title>
</head>
<body>
	<?php  
	include("../include/header.php");
	include("../include/connection.php");
	$user=$_SESSION['pharmacy']; /*admin is*/
	$ad=mysqli_query($connect, "select Hospital_Id from pharmacy where Pharmacy_Id ='$user'");
	$hospital_data = mysqli_fetch_assoc($ad);
    $hospital_id = $hospital_data['Hospital_Id']; /*hospital id*/
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php 
						include('sidenav.php');
					 ?>
				</div>
				<div class="col-md-10">
					<h4 class="my-2">Pharmacy DashBoard</h4>
					<div class="col-md-12 my-1">
						<div class="row">
							<div class="col-md-4 bg-info mx-2" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
									
											<h5 class="my-2 text-white" style="font-size: 30px;"></h5>
											<h5 class="text-white"></h5>
											<h5 class="text-white">Inventory</h5>
										</div>
										<div class="col-md-3">
											<a href="inventory.php">
												<i class="fa fa-user-md fa-3x my-4" style="color: white;"></i>
											</a> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 bg-success mx-2" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<!-- <h5 class="my-2 text-white" style="font-size: 30px;"></h5> -->
											<h5 class="text-white">View</h5>
											<h5 class="text-white">Orders</h5>
										</div>
										<div class="col-md-3">
											<a href="orders.php">
												<i class="fa fa-user-tie fa-3x my-4" style="color: white;"></i>
											</a> 
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-4 bg-success mx-2" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
									
											<h5 class="my-2 text-white" style="font-size: 30px;"></h5>
											<h5 class="text-white"></h5>
											<h5 class="text-white">Profile</h5>
										</div>
										<div class="col-md-3">
											<a href="profile.php">
												<i class="fa fa-user-md fa-3x my-4" style="color: white;"></i>
											</a> 
										</div>
									</div>
								</div>
							</div>
							
							
							
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>