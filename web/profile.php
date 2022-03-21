<?php
include_once("forms/config.php");
  session_start();
  if(!isset($_SESSION['login']))
  {
  header("location: index.html");
}
  $userid=$_SESSION['login'];
$sesh = mysqli_query($mysqli, "SELECT email,status FROM user
      WHERE userid = $userid");
$rowmain = mysqli_fetch_array($sesh);
$statusprofile =$rowmain['status'];

$all = mysqli_query($mysqli, "SELECT * FROM user
	WHERE userid = '$userid'");

  $row3 = mysqli_fetch_array($all);
  
?>

<!DOCTYPE html>
<html>
    
<head>
	  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">
	<title>Profile Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>
<body>

<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">
    	<?php
        	if($statusprofile == 'user'){
      echo "<a href='user.php' class='custom-logo-link' rel='home'><img width='86' height='66' src='assets/img/logo.png' class='custom-logo' alt='MYUFM'></a>";
      }

        	else if($statusprofile == 'admin'){
      echo "<a href='admin.php' class='custom-logo-link' rel='home'><img width='86' height='66' src='assets/img/logo.png' class='custom-logo' alt='MYUFM'></a>";  		
        	}

          ?>

      <nav id="navbar" class="navbar">
        <ul>
        	<?php
        	if($statusprofile == 'user'){

          echo "<li><a class='nav-link scrollto' href='https://ceritakiah.myufm.net'>Cerita Kak Kiah</a></li>";
          echo "<li><a class='nav-link scrollto' href='user.php#services'>Tentang Kami</a></li>";
          echo "<li><a class='nav-link scrollto' href='user.php#about'>Live Streaming</a></li>";
          echo "<li><a class='nav-link scrollto ' href='user.php#portfolio'>Buffet Music</a></li>";
          echo "<li><a class='nav-link scrollto' href='user.php#team'>Rancangan</a></li>";
          echo "<li><a class='nav-link scrollto' href='user.php#contact'>Hubungi Kami</a></li>";
          echo "<li><a class='nav-link scrollto' href='logout.php'>Log Keluar</a></li>";
        }

        	else if($statusprofile == 'admin'){

          echo "<li><a class='nav-link scrollto' href='admin.php'>Buffet Music</a></li>";
          echo "<li><a class='nav-link scrollto' href='userprofile.php'>Profil Pengguna</a></li>";
          echo "<li><a class='nav-link scrollto' href='profile.php'>Profil Anda</a></li>";
          echo "<li><a class='nav-link scrollto' href='logout.php'>Log Keluar</a></li>";
        }

          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/img/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="" method="post" name="form1">


						<div class="input-group mb-2">
						<input type="hidden" name="status" value="user">
						<?php
						echo "<input type='text' name='fullname' class='form-control input_user' value='",$row3['fullname'],"' placeholder='Full Name'>"
						?>
						</div>
						<div class="input-group mb-2">
						<?php
						echo "<input type='text' name='email' class='form-control input_user' value='",$row3['email'],"' placeholder='E-Mail'>&nbsp<input type='password' name='password' class='form-control input_user' value='",$row3['password'],"' placeholder='Password'>"
						?>
						</div>
						<div class="input-group mb-2">
							<select name="gender">
								<option value="" selected>Gender</option>
  								<option value="Lelaki">Lelaki</option>
  								<option value="Perempuan">Perempuan</option>
							</select>
							&nbsp
						<?php
						echo "<input type='text' name='address' class='form-control input_user' value='",$row3['address'],"' placeholder='Address'>"
						?>
						</div>
						<div class="input-group mb-2">
						<?php
						echo "<input type='text' name='city' class='form-control input_user' value='",$row3['city'],"' placeholder='City'>&nbsp<input type='text' name='postcode' class='form-control input_user' value='",$row3['postcode'],"' placeholder='Postcode'>"
						?>
						</div>
						<div class="input-group mb-2">
						<?php
						echo "<input type='text' name='state' class='form-control input_user' value='",$row3['state'],"' placeholder='State'>&nbsp<input type='text' name='country' class='form-control input_user' value='",$row3['country'],"' placeholder='Country'>"
						?>
						</div>


						<?php
//including the database connection file
include_once("forms/config.php");

if(isset($_POST['button'])){
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	$fullname = mysqli_real_escape_string($mysqli,$_POST['fullname']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);
	$gender = mysqli_real_escape_string($mysqli,$_POST['gender']);
	$address = mysqli_real_escape_string($mysqli,$_POST['address']);
	$city = mysqli_real_escape_string($mysqli,$_POST['city']);
	$postcode = mysqli_real_escape_string($mysqli,$_POST['postcode']);
	$state = mysqli_real_escape_string($mysqli,$_POST['state']);
	$country = mysqli_real_escape_string($mysqli,$_POST['country']);
	$registrationdate = date("d-m-Y");
	$status = mysqli_real_escape_string($mysqli,$_POST['status']);

	// checking empty fields
	if(empty($email) || empty($password)|| empty($fullname)|| empty($gender)|| empty($address)
|| empty($city)|| empty($postcode)|| empty($state)|| empty($country)){
		echo "<script>alert('";
		if(empty($email)){
			echo "Email field is empty - ";
		}	if(empty($password)){
			echo "Password field is empty - ";
		}	
		if(empty($fullname)){
			echo "Full Name field is empty - ";
		}	if(empty($gender)){
			echo "Gender field is empty - ";
		}	
		if(empty($address)){
			echo "Address field is empty - ";
		}	if(empty($city)){
			echo "City field is empty - ";
		}	
		if(empty($postcode)){
			echo "Postcode field is empty - ";
		}	if(empty($state)){
			echo "State field is empty - ";
		}	
		if(empty($country)){
			echo "Country field is empty - ";
		}
		echo "')</script>";
	}	else{
			//if all the fields are filled (not empty)
		//insert data to database
		$result = mysqli_query($mysqli, "UPDATE user SET email='$email',password='$password',fullname='$fullname',gender='$gender',address='$address',city='$city',postcode='$postcode',state='$state',country='$country' WHERE userid='$userid' ");
		//display success message
		$_SESSION['message2'] = "Profile edited!";
		if($statusprofile == 'user')
	header("location: user.php");
		else if($statusprofile == 'admin')
			header("location: admin.php");
}
	}
?>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Edit</button>
				   </div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
