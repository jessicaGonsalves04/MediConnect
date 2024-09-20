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
	 							<h5 class="text-center">All Equipment Orders</h5>

	 							<?php 
	 							$ad=$_SESSION['admin'];
	 							$query="select * from euipment_orders where admin_id != '$ad'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Order ID</th>
	 								<th>Doctor ID</th>
	 								
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='2' class='text-center'>No Orders</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$did=$row['Doctor_Id'];
	 								$oid=$row['Order_id'];
	 								
	 								$output.="
	 								<tr>
	 									<td>$oid</td>
	 									<td>$did</td>
	 									<
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