<?php
require "./koneksi.php";
require "./user.php";

class regisControl{
    private $database;
    private $User;
    protected $tabelPengguna = "pengguna";

    public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
        $this->User = new user();
    }

    public function regis($email, $pwd){
        $result = $this->database->query("SELECT COUNT(*) FROM $this->tabelPengguna WHERE email='$email'");
        $count = mysqli_fetch_all($result);
        if ($count[0][0] > 0) {
            $this->sendInvalid('Email telah terdaftar!');
        } else {
            $userData = $this->User->save($email, $pwd);
            if($userData){
                $this->showHalamanUtama();
            }
        }
    }

    public function sendInvalid($error){
        echo "<script>alert('$error');</script>";
    }

    public function showHalamanUtama(){
        echo "<script>alert('Registrasi berhasil');
                           window.location.replace('index.php');
                           </script>";
    }
    
}

// main(){
//     pegawai = new controlPesananPegawai();
//     echo pegawai.getDetailMeja();
// }
