<?php


class pesanan
{

	public $mysqli;
    protected $pesanantable = "pesanan";

	public function __construct(){
        $this->database = new koneksi();
        $this->database = $this->database->mysqli;
	}

    public function isDetailPesananEmpty(){
        if (isset($_SESSION["pesanan"])){
            $count = 0;
            foreach ($_SESSION["pesanan"] as $idMenu => $jumlahItem) :
            if ($jumlahItem > 0){
                $count++;
            }
            endforeach;
            if ($count > 0){
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function destroy(){
        unset($_SESSION["pesanan"]);
    }

    public function increment($idMenu){
        $_SESSION["pesanan"][$idMenu] += 1;
        return $_SESSION["pesanan"][$idMenu];
    }

    public function decrement($idMenu){
        $_SESSION["pesanan"][$idMenu] -= 1;
        return $_SESSION["pesanan"][$idMenu];
    }
}
?>