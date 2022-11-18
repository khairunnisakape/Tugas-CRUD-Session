<?php  
	session_start();
	if(empty($_SESSION['username'])){
		header("location: login.php?message=belum_login");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab Praktikum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
	<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 h1 text-white">
				<?php  
					include ('koneksi.php');

					$sql	= "SELECT * FROM user";
					$query	= mysqli_query($koneksi, $sql);

					$data 	= mysqli_fetch_array($query);

				?>
				<?= $data['username']; ?> | <?= $data['id_user']; ?>
			</span>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-secondary btn btn-dark" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary btn btn-dark" href="lab.php">Lab</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active text-white" href="waktu.php" aria-current="page">Waktu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary btn btn-dark" href="jadwal.php">Jadwal</a>
					</li>
					<li class="nav-item" style="margin-left: 232%">
						<a class="nav-link text-secondary btn btn-dark" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<center>
		<br><br><br>
		<h1 class="fw-semibold fs-1">Ubah Waktu Praktikum</h1>
		<hr style="margin-left: 34%; margin-right: 34%">
		<p class="fw-semibold fs-6">Ubah waktu praktikum sesuai dengan yang diinginkan</p>
		<br>
		<form method="POST" action="waktu_edit_proses.php" style="margin-left: 35%; margin-right: 35%">
			<?php  
				include('koneksi.php');

				$sql	= "SELECT * FROM waktu";
				$query 	= mysqli_query($koneksi, $sql);
				$data	= mysqli_fetch_array($query);

			?>
			<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="waktu_mulai" placeholder="Masukkan Waktu Mulai Praktikum" value="<?= $data['waktu_mulai']; ?>" required=""><br>
			<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="waktu_selesai" placeholder="Masukkan Waktu Selesai Praktikum" value="<?= $data['waktu_selesai']; ?>" required=""><br>
			<?php  
				if(isset($_GET['message'])){
					if($_GET['message'] == "edit_waktu_gagal") {
						echo "Edit Waktu Gagal.";
					} 
				}
			?>
			<br>
			<button type="submit" class="btn btn-dark text-white btn-outline-secondary" style="padding-left: 10%; padding-right: 10%">Submit</button>
		</form>
	</center>
</body>
</html>