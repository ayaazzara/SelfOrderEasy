<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>So Easy | Registrasi</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<?php
include("regisControl.php");
$model = new regisControl();

if (isset($_POST['register'])) {

  $password = $_POST['password'];
  $email = $_POST['email'];

  $model->regis($email, $password);
}
?>

<body id="body">

  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a href="index.php">
              <!-- replace logo here -->
              <svg width="500px" height="30px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                  <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                    <text id="a">
                      <tspan x="-30" y="325">AMSTIRDAM COFFEE</tspan>
                    </text>
                  </g>
                </g>
              </svg>
            </a>
            <h2 class="text-center">Create Your Account</h2>
            <form class="text-left clearfix" method="post">
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="text-center">
                <button name="register" type="submit" class="btn btn-main text-center">Sign Up</button>
              </div>
            </form>
            <p class="mt-20">Already hava an account ?<a href="login.php"> Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 
    Essential Scripts
    =====================================-->

  <!-- Main jQuery -->
  <script src="plugins/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.1 -->
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Bootstrap Touchpin -->
  <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
  <!-- Instagram Feed Js -->
  <script src="plugins/instafeed/instafeed.min.js"></script>
  <!-- Video Lightbox Plugin -->
  <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
  <!-- Count Down Js -->
  <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

  <!-- slick Carousel -->
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/slick/slick-animation.min.js"></script>

  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

  <!-- Main Js File -->
  <script src="js/script.js"></script>



</body>

</html>