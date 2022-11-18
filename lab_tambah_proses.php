<?php 
	include 'koneksi.php';

	$lab 		= $_POST['lab'];
	$sql		= "INSERT INTO lab VALUES('','$lab')";
	$query		= mysqli_query($koneksi, $sql);

	if($query){
		header("location: lab.php?message=tambah_lab_berhasil");
	} else {
		header("location: lab_tambah.php?message=tambah_lab_gagal");
	}


 ?>