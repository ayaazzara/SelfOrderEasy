<?php


class user
{

    public $mysqli;
    private $tabelPengguna = "pengguna";

    public function __construct()
    {
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
    }

    public function isAccValid($email, $pwd)
    {
        $result = $this->database->query("SELECT COUNT(*) FROM $this->tabelPengguna WHERE email='$email'");
        $count = mysqli_fetch_all($result);
        if ($count[0][0] > 0) {
            $result = $this->database->query("SELECT * FROM $this->tabelPengguna WHERE email='$email'");
            $data = mysqli_fetch_all($result);
            if ($data[0][1] != $pwd) {
                return "Error 2";
            } else {
                return $data;
            }
        } else {
            return "Error 1";
        }
    }

    public function save($email, $pwd)
    {
        $register = $this->database->query("INSERT INTO pengguna (email, password) values ('$email','$pwd')")  or die(mysqli_error($this->database));
        if ($register) {
            return $this->checkInData($email, $pwd);
        }
    }

    public function checkInData($email, $pwd)
    {
        $userData = $this->isAccValid($email, $pwd);
        if ($userData != "Error 1" or $userData != "Error 2") {
            session_start();
            $_SESSION['user'] = $userData;
            return true;
        }

    }
}
