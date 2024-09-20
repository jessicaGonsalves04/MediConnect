<?php
session_start();
include("../include/connection.php");

if(isset($_POST['submit'])){
    // Check if a doctor is selected
    if(isset($_POST['doctor_id'])){
        $selected_doctor_id = $_POST['doctor_id'];
        
        // Store the selected doctor ID in session for further processing
        $_SESSION['booking'] = $selected_doctor_id;
        
        // Redirect to the page where the user can choose the appointment time
        header("Location: choose_time.php");
        exit();
    } else {
        // If no doctor is selected, display an error message
        echo "<script>alert('Please select a doctor.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment</title>
</head>
<body>
	<?php 
	include("../include/header.php");
	 ?>
	 <div class="container-fluid">
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
	 						<h5 class="text-center">Doctors</h5>

	 						<form method="post">
	 							<?php 
	 							$pid=$_SESSION['patient'];
	 							$query="select * from doctor";
	 							$res=mysqli_query($connect, $query);

	 							if(mysqli_num_rows($res) < 1){
	 								echo "<p>No doctors available.</p>";
	 							} else {
	 								while($row=mysqli_fetch_array($res)){
	 									$id=$row['Doctor_Id'];
	 									$name=$row['name'];
	 									$spcl=$row['specialization'];
	 									
	 									$hid=$row['Hospital_Id'];

	 									$q1="select Name from hospital where Hospital_Id='$hid'";
	 									$res1=mysqli_query($connect, $q1);
	 									$r1=mysqli_fetch_array($res1);
	 									$hname=$r1['Name']; 

	 									echo "<input type='radio' name='doctor_id' value='$id'>
	 										  <label>$name - $spcl - $hname</label><br>";
	 								}
	 								echo "<input type='submit' name='submit' value='Select Doctor'>";
	 							}
	 							?>
	 						</form>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>
