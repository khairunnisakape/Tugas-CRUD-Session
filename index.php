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
    <title>Home Page</title>
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
				<ul class="navbar-nav" style="margin-left: 91%">
					<li class="nav-item">
						<a class="nav-link text-secondary btn btn-dark" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br><br><br><br><br>
	<center>
		<h1 class="fw-semibold fs-6">Selamat datang di</h1>
		<h1 class="fw-semibold fs-1">Praktikum Informatika</h1>
		<br><br><br>
		<div class="mb-3">
			<div class="container text-center">
				<div class="row" style="margin-left: 12%; margin-right: 12%">
					<div class="col">
						<a class="btn btn-dark text-white btn-outline-secondary" href="lab.php" style="padding-right: 46%; padding-left: 46%">Lab</a>
					</div>
					<div class="col">
						<a class="btn btn-dark text-white btn-outline-secondary" href="waktu.php" style="padding-right: 34%; padding-left: 34%">Waktu Praktikum</a>
					</div>
				</div>
			</div>
		</div>
		<a class="btn btn-dark text-white btn-outline-secondary" href="jadwal.php" style="padding-right: 27.25%; padding-left: 27.25%">Jadwal Praktikum</a>
	</center>
</body>
</html>