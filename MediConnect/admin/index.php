<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		.card {
			border: none;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}
		.card-body {
			padding: 20px;
		}
		.card-icon {
			font-size: 3em;
			margin-bottom: 10px;
			color: white;
		}
		.card-title {
			font-size: 1.5em;
			margin-bottom: 10px;
		}
		.card-text {
			font-size: 1em;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<?php 
	include("../include/header.php");
	include("../include/connection.php");
	$user=$_SESSION['admin'];
	$ad=mysqli_query($connect, "select Hospital_Id from admin where admin_id ='$user'");
	$hospital_data = mysqli_fetch_assoc($ad);
    $hospital_id = $hospital_data['Hospital_Id'];
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php
					include('sidenav.php');
				?>
			</div>
			<div class="col-md-10">
				<h4 class="my-2">Admin DashBoard</h4>
				<div class="row">
					<div class="col-md-4">
						<div class="card bg-success text-white">
							<div class="card-body text-center">
								<a href='admin.php'><i class="fas fa-user-tie card-icon"></i></a>
								<h5 class="card-title">Total Admins</h5>
								<p class="card-text"><?php echo $numad = mysqli_num_rows(mysqli_query($connect, "select * from admin where Hospital_id ='$hospital_id'")); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-info text-white">
							<div class="card-body text-center">
								<a href="doctors.php"><i class="fas fa-user-md card-icon"></i></a>
								<h5 class="card-title">Total Doctors</h5>
								<p class="card-text"><?php echo $numdoc = mysqli_num_rows(mysqli_query($connect, "select * from doctor where hospital_id ='$hospital_id'")); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-warning text-white">
							<div class="card-body text-center">
								<a href="appointments.php"><i class="fas fa-bed card-icon"></i></a>
								<h5 class="card-title">Total Appointments</h5>
								<p class="card-text"><?php echo $numapt = mysqli_num_rows(mysqli_query($connect, "select * from Appointment where hospital_id ='$hospital_id'")); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-danger text-white">
							<div class="card-body text-center">
								<a href="equipmentorders.php"><i class="fas fa-box card-icon"></i></a>
								<h5 class="card-title">Total Orders</h5>
								<p class="card-text"><?php echo $numorders = mysqli_num_rows(mysqli_query($connect, "select * from euipment_orders where admin_id ='$user'")); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-warning text-white">
							<div class="card-body text-center">
								<a href="pharmacyorder.php"><i class="fas fa-flag card-icon"></i></a>
								<h5 class="card-title">Total Pharmacy Orders</h5>
								<p class="card-text">0</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card bg-success text-white">
							<div class="card-body text-center">
								<i class="fas fa-money-check-alt card-icon"></i>
								<h5 class="card-title">Total Income</h5>
								<p class="card-text">0</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>