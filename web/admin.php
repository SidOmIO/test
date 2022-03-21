<?php
include_once("forms/config.php");
  session_start();
  if(!isset($_SESSION['login']))
  {
  header("location: index.html");
}
if (isset($_SESSION['message2'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['message2'] . '");</script>';
    unset($_SESSION['message2']);
}

$userid=$_SESSION['login'];
$sesh = mysqli_query($mysqli, "SELECT email,status FROM user
      WHERE userid = $userid");
$rowmain = mysqli_fetch_array($sesh);

  $email=$rowmain['email'];
  $status =$rowmain['status'];

  if($status!='admin'){
      header("location: user.php");
  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buffet Music (Admin)</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>




  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">
      <a href="admin.php" class="custom-logo-link" rel="home"><img width="86" height="66" src="assets/img/logo.png" class="custom-logo" alt="MYUFM"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href=#services>Buffet Music</a></li>
          <li><a class="nav-link scrollto" href="userprofile.php">Profil Pengguna</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profil Anda</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Keluar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">
<br>
    <!-- ======= Featured Services Section ======= -->
    <section id="services" class="featured-services">
      <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>E-mail</th>
<th>Artist</th>
<th>Track</th>
<th>Message</th>
<th>Status</th>
<th>Accept or Delete</th>
</tr>
</thead>

<?php

$sql = 'SELECT * from request where status="pending"';
if (mysqli_query($mysqli, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
$count=1;
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { 
echo "<tbody>";
echo "<tr>";
echo "<th>";
echo $row['email'];
echo "</th>";
echo "<td>";
echo $row['artist'];
echo "</td>";
echo "<td>";
echo $row['track'];
echo "</td>";
echo "<td>";
echo $row['message'];
echo "</td>";
echo "<td>";
echo $row['status'];
echo "</td>";
echo "<td>";
  echo "<form action='admin.php' method='post' name='form3'>";
  echo '<input type="hidden" name="reqid" value="'.$row["reqid"].'" />';
  echo '<input type="hidden" name="email" value="'.$row["email"].'" />';
echo "<button type='submit' class='editbtn' name='accept'>Accept</button>";
echo "<button type='submit' class='editbtn' name='delete'>Delete</button>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</tbody>";
$count++;
}

} else {
echo '0 songs requested';
}

echo "</table>";



if(isset($_POST['accept'])){
  $em = mysqli_real_escape_string($mysqli,$_POST['reqid']);
  $em2= mysqli_real_escape_string($mysqli,$_POST['email']);
  echo $em;
  echo $em2;
$result3 = mysqli_query($mysqli, "UPDATE request
      SET status='accepted' where reqid = '$em'");

$data = mysqli_query($mysqli,"SELECT COUNT('reqid') AS num FROM request where status!='pending' and email = '$em2'");
$row = mysqli_fetch_assoc($data);
$numUsers = $row['num'];
if($numUsers >= 5){
  $result4 = mysqli_query($mysqli, "DELETE FROM request
      where email = '$em2'
      ORDER BY reqid ASC
      LIMIT 1");
}
header("location: admin.php");
}

if(isset($_POST['delete'])){
  $em = mysqli_real_escape_string($mysqli,$_POST['reqid']);
  $em2= mysqli_real_escape_string($mysqli,$_POST['email']);
  echo $em;
  echo $em2;
$result4 = mysqli_query($mysqli, "UPDATE request
      SET status='rejected' where reqid = '$em'");
$data = mysqli_query($mysqli,"SELECT COUNT('reqid') AS num FROM request where status!='pending' and email = '$em2'");
$row = mysqli_fetch_assoc($data);
$numUsers = $row['num'];
if($numUsers >= 5){
  $result4 = mysqli_query($mysqli, "DELETE FROM request
      where email = '$em2'
      ORDER BY reqid ASC
      LIMIT 1");
}
header("location: admin.php");
}


  ?>

    </section>



  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>