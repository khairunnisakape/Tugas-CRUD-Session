<?php 
	include 'koneksi.php';

	$waktu_mulai	= $_POST['waktu_mulai'];
	$waktu_selesai	= $_POST['waktu_selesai'];
	
	$sql			= "INSERT INTO waktu VALUES('','$waktu_mulai','$waktu_selesai')";
	$query			= mysqli_query($koneksi, $sql);

	if($query){
		header("location: waktu.php?message=tambah_waktu_berhasil");
	} else {
		header("location: waktu_tambah.php?message=tambah_waktu_gagal");
	}


 ?>