<?php 
	include 'koneksi.php';

	$id_user 	= $_POST['nim'];			
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	
 	$sql		= "INSERT INTO user VALUES('$id_user','$username','$password')";
	$query		= mysqli_query($koneksi, $sql);

	if($query){
		header("location: login.php?message=berhasil");
	} else {
		header("location: register.php?message=gagal2");
	}


 ?>