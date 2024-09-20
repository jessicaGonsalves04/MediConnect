<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <?php 
    include("include/header.php");
    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="img/info.jpg" class="card-img-top" alt="Information">
                    <div class="card-body">
                        <h5 class="card-title">Information</h5>
                        <p class="card-text">Learn more about our healthcare system.</p>
                        <!-- <a href="#" class="btn btn-primary">Read More</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="img/patient.jpg" class="card-img-top" alt="Patient">
                    <div class="card-body">
                        <h5 class="card-title">Create Account</h5>
                        <p class="card-text">Sign up for a patient account to manage your health information.</p>
                        <a href="account.php" class="btn btn-success">Create Account</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="img/doctor.jpg" class="card-img-top" alt="Doctor">
                    <div class="card-body">
                        <h5 class="card-title">Doctor</h5>
                        <p class="card-text">Sign up for a doctor account to manage patient records.</p>
                       <!--  <a href="#" class="btn btn-primary">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>