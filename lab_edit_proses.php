<?php 
	include ('koneksi.php');

	$id_lab		= $_POST['id_lab'];
	$lab		= $_POST['lab'];
	
	$data		= "UPDATE lab SET lab = '$lab' WHERE id_lab = '$id_lab' ";
	$query 		= mysqli_query($koneksi, $data);

	if ($query) {
		header("location: lab.php?message=edit_lab_berhasil");
	} else{
		header("location: lab_edit.php?message=edit_lab_gagal");
	}
?>