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
    <title>Jadwal Praktikum</title>
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
						<a class="nav-link text-secondary btn btn-dark" href="waktu.php">Waktu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active text-white" href="jadwal.php" aria-current="page">Jadwal</a>
					</li>
					<li class="nav-item" style="margin-left: 232%">
						<a class="nav-link text-secondary btn btn-dark" href="">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br><br>
	<center>
		<div class="container text-center">
			<div class="row">
				<div class="col">
					<div class="container text-center">
						<div class="row">
							<div class="col">No</div>
							<div class="col" style="margin-bottom: 3%">MK Praktikum</div>
							<div class="col">Jurusan</div>
							<div class="col">Lab</div>
							<div class="col">Waktu</div>
							<div class="col">Action</div>
							<br><hr>
						</div>
						<?php  
							include('koneksi.php');
							
							$sql	= "SELECT * FROM jadwal INNER JOIN lab on jadwal.id_lab = lab.id_lab INNER JOIN waktu on jadwal.id_waktu = waktu.id_waktu";
							$query 	= mysqli_query($koneksi, $sql);
							$i = 1;
							
							while ($data = mysqli_fetch_array($query)) {
								
						?>
						<div class="row">
							<div class="col"><?= $i++; ?></div>
							<div class="col"><?= $data['mk']; ?></div>
							<div class="col"><?= $data['jurusan']; ?></div>
							<div class="col"><?= $data['lab']; ?></div>
							<div class="col"><?= $data['waktu_mulai'].'-'.$data['waktu_selesai']; ?></div>
							<div class="col mb-2">
								<a href="edit.php?id_jadwal=<?php echo $data['id_jadwal'];?>" class="btn btn-dark text-white btn-outline-primary mb-1">Edit</a>
								<a href="hapus.php?id_jadwal=<?php echo $data['id_jadwal'];?>" class="btn btn-dark text-white btn-outline-danger mb-1">Hapus</a>
							</div>
							<br><hr>
						</div>
						<?php };  
							if(isset($_GET['message'])){
								if($_GET['message'] == "hapus_jadwal_gagal") {
									echo "Hapus Jadwal Gagal.";
								} elseif ($_GET['message'] == "hapus_jadwal_berhasil") {
									echo "Hapus Jadwal Berhasil.";
								} elseif ($_GET['message'] == "edit_jadwal_berhasil") {
									echo "Edit Jadwal Berhasil.";
								}
							}
						?>
					</div>
				</div>
				<div class="col">
					<h1 class="fw-semibold fs-1">Input Jadwal Praktikum</h1><hr>
					<p class="fw-semibold fs-6">Buat jadwal praktikum sesuai dengan yang diinginkan</p>
					<br>
					<form method="POST" action="jadwal_proses.php" style="padding-left: 11%; padding-right: 11%" >
						<div class="row mb-3">
							<div class="col-8">
								<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="mk" placeholder="Masukkan MK Praktikum" required="">	
							</div>
							<div class="col-2" style="">
								<div class="form-check" style="">
									<input class="form-check-input" type="radio" name="jurusan" required="" value="IF">
									<label class="form-check-label" for="flexRadioDefault1">IF</label>
								</div>
							</div>
							<div class="col-2" style="">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jurusan" required="" value="SI">
									<label class="form-check-label" for="flexRadioDefault2">SI</label>
								</div>	
							</div>
						</div>
						<div class="mb-3">
							<select class="btn btn-dark text-white btn-outline-secondary dropdown-toggle fs-6" data-bs-toggle="dropdown" style="padding-left: 15%; padding-right: 43%" name="lab" required="">
								<?php  
									include('koneksi.php');

									$sql	= "SELECT * FROM lab";
									$query 	= mysqli_query($koneksi, $sql);

									while($data = mysqli_fetch_array($query)){

								?>
									<option  align="left" value=<?= $data['id_lab']; ?>><?= $data['lab']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<select class="btn btn-dark text-white btn-outline-secondary dropdown-toggle fs-6" data-bs-toggle="dropdown" style="padding-left: 15%; padding-right: 49%" name="waktu" required="">
								<?php  
									include('koneksi.php');

									$sql	= "SELECT * FROM waktu";
									$query 	= mysqli_query($koneksi, $sql);

									while($data = mysqli_fetch_array($query)){
								?>	
									<option align="left" value=<?= $data['id_waktu']; ?>><?= $data['waktu_mulai'];?> - <?= $data['waktu_selesai'];?></option>
								<?php } ?>	
							</select>
						</div>
						<?php  
							if(isset($_GET['message'])){
								if($_GET['message'] == "input_jadwal_gagal") {
									echo "Input Jadwal Gagal.";
								} elseif ($_GET['message'] == "input_jadwal_berhasil") {
									echo "Input Jadwal Berhasil.";
								} 
							}
						?>
						<br><br>
						<div class="row mb-3">
							<div class="col">
								<button type="submit" class="btn btn-dark text-white btn-outline-secondary" style="padding-right: 40%; padding-left: 40%">Submit</button>	
							</div>
							<div class="col">
								<button type="reset" class="btn btn-dark text-white btn-outline-secondary" style="padding-right: 40%; padding-left: 40%">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</center>
</body>
</html>