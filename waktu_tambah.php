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
		<h1 class="fw-semibold fs-1">Tambah Waktu Praktikum</h1>
		<hr style="margin-left: 32%; margin-right: 32%">
		<p class="fw-semibold fs-6">Tambah waktu praktikum sesuai dengan yang diinginkan</p>
		<br>
		<form method="POST" action="waktu_tambah_proses.php" style="margin-left: 35%; margin-right: 35%">
			<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="waktu_mulai" placeholder="Masukkan Waktu Mulai Praktikum" required="" ><br>
			<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="waktu_selesai" placeholder="Masukkan Waktu Selesai Praktikum" required=""><br>
			<?php  
				if(isset($_GET['message'])){
					if ($_GET['message'] == "tambah_waktu_gagal") {
						echo "Tambah Waktu Gagal.";
					}
				}
			?>
			<br>
			<button type="submit" class="btn btn-dark text-white btn-outline-secondary" style="padding-left: 10%; padding-right: 10%">Submit</button>
		</form>
	</center>
</body>
</html>