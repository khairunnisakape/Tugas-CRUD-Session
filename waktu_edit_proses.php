<?php 
	include ('koneksi.php');

	$id_waktu		= $_POST['id_waktu'];
	$waktu_mulai	= $_POST['waktu_mulai'];
	$waktu_selesai	= $_POST['waktu_selesai'];
	
	$data		= "UPDATE waktu SET waktu_mulai = '$waktu_mulai', waktu_selesai = '$waktu_selesai' WHERE id_waktu = '$id_waktu' ";
	$query 		= mysqli_query($koneksi, $data);

	if ($query) {
		header("location: waktu.php?message=edit_waktu_berhasil");
	} else{
		header("location: waktu_edit.php?message=edit_waktu_gagal");
	}
?>