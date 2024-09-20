<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctors</title>
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
	 							<h5 class="text-center">All Appointments</h5>

	 							<?php 
	 							$ad=$_SESSION['admin'];
	 							$user=$_SESSION['admin'];
								$ad=mysqli_query($connect, "select Hospital_Id from admin where admin_id ='$user'");
								$hospital_data = mysqli_fetch_assoc($ad);
   								$hospital_id = $hospital_data['Hospital_Id'];
	 							$query="select * from appointment  where Hospital_Id= '$hospital_id'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Appointment ID</th>
	 								<th>Date</th>
	 								<th>Time</th>
	 								<th>Patient ID</th>
	 								<th>Doctor ID</th>
	 								<th>Status</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='5' class='text-center'>No appointments</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$aid=$row['Appointment_Id'];
	 								$d=$row['Date'];
	 								$t=$row['Time'];
	 								$st=$row['Status'];
	 								$did=$row['Doctor_Id'];
	 								$pid=$row['Patient_Id'];
	 								$output.="
	 								<tr>
	 									<td>$aid</td>
	 									<td>$d</td>
	 									<td>$t</td>
	 									<td>$pid</td>
	 									<td>$did</td>
	 									<td>$st</td>
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