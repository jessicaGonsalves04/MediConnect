<?php  
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
    $patientid = $_POST['patientid'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($patientid)){
        #$error['patient']="Enter Patient ID";
        echo "<script>alert('Enter Patient Id')</script>";
    }elseif(empty($password)){
        #$error['patient']="Enter Password";
        echo "<script>alert('Enter Password')</script>";
    }

    if(count($error)==0){
        $query = "SELECT * FROM patient WHERE patient_id='$patientid' AND Password='$password'";
        $result=mysqli_query($connect, $query);

        if(mysqli_num_rows($result)==1){
            echo "<script>alert('You have logged in as a patient')</script>";
            $_SESSION['patient']=$patientid;
            header("Location: patient/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Patient ID or Password')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Login Page</title>
</head>
<body style="background-image: url(img/patientCare.jfif);background-repeat:no-repeat;background-size: cover;">
    <?php 
    include("include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Patient ID</label>
                            <input type="number" name="patientid" class="form-group" autocomplete="off" placeholder="Enter Patient ID">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                        <p>Don't have an account?<a href="account.php">Click here.</a></p>
                        
                    </form>
                    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>