<?php 
	include "koneksi.php";
	
	$id_jadwal 	= $_GET['id_jadwal'];	//data diambil dari URL
	$query 		= mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal' ");

	if($query){
		header("location: jadwal.php?message=hapus_jadwal_berhasil");
	} else{
		header("location: jadwal.php?message=hapus_jadwal_gagal");
	}
 ?>