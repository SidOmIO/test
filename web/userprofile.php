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
$sesh2 = mysqli_query($mysqli, "SELECT * FROM user WHERE status='user' ORDER BY userid DESC");
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

  <title>Profil Pengguna (Admin)</title>
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
          <li><a class="nav-link scrollto" href="admin.php">Buffet Music</a></li>
          <li><a class="nav-link scrollto" href=#services>Profil Pengguna</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profil Anda</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Keluar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">
<br>
    <section id="services" class="featured-services">
      <div class="table-responsive">

<table width='80%' border=0 align=center>
    <tr bgcolor="#CCCCCC">
      <td>Email</td>
      <td>Full Name</td>
      <td>Gender</td>
      <td>Address</td>
      <td>City</td>
      <td>Postcode</td>
      <td>State</td>
      <td>Country</td>
      <td>Registration Date</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($sesh2)){
      echo "<tr>";
      echo "<td>".$res['email']."</td>";
      echo "<td>".$res['fullname']."</td>";
      echo "<td>".$res['gender']."</td>";
      echo "<td>".$res['address']."</td>";
      echo "<td>".$res['city']."</td>";
      echo "<td>".$res['postcode']."</td>";
      echo "<td>".$res['state']."</td>";
      echo "<td>".$res['country']."</td>";
      echo "<td>".$res['registrationdate']."</td>";
      echo "<td>";
      $delid = $res['userid'];
echo "<button class='editbtn' onClick=\"return confirm('Are you sure you want to delete?')\">
<a href=\"deleteuser.php?delid=$delid\">Delete</a></button>";
echo "</td>";
echo "</tr>";
    }
    ?>
  </table>

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