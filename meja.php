<?php

class meja
{

	public $mysqli;
    private $tabelMeja = "meja";
    private  $nomor ;
    private $statusMeja ;

	public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
	}

    public function getNomorMeja(){
        $result = $this->database->query("SELECT nomor FROM $this->tabelMeja");
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public function getDetailMeja(){
        $result = $this->database->query("SELECT nomor, statusMeja FROM `meja`");
        $result = mysqli_fetch_all($result);
        return $result;
    }

    
    public function getStatusMeja(){
        $result = $this->database->query("SELECT statusMeja FROM $this->tabelMeja");
        $result = mysqli_fetch_all($result);
        return $result;
    }
}
?>