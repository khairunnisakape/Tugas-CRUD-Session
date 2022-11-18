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
    <title>Edit Jadwal Praktikum</title>
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
						<a class="nav-link text-secondary btn btn-dark" href="">Waktu</a>
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
	<br><br><br>
	<center>
		<h1 class="fw-semibold fs-1">Ubah Jadwal Praktikum</h1>
		<hr style="margin-left: 33%; margin-right: 33%">
		<p class="fw-semibold fs-6">Ubah jadwal praktikum sesuai dengan yang diinginkan</p>
		<br>
		<form method="POST" action="edit_proses.php" style="margin-left: 35%; margin-right: 35%" >
			<?php  
				include('koneksi.php');
							
				$sql	= "SELECT * FROM jadwal INNER JOIN lab on jadwal.id_lab = lab.id_lab INNER JOIN waktu on jadwal.id_waktu = waktu.id_waktu";
				$query 	= mysqli_query($koneksi, $sql);
							
				$data = mysqli_fetch_array($query);
								
			?>
			<div class="row mb-3">
				<input class="form-check-input" type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
				<div class="col-8">
					<input type="text" class="form-control bg-dark text-white pt-2 pb-2" name="mk" placeholder="Masukkan MK Praktikum" value="<?= $data['mk'];  ?>" required="">
				</div>
				<div class="col-2" style="">
					<div class="form-check" >
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
				<select class="btn btn-dark text-white btn-outline-secondary dropdown-toggle fs-6" data-bs-toggle="dropdown" style="padding-left: 15%; padding-right: 40%" name="lab" required="">
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
				<select class="btn btn-dark text-white btn-outline-secondary dropdown-toggle fs-6" data-bs-toggle="dropdown" style="padding-left: 15%; padding-right: 46%" name="waktu" required="">
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
					if($_GET['message'] == "edit_jadwal_gagal") {
						echo "Edit Jadwal Gagal.";
					} 
				}
			?>
			<br><br>
			<div class="row mb-3" align="center">
				<div class="col-5">
					<button type="submit" class="btn btn-dark text-white btn-outline-secondary" style="padding-left: 40%; padding-right: 40%">Submit</button>	
				</div>
				<div class="col-2"></div>
				<div class="col-5">
					<button type="reset" class="btn btn-dark text-white btn-outline-secondary" style="padding-left: 40%; padding-right: 40%">Reset</button>
				</div>
			</div>
		</form>
	</center>
</body>
</html>