<?php
require "./meja.php";

class controlDetailMeja{
    private $database;
    private $Meja;

    public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
        $this->Meja = new meja();
    }

    public function getDetailMeja(){
        $nomor = $this->Meja->getDetailMeja();
        return $nomor;
    }

}