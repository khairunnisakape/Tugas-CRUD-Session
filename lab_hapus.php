<?php 
	include "koneksi.php";
	
	$id_lab 	= $_GET['id_lab'];	//data diambil dari URL
	$query 		= mysqli_query($koneksi, "DELETE FROM lab WHERE id_lab='$id_lab' ");

	if($query){
		header("location: lab.php?message=hapus_lab_berhasil");
	} else{
		header("location: lab.php?message=hapus_lab_gagal");
	}
 ?>