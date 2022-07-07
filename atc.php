<?php
session_start();

$idMenu = $_GET['idMenu'];

include_once("controlPesanan.php");
include_once("controlMenu.php");
$pesananModel = new kontrolPesanan();
$menuModel = new controlMenu();
$menu = $menuModel->getOneMenu($idMenu);
$pesananAvailability = $pesananModel->getKetersediaan($menu);

if (!$pesananAvailability) {
	echo "<script>alert('Maaf, produk tidak tersedia untuk saat ini');</script>";
	echo "<script>location= 'index.php'</script>";
} else {

	if (isset($_SESSION['user'])) {
		if (isset($_SESSION['pesanan'][$idMenu])) {
			$_SESSION['pesanan'][$idMenu] += 1;
		} else {
			$_SESSION['pesanan'][$idMenu] = 1;
		}
	
		echo "<script>alert('Produk telah masuk ke pesanan anda');</script>";
		echo "<script>location= 'index.php'</script>";

	  } else {
		echo "<script>alert('Maaf, anda belum melakukan login');</script>";
		echo "<script>location= 'login.php'</script>";
	  }
}
