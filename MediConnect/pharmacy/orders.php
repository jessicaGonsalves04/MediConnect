<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
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
	 							<h5 class="text-center">Orders</h5>

	 							<?php 
	 							$pid=$_SESSION['pharmacy'];
	 							$query="select * from medicine_order where Pharmacy_Id = '$pid'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>OrderId</th>
	 								<th>Date</th>
                                    <th>Amount</th>
	 								<th>Status</th>
	 								<th>Prescription ID</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='4' class='text-center'>No doctors</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$oid=$row['Order_id'];
	 								$date=$row['Date'];
	 								$amount=$row['Time'];
	 								$status=$row['Status'];
	 								$pid=$row['Prescription_Id'];
	 								##$pid="select Name from hospital where Hospital_Id='$hid'";

	 								$output.="
	 								<tr>
	 									<td>$oid</td>
	 									<td>$date</td>
	 									<td>$amount</td>
	 									<td>$status</td>
                                        <td>$pid</td>
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