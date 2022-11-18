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
	<a href="waktu_tambah.php"><button class="btn btn-dark text-white btn-outline-secondary"> + Tambah Data</button></a><br><br>	
	<center>
		<div class="container text-center">
			<div class="row">
				<div class="col fw-semibold fs-3">No</div>
				<div class="col mb-3 fw-semibold fs-3">Waktu Mulai</div>
				<div class="col mb-3 fw-semibold fs-3">Waktu Selesai</div>
				<div class="col fw-semibold fs-3">Action</div>
				<br><hr>
			</div>
			<?php  
				include('koneksi.php');
							
				$sql	= "SELECT * FROM waktu";
				$query 	= mysqli_query($koneksi, $sql);
				$i = 1;
			
				while ($data = mysqli_fetch_array($query)) {
								
			?>
			<div class="row">
				<div class="col"><?= $i++; ?></div>
				<div class="col"><?= $data['waktu_mulai']; ?></div>
				<div class="col"><?= $data['waktu_selesai']; ?></div>
				<div class="col mb-2">
					<a href="waktu_edit.php?id_waktu=<?php echo $data['id_waktu'];?>" class="btn btn-dark text-white btn-outline-primary mb-1">Edit</a>
					<a href="waktu_hapus.php?id_waktu=<?php echo $data['id_waktu'];?>" class="btn btn-dark text-white btn-outline-danger mb-1">Hapus</a>
				</div>
				<br><hr>
			</div>
			<?php };  
			 	if(isset($_GET['message'])){
			 		if($_GET['message'] == "hapus_waktu_gagal") {
						echo "Hapus Waktu Gagal.";
					} elseif ($_GET['message'] == "hapus_waktu_berhasil") {
						echo "Hapus Waktu Berhasil.";
					} elseif ($_GET['message'] == "edit_waktu_berhasil") {
						echo "Edit Waktu Berhasil.";
					} elseif ($_GET['message'] == "tambah_waktu_berhasil") {
						echo "Tambah Waktu Berhasil.";
					} 
				}
			?>
		</div>
	</center>
</body>
</html>