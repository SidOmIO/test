<?php

session_start();
if (isset($_SESSION['message'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}
?>



<!DOCTYPE html>
<html>
    
<head>
  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">
	<title>MyUfm Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>
<body>
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
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="E-mail">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password">
						</div>
						<?php
//including the database connection file
include_once("forms/config.php");

if(isset($_POST['button'])){
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	// checking empty fields
	if(empty($email) || empty($password)){
		if(empty($email)){
			echo "<font color='red'>Email field is empty.</font><br/>";
		}	if(empty($password)){
			echo "<font color='red'>Password field is empty.</font><br/>";
		}	
	}	else{
			//if all the fields are filled (not empty)
		//insert data to database
		$resultemail = mysqli_query($mysqli, "SELECT email FROM user
			WHERE email = '$email'");
		$resultpass = mysqli_query($mysqli, "SELECT password,userid,status FROM user
			WHERE email = '$email' AND password = '$password' ");


$row = mysqli_fetch_array($resultemail);
$row1 = mysqli_fetch_array($resultpass);

		if (empty($row['email'])) {
			echo "<font color='red'>You are not registered!</font>";
			}
		else if(empty($row1['password'])) {
			echo "<font color='red'>Wrong password!</font>";
			}
		else{
		if(isset($_POST['email']))
{
	$userid = $row1['userid'];
	$_SESSION['login']=$userid;
	//Storing the name of user in SESSION database

	$stat = $row1['status'];

	if($stat == 'user')
	header("location: user.php");

	else if($stat == 'admin')
	header("location: admin.php");
}
	}
	}
}
?>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="register.php" class="ml-2">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
