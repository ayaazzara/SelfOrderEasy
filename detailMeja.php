<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>So Easy | Detail Meja</title>

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

<body id="body">
    <!-- Start Top Header Bar -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Site Logo -->
                    <div class="logo text-left">
                        <a href="index.php">
                            <!-- replace logo here -->
                            <svg width="500px" height="30px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="a">
                                            <tspan x="-50" y="325">AMSTIRDAM COFFEE</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Cart -->
                    <ul class="top-menu text-right list-inline">
                        <li class="dropdown cart-nav dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart</a>
                            <div class="dropdown-menu cart-dropdown">
                                <?php
                                include("controlMenu.php");
                                include("controlPesanan.php");
                                $menuModel = new controlMenu();
                                $pesananModel = new kontrolPesanan();
                                $totalBeli = 0;
                                if ($pesananModel->checkPesananIsNotEmpty()) {
                                ?>
                                    <table>
                                        <?php
                                        $count = 0;
                                        foreach ($_SESSION["pesanan"] as $idMenu => $jumlahItem) :

                                            if ($jumlahItem > 0) {

                                                $count += 1;

                                                $ambil = $menuModel->getOneMenu($idMenu);
                                                $subharga = $ambil[0][5] * $jumlahItem;
                                        ?>
                                                <tr>
                                                    <td style="width: 30px;"><?php echo $jumlahItem . "x"; ?> </td>
                                                    <td style="width: 100px;"><?php echo $ambil[0][1]; ?> </td>
                                                    <td><?php echo $subharga ?> </td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach;
                                        ?>
                                    </table>
                                    <br>
                                    <ul class="text-center">
                                        <li><a href="detailOrder.php" class="btn btn-small">Detail Order</a></li>
                                    </ul>
                                <?php
                                } else {
                                    echo "Tidak ada item dalam keranjang";
                                } ?>
                            </div>
                        </li>
                        <?php
                        if (empty($_SESSION["user"])) {
                        ?>
                            <li class="dropdown dropdown-slide">
                                <a href="login.php" class="dropdown-toggle" data-hover="dropdown"><i></i>Login</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="dropdown dropdown-slide">
                                <a href="logout.php" class="dropdown-toggle" data-hover="dropdown"><i></i>Logout</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul><!-- / .nav .navbar-nav .navbar-right -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Header Bar -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Detail Meja</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper user-dashboard">
                        <a href="#!">
                            <div class="content">
                                <br>
                                <h3 style="text-align: center;">Denah Meja</h3>
                                <img src="images/design1.jpg" alt="" style="display: block; margin: auto;" />
                                <br>
                                <h3 style="text-align: center;">Detail Meja</h3>
                            </div>
                        </a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor Meja</th>
                                        <th>Status Meja</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("controlDetailMeja.php");
                                    $detailedMeja = new controlDetailMeja();
                                    $jmlData = $detailedMeja->getDetailMeja();
                                    for ($x = 0; $x < sizeof($jmlData); $x++) {
                                        if ($jmlData[$x][1] == 1) {
                                            $text = '<tr>
                                            <td>' . $jmlData[$x][0] . '</td>
                                            <td><span class="label label-success">Available</span></td>
                                            </tr>';
                                            echo $text;
                                        }
                                        if ($jmlData[$x][1] == 0) {
                                            $text = '<tr>
                                            <td>' . $jmlData[$x][0] . '</td>
                                            <td><span class="label label-danger">NotAvailable</span></td>
                                            </tr>';
                                            echo $text;
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Awal Footer -->
    <footer class="footer section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="social-media">
                        <li>
                            <a href="https://instagram.com/amstirdamcoffee?utm_medium=copy_link">
                                <i class="tf-ion-social-instagram"> @amstirdamcoffee</i>
                            </a>
                        </li>
                    </ul>
                    </ul>
                    <p class="copyright-text">Amstirdam Coffe Malang </p>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- Akhir Footer -->
    
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