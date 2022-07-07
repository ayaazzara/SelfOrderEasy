<?php 
session_start();

$idMenu = $_GET['idMenu'];

if (isset($_SESSION['pesanan'][$idMenu]))
{
	$_SESSION['pesanan'][$idMenu]+=1;
}

else 
{
	$_SESSION['pesanan'][$idMenu]=1;
}

echo "<script>alert('Produk telah masuk ke pesanan anda');</script>";

?>