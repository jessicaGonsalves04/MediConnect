<?php 
session_start();
include("../include/connection.php");
$doctor_id=$_SESSION['booking'];
$patient_id=$_SESSION['patient'];

if(isset($_POST['schedule'])){
    $d=$_POST['date'];
    $t=$_POST['time'];
    

    $error = array();

    if(empty($d)){
        $error['b']="choose date";
    }
    else if (empty($t)) {
        $error['b']="choose time";
     }

    if(count($error)==0){
    	 $time = $t . ':00';
        // Check if email already exists
        $check_query = "SELECT * FROM Doctor_Schedule WHERE Time='$time' and Date='$d'";
        $check_result = mysqli_query($connect, $check_query);
        $check_query1 = "SELECT * FROM Appointment WHERE Time='$time' and Date='$d' and Doctor_Id='$doctor_id'";
        $check_result1 = mysqli_query($connect, $check_query1);
        if((mysqli_num_rows($check_result) > 0) | (mysqli_num_rows($check_result1) > 0) ){
           # $error['ac'] = "Email already exists!";
        	echo "<script>alert('Time slot not available')</script>";
        } else {
            // Insert new patient into database
            $q1="select Hospital_Id from doctor where Doctor_Id='$doctor_id'";
            $r= mysqli_query($connect, $q1);
            $row=mysqli_fetch_array($r);
            $hid=$row['Hospital_Id'];
           
            $insert_query = "INSERT INTO Appointment (Date, Time, Status, Patient_ID, Doctor_ID, Hospital_ID) VALUES ('$d', '$time', 'Scheduled', '$patient_id', '$doctor_id', '$hid')";
            $insert_result = mysqli_query($connect, $insert_query);
            if($insert_result){
                echo "<script>alert('Appointment Scheduled successfully!')</script>";
                // Redirect to patient login page
                header("Location: index.php");
                exit();
            } else {
                #error['ac'] = "Failed to create account. Please try again.";
                echo "<script>alert('Failed to book appointment. Please try again.')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Appt</title>
</head>
<body style="background-image:url(img/accountPg.jfif);background-repeat: no-repeat;background-size: cover;">

	<?php 
	include("../include/header.php");
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -30px;">
	 			<?php 
	 			include("sidenav.php");
	 			include("../include/connection.php");
	 			?>
	 		</div>
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-2 jumbotron">
	 				<h5 class="text-center text-info my-2">Schedule Appointment
	 				</h5>
	 				<form method="post">
	 					<div class="">
	 						<?php
	 						if(isset($error['patint'])){
	 							$sh=$error['patient'];
	 							$show="<h4 class='alert alert-danger'>$sh</h4>";
	 						}else{
	 							$show="";
	 						}

	 						echo $show;
	 						?>
	 					</div>
	 					<div class="form-group">
	 						<label>Date</label>
	 						<input type="date" name="date" class="form-control" autocomplete="off" placeholder="Enter date">
	 					</div>
	 					<!-- <div class="form-group">
	 						<label>Time</label>
	 						<input type="time" name="time" class="form-control" autocomplete="off" placeholder="Enter Time">
	 					</div> -->
	 					<div class="form-group">
	 						<label>Time</label>
	 						<select name="time" class="form-control">
	 							<option value="">Select Time</option>
	 							<option value="9:00">9:00</option>
	 							<option value="10:00">10:00</option>
	 							<option value="11:00">11:00</option>
	 							<option value="12:00">12:00</option>
	 						</select>
	 					</div>
	 					<input type="submit" name="schedule" value="Schedule appt" class="btn btn-success">

	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>