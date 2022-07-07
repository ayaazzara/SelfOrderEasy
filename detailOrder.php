<?php

include('koneksi.php');
session_start();
if (!isset($_SESSION['user'])) {
  header("location: login.php");
} else {
?>

  <!doctype html>
  <html lang="en">

  <head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>So Easy | Detail Order</title>

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
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End Top Header Bar -->

    <section class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="content">
              <h1 class="page-name">Detail Order</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Detail Order</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="page-wrapper">
      <div class="cart shopping">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="block">
                <div class="product-list">
                  <form method="post">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="">Item Name</th>
                          <th class="">Item Price</th>
                          <th class="">Quantity</th>
                          <th class="">Total Price</th>
                        </tr>
                      </thead>

                      <body>
                        <form method="post">
                          <?php $totalHarga = 0;
                          $count = 0;
                          foreach ($_SESSION["pesanan"] as $idMenu => $jumlahItem) : ?>

                            <?php
                            if ($jumlahItem > 0) {

                              $count += 1;

                              $ambil = $menuModel->getOneMenu($idMenu);

                              $subharga = $ambil[0][5] * $jumlahItem;
                            ?>
                              <tr>
                                <td class="">
                                  <img style="width: 100px;" class="img-responsive" src="images/shop/products/<?php echo $ambil[0][4] ?>" class="product" alt="...." />
                                  <?php echo $ambil[0][1]; ?>

                                </td>
                                <td>Rp. <?php echo number_format($ambil[0][5]); ?></td>
                                <td id="jumlahItem<?php echo $idMenu; ?>"><?php echo $jumlahItem; ?></td>
                                <td id="subHarga<?php echo $idMenu; ?>">Rp. <?php echo number_format($subharga); ?></td>
                                <td>
                                  <button name="plusButton<?php echo $idMenu; ?>" type="submit" class="btn btn-danger">+</button>
                                  <button name="minusButton<?php echo $idMenu; ?>" type="submit" class="btn btn-danger">-</button>
                                </td>
                              </tr>
                            <?php $totalHarga += $subharga;
                            } ?>

                          <?php endforeach;
                          if ($count == 0) {
                            echo "<script>alert('Mohon maaf, tidak ada pesanan yang dapat ditampilkan');</script>";
                            echo "<script>location= 'index.php'</script>";
                          } ?>
                        </form>
                        <?php
                        if (isset($_POST['plusButton101'])) {
                          $pesananModel->incrementItem(101);
                        }
                        if (isset($_POST['plusButton102'])) {
                          $pesananModel->incrementItem(102);
                        }
                        if (isset($_POST['plusButton103'])) {
                          $pesananModel->incrementItem(103);
                        }
                        if (isset($_POST['plusButton201'])) {
                          $pesananModel->incrementItem(201);
                        }
                        if (isset($_POST['plusButton202'])) {
                          $pesananModel->incrementItem(202);
                        }
                        if (isset($_POST['plusButton203'])) {
                          $pesananModel->incrementItem(203);
                        }
                        if (isset($_POST['plusButton204'])) {
                          $pesananModel->incrementItem(204);
                        }
                        if (isset($_POST['plusButton205'])) {
                          $pesananModel->incrementItem(205);
                        }
                        if (isset($_POST['plusButton206'])) {
                          $pesananModel->incrementItem(206);
                        }
                        if (isset($_POST['minusButton101'])) {
                          $pesananModel->decrementItem(101);
                        }
                        if (isset($_POST['minusButton102'])) {
                          $pesananModel->decrementItem(102);
                        }
                        if (isset($_POST['minusButton103'])) {
                          $pesananModel->decrementItem(103);
                        }
                        if (isset($_POST['minusButton201'])) {
                          $pesananModel->decrementItem(201);
                        }
                        if (isset($_POST['minusButton202'])) {
                          $pesananModel->decrementItem(202);
                        }
                        if (isset($_POST['minusButton203'])) {
                          $pesananModel->decrementItem(203);
                        }
                        if (isset($_POST['minusButton204'])) {
                          $pesananModel->decrementItem(204);
                        }
                        if (isset($_POST['minusButton205'])) {
                          $pesananModel->decrementItem(205);
                        }
                        if (isset($_POST['minusButton206'])) {
                          $pesananModel->decrementItem(206);
                        }
                        ?>
                      </body>
                      <foot>
                        <th colspan="3">Total</th>
                        <th colspan="4">Rp. <?php echo number_format($totalHarga) ?></th>
                        </tfoot>
                    </table>

                    <label for="meja">Pilih meja:</label>
                    <select name="meja" id="meja">
                      <?php
                      include("controlDetailMeja.php");
                      $detailedMeja = new controlDetailMeja();
                      $jmlData = $detailedMeja->getDetailMeja();
                      for ($x = 0; $x < sizeof($jmlData); $x++) {
                        if ($jmlData[$x][1] == 1) {
                          $text = '<option>' . $jmlData[$x][0] . '</option>';
                          echo $text;
                        }
                      }
                      ?>
                    </select>
                    <div id="catatan">
                      <h5>Catatan: </h2>
                        <input name="catatan" type="text" style="width: 600px; height: 125px;">
                    </div>
                    <br><br>


                    <input name="delete" type="submit" class="btn btn-danger" value="Delete"></input>
                    <input id="checkout" name="checkout" type="submit" class="btn btn-succes" value="Checkout"></input>
                  </form>


                  <?php

                  if (isset($_POST['checkout'])) {
                    $idMeja = 0;
                    $catatan = "";
                    if (!empty($_POST['meja'])) {
                      $idMeja = $_POST['meja'];
                    }
                    if (!empty($_POST['catatan'])) {
                      $catatan = $_POST['catatan'];
                    }
                    $waktuPesan = date("Y-m-d");
                    // Mendapatkan ID barusan
                    $id_terbaru = $pesananModel->getIDPesanan();

                    $pesananModel->insertPesanan($waktuPesan, $id_terbaru, $_SESSION["pesanan"], $_SESSION["user"][0][2], $idMeja, $catatan);

                    //Mengosongkan pesanan
                    unset($_SESSION["pesanan"]);

                    //Dialihkan ke halaman nota
                    echo "<script>alert('Pemesanan Sukses!');</script>";
                    echo "<script>location= 'index.php'</script>";
                  }

                  if (isset($_POST['delete'])) {
                    $pesananModel->hapusDaftarPesanan();
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Akhir Menu -->


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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
  </body>

  </html>
<?php
}
?>