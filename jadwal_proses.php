<?php 
	include('koneksi.php');

	$mk			= $_POST['mk'];
	$jurusan	= $_POST['jurusan'];
	$id_lab		= $_POST['lab'];
	$id_waktu	= $_POST['waktu'];

	$sql		= "INSERT INTO jadwal VALUES('','$mk','$jurusan','$id_lab','$id_waktu')";
	$query 		= mysqli_query($koneksi, $sql);

	if ($query) {
		header("location: jadwal.php?message=input_jadwal_berhasil");
	} else{
		header("location: jadwal.php?message=input_jadwal_gagal");
	}
?>