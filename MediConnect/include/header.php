<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" type="text/css" />

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" ></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white">MediConnect</h5>

		<div class="ms-auto"></div>

		<ul class="navbar-nav mr-auto">
			<?php 
			if(isset($_SESSION['admin'])){
				$user=$_SESSION['admin'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			}
			else if(isset($_SESSION['patient'])){
				$user=$_SESSION['patient'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			} 
			else if(isset($_SESSION['doctor'])){
				$user=$_SESSION['doctor'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			} 
			else if(isset($_SESSION['pharmacy'])){
				$user=$_SESSION['pharmacy'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			} 
			else{
				echo '<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
			<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
			<li class="nav-item"><a href="pharmacylogin.php" class="nav-link text-white">Pharmacy</a></li>';
			}
			?>
			
		</ul>
	</nav>
</body>
</html>