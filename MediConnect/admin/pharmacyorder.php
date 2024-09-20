<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Order</title>
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
	 							<h5 class="text-center">All Pharmacy Orders</h5>

	 							<?php 
	 							$ad=$_SESSION['admin'];
	 							$query="select * from medicine_order where Pharmacy_Id != '$ad'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Order ID</th>
	 								<th>Total Amount</th>
	 								<th>Date</th>
	 								<th>Status</th>
	 								<th>Prescription ID</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='2' class='text-center'>No Orders</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$orderid=$row['Order_id'];
	 								$tot=$row['Total_amount'];
	 								$date=$row['Date'];
	 								$status=$row['Status'];
	 								$pid=$row['Prescription_Id'];
	 								
	 								$output.="
	 								<tr>
	 									<td>$orderid</td>
	 									<td>$tot</td>
	 									<td>$date</td>
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