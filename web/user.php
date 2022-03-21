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
$sesh = mysqli_query($mysqli, "SELECT email FROM user
      WHERE userid = $userid");
$rowmain = mysqli_fetch_array($sesh);

  $email=$rowmain['email'];

  ?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyUfm</title>
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

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:radio.myufm@gmail.com">radio.myufm@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>09-8400295 (Pej Korporat)</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://twitter.com/radiomyufm" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/myufm" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/myufm" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/myufmstudio" class="youtube"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
  </section>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">
      <a href="user.php" class="custom-logo-link" rel="home"><img width="86" height="66" src="assets/img/logo.png" class="custom-logo" alt="MYUFM"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="https://ceritakiah.myufm.net">Cerita Kak Kiah</a></li>
          <li><a class="nav-link scrollto" href="#services">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#about">Live Streaming</a></li>
          <li><a class="nav-link scrollto " href="#buffet">Buffet Music</a></li>
          <li><a class="nav-link scrollto" href="#team">Rancangan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profil Anda</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Log Keluar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    
  </section><!-- End Hero -->

  <main id="main">
<br>

    <section id="services" class="featured-services">
      <br>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/pic1.png" alt="First slide">
      <div id="shadow" class="carousel-caption d-none d-md-block">
    <h5>Krew MyUfm</h5>
    <p>Krew kami yang sentiasa menghiburkan anda.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/pic2.png" alt="Second slide">
      <div id="shadow" class="carousel-caption d-none d-md-block">
    <h5>Youtube Page Kami</h5>
    <p>Page youtube kami yang sentiasa diupdate dengan content-content baharu.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/pic3.png" alt="Third slide">
      <div id="shadow" class="carousel-caption d-none d-md-block">
    <h5>Lawatan Kami ke Angkasapuri</h5>
    <p>Lawatan kami ke bangunan stesyen televisyen RTM di Angkasapuri</p>
  </div>
    </div>
  </div>
</div>
<br>
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title"><a>Radio Kampus Pertama Pantai Timur</a></h4>
              <p class="description">Kami merupakan radio kampus pertama di pantai timur yang berdedikasi untuk menghiburkan anda.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <h4 class="title"><a>24/7</a></h4>
              <p class="description">MyUfm beroperasi 24 jam sehari 7 hari seminggu untuk menyidangkan hiburan lagu tanpa henti.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <h4 class="title"><a>Rancangan</a></h4>
              <p class="description">Kami menyediakan pelbagai segmen yang membincangkan pelbagai topik untuk anda.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <h4 class="title"><a>DJ, Event Handler</a></h4>
              <p class="description">Kami bukan sahaja boleh menghiburkan anda melalui radio tetapi anda boleh menjemput kami untuk menjadi emcee di event anda.</p>
            </div>
          </div>

        </div>
<br>
      </div>
    </section>
<br>
<!-- ======= Live Streaming Section ======= -->
    <section id="about" class="featured-services">
      <br>
      <div data-aos="fade-up"  class="text-center"><h1>Live Streaming</h1>
    <div data-aos="fade-up"  class="container-audio">
        <audio controls>
                   <source src="assets/radioexample.mp3" type="audio/mpeg">
                   Your browser does not Support the audio Tag
               </audio>
    </div>

      </div> 
      <br>
    </section><!-- Live Streaming -->

<br>
<!-- ======= Buffet Music Section ======= -->
    <section id="buffet" class="featured-services">
      <br>
      <div class="text-center"><h1>Buffet Music</h1>
      </div> 
      <div class="container" data-aos="fade-up">
<form action="user.php#buffet" method="post" name="form2">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="song" class="form-control" placeholder="Song Name" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="artist" placeholder="Artist" required>
                </div><br>
               </div>
               <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <input type="hidden" name="status" value="pending">
              <div class="text-center"><button type="submit" name="srequest">Send Request</button> </div>
              <?php

if(isset($_POST['srequest'])) {
  $song = mysqli_real_escape_string($mysqli,$_POST['song']);
  $artist = mysqli_real_escape_string($mysqli,$_POST['artist']);
  $status = mysqli_real_escape_string($mysqli,$_POST['status']);
  $speech = mysqli_real_escape_string($mysqli,$_POST['message']);

$query = mysqli_query($mysqli, "SELECT email FROM request
      WHERE email = '$email' AND status ='pending'");

$sql = mysqli_num_rows($query);

  if($sql==2){
      echo "<font color='red'>You have 2 pending requests!</font><br/>";
    } 
   else{
$result = mysqli_query($mysqli, "INSERT INTO request(email,artist,track,message,status) 
      VALUES('$email','$artist','$song','$speech','$status')");
    //display success message
    echo "<font color='green'>Song requested successfully.</font>";

  }
}
?>
            </form>
            <?php
            $view = mysqli_query($mysqli, "SELECT * FROM request where email = '$email' AND status = 'pending'");
            $view1 = mysqli_query($mysqli, "SELECT * FROM request where email = '$email' AND status != 'pending'");
            ?>

            <h3 class="text-center">Your Requests (Limit:2)</h3>
            <table align="center" width='90%' border="2">
    <tr bgcolor="#CCCCCC">
      <td>Song</td>
      <td>Artist</td>
      <td>Status</td>
      <td>Message</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($view)){
      echo "<tr>";
      echo "<td>".$res['track']."</td>";
      echo "<td>".$res['artist']."</td>";
      echo "<td>".$res['status']."</td>";
      echo "<td>".$res['message']."</td>";
      echo "</tr>";
    }
    ?>
  </table>
<br>
  <h3 class="text-center">Accepted/Rejected Requests</h3>

<table align="center" width='90%' border="2">
    <tr bgcolor="#CCCCCC">
      <td>Song</td>
      <td>Artist</td>
      <td>Status</td>
      <td>Message</td>
    </tr>
    <?php
    while($res1 = mysqli_fetch_array($view1)){
      echo "<tr>";
      echo "<td>".$res1['track']."</td>";
      echo "<td>".$res1['artist']."</td>";
      echo "<td>".$res1['status']."</td>";
      echo "<td>".$res1['message']."</td>";
      echo "</tr>";
    }
    ?>
  </table>

            <br>
<h3>&emsp;</h3>
            </div>
      </div>
    </section><!-- End Buffet Music -->
<br>
    <!-- ======= Rancangan Section ======= -->
    <section id="team" class="team section-bg">
      <br>
        <div data-aos="fade-up" class="text-center"><h1>Rancangan</h1>
          <img data-aos="fade-up" id="myImg" src="assets/img/rancangan.png" alt="Rancangan" >
      </div> 
<br><br>
    </section><!-- End Rancangan Section -->

<br>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <br>
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <div class="text-center"><h1>Hubungi Kami</h1>
      </div> 
          <br>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Konti Radio MYUFM, Tingkat 3, Bangunan Integriti, UiTM, 23000 Kuala Dungun, Terengganu</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>radio.myufm@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>09-8400295 (Pej Korporat)</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.370927106201!2d103.44003501476239!3d4.705460996582286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c80ecf268c35c7%3A0x76745d9af109d094!2sKonti%20Radio%20MYUFM!5e0!3m2!1sen!2smy!4v1624233527632!5m2!1sen!2smy" frameborder="0" style="border:0; width: 204%; height: 350px;" allowfullscreen></iframe>
          </div>


        </div>

      </div>
      <br>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<br>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>MYUFM</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>