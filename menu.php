<?php

class menu
{

	public $mysqli;
    private $tabelMenu = "menu";

	public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
	}

    public function isMenuEmpty(){
        $result = $this->database->query("SELECT COUNT(*) FROM $this->tabelMenu");
        $result = mysqli_fetch_all($result);
        return $result > 0;
    }

    public function isAvailable($status){
        if ($status == 0){
            return false;
        } else {
            return true;
        }
    }
}
?>