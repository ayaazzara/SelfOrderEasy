<?php

require_once "./koneksi.php";
require_once "./pesanan.php";
require_once "./menu.php";

class kontrolPesanan
{
    private $database;
    protected $pesanantable = "pesanan";
    protected $tediritable = "terdiri";
    protected $mejatable = "meja";
    private $Pesanan;
    private $Menu;

    public function __construct()
    {
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
        $this->Pesanan = new pesanan();
        $this->Menu = new menu();
    }

    public function checkPesananIsNotEmpty()
    {
        $pesananEmpty = $this->Pesanan->isDetailPesananEmpty();
        return !$pesananEmpty;
    }

    public function showDetailPesanan()
    {
        echo "<script>location= 'detailOrder.php'</script>";
    }

    public function getKetersediaan($menu)
    {
        $availabilityStatus = $this->Menu->isAvailable($menu[0][3]);
        return $availabilityStatus;
    }

    public function insertPesanan($waktuPesan, $id_pesanan, $pesanan, $id_pengguna, $nomor_meja, $catatan)
    {
        $this->database->query("INSERT INTO pesanan (idPesanan, waktuPesan, catatan, IdPengguna, nomorMeja) VALUES ('$id_pesanan','$waktuPesan', '$catatan', '$id_pengguna', '$nomor_meja')")  or die(mysqli_error($this->database));
        foreach ($pesanan as $idMenu => $jumlahItem) {
            if ($jumlahItem > 0) {
                $this->database->query("INSERT INTO terdiri (idPesanan, idMenu, qty)  VALUES ('$id_pesanan', '$idMenu', '$jumlahItem') ") or die(mysqli_error($this->database));
            }
        }
        $this->database->query("UPDATE $this->mejatable SET statusMeja=0 WHERE nomor='$nomor_meja'") or die(mysqli_error($this->database));
    }

    public function getIDPesanan()
    {
        $result = $this->database->query("SELECT MAX(idPesanan) FROM $this->pesanantable");
        $data = mysqli_fetch_all($result);
        return $data[0][0] + 1;
    }

    public function hapusDaftarPesanan()
    {
        $this->Pesanan->destroy();
        echo "<script>alert('Seluruh pesanan berhasil dihapus!');</script>";
        echo "<script>location= 'index.php'</script>";
    }

    public function incrementItem($idMenu){
        $jumlahAwal = $_SESSION["pesanan"][$idMenu];
        $jumlahAkhir = $this->Pesanan->increment($idMenu);
        if($jumlahAkhir == ($jumlahAwal + 1)){
            $this->showDetailPesanan();
        }
    }

    public function decrementItem($idMenu){
        $jumlahAwal = $_SESSION["pesanan"][$idMenu];
        $jumlahAkhir = $this->Pesanan->decrement($idMenu);
        if($jumlahAkhir == ($jumlahAwal - 1)){
            $this->showDetailPesanan();
        }
    }
}
