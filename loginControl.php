<?php
require "./koneksi.php";
require "./user.php";

class loginControl{
    private $database;
    private $User;

    public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
        $this->User = new user();
    }

    public function login($email, $pwd){
        $userData = $this->User->isAccValid($email, $pwd);
        if ($userData == "Error 1"){
            $this->sendInvalid('Email belum terdaftar!');
        } else if ($userData == "Error 2"){
            $this->sendInvalid('Kata Sandi yang Dimasukkan Salah!');
        } else {
            session_start();
            $_SESSION['user'] = $userData;
            $this->showHalamanUtama();
        }
    }

    public function showHalamanUtama(){
        echo "<script>alert('Login berhasil');
                           window.location.replace('index.php');
                           </script>";
    }

    public function sendInvalid($error){
        echo "<script>alert('$error');</script>";
    }
    
}

// main(){
//     pegawai = new controlPesananPegawai();
//     echo pegawai.getDetailMeja();
// }
