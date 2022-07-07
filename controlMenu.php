<?php

require_once "./koneksi.php";
require_once "./menu.php";

class controlMenu{
    private $database;
    private $Menu;
    protected $menutable = "menu";

    public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
        $this->Menu = new menu();
    }

    public function checkMenuIsNotEmpty(){
        $menuExists = $this->Menu->isMenuEmpty();
        if ($menuExists){
            return $this->showDaftarMenu();
        } else {
            return $this->showEmpty();
        }
    }

    public function showDaftarMenu(){
        $result = $this->database->query("SELECT * FROM $this->menutable order by 'judulMenu' asc");
        return mysqli_fetch_all($result);
    }

    public function getOneMenu($idMenu)
    {
        $result = $this->database->query("SELECT * FROM $this->menutable WHERE idMenu='$idMenu'");
        return mysqli_fetch_all($result);
    }

    public function showEmpty(){
        echo "Tidak dapat menemukan menu";
    }
    
}

// main(){
//     pegawai = new controlPesananPegawai();
//     echo pegawai.getDetailMeja();
// }
