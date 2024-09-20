<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Schedule</title>
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
	 							<h5 class="text-center">Scheduled Appointments</h5>

	 							<?php 
	 							$pid=$_SESSION['patient'];
	 							$query="select * from appointment where Patient_Id = '$pid' and status != 'Completed'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Doctor</th>
	 								<th>Date</th>
	 								<th>Time</th>
	 								<th>Hopsital</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='4' class='text-center'>No doctors</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$did=$row['Doctor_Id'];
	 								$date=$row['Date'];
	 								$Time=$row['Time'];
	 								$hid=$row['Hospital_Id'];
	 								$q1="select Name from hospital where Hospital_Id='$hid'";
	 								$res1=mysqli_query($connect, $q1);
	 								$r1=mysqli_fetch_array($res1);
	 								$hname=$r1['Name']; 
	 								$q2="select name from doctor where Doctor_Id='$did'";
	 								$res2=mysqli_query($connect, $q2);
	 								$r2=mysqli_fetch_array($res2);
	 								$doc=$r2['name']; 

	 								$output.="
	 								<tr>
	 									<td>$doc</td>
	 									<td>$date</td>
	 									<td>$Time</td>
	 									<td>$hname</td>
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