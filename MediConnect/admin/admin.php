<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
	 							<h5 class="text-center">All Admin</h5>

	 							<?php 
	 							$ad=$_SESSION['admin'];
	 							$query="select * from admin where admin_id != '$ad'";
	 							$res=mysqli_query($connect, $query);

	 							$output="<table class='table table-bordered'>
	 							<tr>
	 								<th>Admin ID</th>
	 								<th>Hospital ID</th>
	 								<th style='width: 10%'>Action</th>
	 							</tr>";
	 							if(mysqli_num_rows($res)<1){
	 								$output.="<tr><td colspan='3' class='text-center'>No new admin</td></tr>";
	 							}
	 							while($row=mysqli_fetch_array($res)){
	 								$id=$row['Admin_Id'];
	 								$username=$row['Hospital_Id'];
	 								$output.="
	 								<tr>
	 									<td>$id</td>
	 									<td>$username</td>
	 									<td>
	 										<a href='admin?id=$id'><button id='$id' class='btn btn-danger'>remove</button></a>
	 									</td>
	 								";

	 							}
	 							$output.="</tr></table>";
	 							echo $output;

	 							if(isset($_GET['id'])){
	 								$id=$_GET['id'];
	 								$query="delete from admin where admin_id='$id'";
	 								mysqli_query($connect, $query);	 							}

	 							 ?>

	 							
	 								
	 							
	 						</div>
	 						<div class="col-md-6">
	 							<?php 
	 							if(isset($_POST['add'])){
	 								$uname=$_POST['uname'];
	 								$pass=$_POST['uname'];
	 								$hid=$_POST['hid'];

	 								$error=array();

	 								if(empty($uname)){
	 									$error['u']="Enter admin id";
	 								}else if(empty($pass)){
	 									$error['u']="Enter password";
	 								}else if(empty($hid)){
	 									$error['u']="Enter hosital id";
	 								}

	 								if(count($error)==0){

	 									$q="insert into admin(Admin_Id, admin_password, Hospital_Id) values('$uname', '$pass', '$hid')";
	 									$result=mysqli_query($connect, $q);
	 									if($result){
	 										echo "<script>alert('You have inserted')</script>";
	 									}
	 									else{
	 										echo "<script>alert('Insert failed')</script>";
	 									}
	 								}
	 							}
	 							if(isset($erro['u'])){
	 								$er=$error['u'];
	 								$show="<h5 class='text-center alert alert-danger'>$er</h5>";
	 							}
	 							else
	 							{
	 								$show="";
	 							}

	 							 ?>
	 							<h5 class="text-center">Add Admin</h5>
	 							<form method="post" enctype="multipart/form-data">
	 								<div>
	 									<?php echo $show; ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Admin id</label>
	 									<input type="text" name="uname" class="form-control" autocomplete="off">
	 								</div>
	 								<div class="form-group">
	 									<label>Password</label>
	 									<input type="Password" name="pass" class="form-control">
	 								</div>
	 								<div class="form-group">
	 									<label>Hospital_ID</label>
	 									<input type="text" name="hid" class="form-control" autocomplete="off">
	 								</div>
	 								<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
	 							</form>

	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>