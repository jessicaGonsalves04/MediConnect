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
	 							$docid=$_SESSION['doctor'];
	 							$query="select * from appointment where Doctor_Id = '$docid' and status != 'Completed'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Patient</th>
	 								<th>Date</th>
	 								<th>Time</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='3' class='text-center'>No doctors</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$pid=$row['Patient_Id'];
	 								$date=$row['Date'];
	 								$Time=$row['Time'];
	 								
	 								$q1="select Name from patient where Patient_Id='$pid'";
	 								$res1=mysqli_query($connect, $q1);
	 								$r1=mysqli_fetch_array($res1);
	 								$pname=$r1['Name']; 
	 								
	 								$output.="
	 								<tr>
	 									<td>$pname</td>
	 									<td>$date</td>
	 									<td>$Time</td>
	 									
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