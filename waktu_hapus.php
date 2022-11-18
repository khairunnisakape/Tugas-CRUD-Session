<?php 
	include "koneksi.php";
	
	$id_waktu 	= $_GET['id_waktu'];	//data diambil dari URL
	$query 		= mysqli_query($koneksi, "DELETE FROM waktu WHERE id_waktu='$id_waktu' ");

	if($query){
		header("location: waktu.php?message=hapus_waktu_berhasil");
	} else{
		header("location: waktu.php?message=hapus_waktu_gagal");
	}
 ?>