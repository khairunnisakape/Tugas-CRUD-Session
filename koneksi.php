<?php 
	$hostname	= "localhost"; //bawaan
	$username 	= "root";	//bawaan
	$password	= "";	//kosong
	$database	= "praktikum";	//nama database yang digunakan

	$koneksi	= new mysqli($hostname, $username, $password, $database);

	if ($koneksi->connect_error) {
		die("Error : ".$koneksi->connect_error);
		//pake "die" bakal ngasih output Error sekaligus ngasih tau errornya kenapa
	}

?>