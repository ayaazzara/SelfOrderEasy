<?php

class koneksi
{

	public $mysqli;

	public function __construct()
	{
		$db_host = "localhost";
		$db_user = "root";
		$db_pass = "azzara";
		$db_name = "so_easy";

		$this->mysqli =  mysqli_connect($db_host, $db_user, $db_pass, $db_name);

		if (mysqli_connect_errno()) {
			echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
		}
	}
}