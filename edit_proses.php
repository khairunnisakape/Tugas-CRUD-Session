<?php 
	include ('koneksi.php');

	$id_jadwal	= $_POST['id_jadwal'];
	$mk			= $_POST['mk'];
	$jurusan	= $_POST['jurusan'];
	$id_lab		= $_POST['lab'];
	$id_waktu	= $_POST['waktu'];

	$data		= "UPDATE jadwal SET mk = '$mk', jurusan = '$jurusan', id_lab = '$id_lab', id_waktu = '$id_waktu' WHERE id_jadwal = '$id_jadwal' ";
	$query 		= mysqli_query($koneksi, $data);

	if ($query) {
		header("location: jadwal.php?message=edit_jadwal_berhasil");
	} else{
		header("location: edit.php?message=edit_jadwal_gagal");
	}
?>