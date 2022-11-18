<?php 
	
	session_start();

	include 'koneksi.php';

	$username	= $_POST['username'];
	$password 	= $_POST['password'];

	$sql		= "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$data		= mysqli_query($koneksi, $sql);
	$cek		= mysqli_num_rows($data);	//untuk cek tiap data yg masuk dengan data yg ada di server

	if ($cek > 0) {
		$_SESSION['username']	= $username;
		$_SESSION['status']		= "login";
		header("location: index.php");
	} else{
		header("location: login.php?message=gagal");
	}

?>