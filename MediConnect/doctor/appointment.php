<?php 
session_start();
include("../include/connection.php");
$user=$_SESSION['doctor'];
if(isset($_POST['create'])){
    $appt_id=$_POST['appointment_id'];
    $patient_Id=$_POST['patient_id'];
    $date=$_POST['date'];
    $diagnosis=$_POST['diagnosis'];
    $treat=$_POST['treatment'];
    

    $error = array();

    if(empty($appointment_id)){
        $error['ac']="Enter AppointmentID";
    }
    else if (empty($patient_Id)) {
        $error['ac']="Enter Patient_Id";
    }
    else if (empty($date)) {
        $error['ac']="Enter date";
    }
     
    if(count($error)==0){
        // Check if email already exists
        $check_query = "SELECT * FROM appointment WHERE Appointment_Id='$appointment_id' and Patient_Id='$patient_Id' and Date='$date'";
        $check_result = mysqli_query($connect, $check_query);
        if(mysqli_num_rows($check_result)== 0){
           # $error['ac'] = "Email already exists!";
        	echo "<script>alert('Invalid AppointmentID ')</script>";
        } else {
            // Insert new patient into database
            $insert_query = "INSERT INTO medical_record( Diagnosis, Treatment, Date, Patient_id, Doctor_id,Appointment_id) VALUES ('$diagnosis','$treat','$date','$patient_Id','$uuser','$appt_id'";
            $insert_result = mysqli_query($connect, $insert_query);
            if($insert_result){
                echo "<script>alert('Record entered successfully!')</script>";
                // Redirect to patient login page
                header("Location: index.php");
                exit();
            } else {
                #error['ac'] = "Failed to create account. Please try again.";
                echo "<script>alert('Failed to enter record. Please try again.')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment</title>
</head>
<body style="background-image:url(img/accountPg.jfif);background-repeat: no-repeat;background-size: cover;">

	<?php 
	include("../include/header.php");
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-2 jumbotron">
	 				<h5 class="text-center text-info my-2">Medical Record
	 				</h5>
	 				<form method="post">
	 					<div class="">
	 						<?php
	 						if(isset($error['doctor'])){
	 							$sh=$error['doctor'];
	 							$show="<h4 class='alert alert-danger'>$sh</h4>";
	 						}else{
	 							$show="";
	 						}

	 						echo $show;
	 						?>
	 					</div>
	 					<div class="form-group">
	 						<label>AppointmentID</label>
	 						<input type="text" name="appointment_id" class="form-control" autocomplete="off" placeholder="Enter Name">
	 					</div>
	 					<div class="form-group">
	 						<label>Patient_Id</label>
	 						<input type="text" name="patient_id" class="form-control"autocomplete="off" placeholder="Enter PatientID">
	 					</div>
	 					<div class="form-group">
	 						<label>Date</label>
	 						<input type="date" name="date" class="form-control" autocomplete="off" placeholder="Enter Date">
	 					</div>
	 					<div class="form-group">
	 						<label>Diagnosis</label>
	 						<input type="text" name="diagnosis" class="form-control" autocomplete="off" placeholder="Enter diagnosis">
	 					</div>
	 					<div class="form-group">
	 						<label>Treatment</label>
	 						<input type="text" name="treatment" class="form-control" autocomplete="off" placeholder="Enter treatment">
	 					</div>
	 					
	 					
	 					
	 					
	 					<input type="submit" name="create" value="Create Medicalrecord" class="btn btn-success">
	 					
	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>