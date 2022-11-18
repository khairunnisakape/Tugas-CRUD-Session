<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
	<br><br><br><br><br>
	<center>
		<h1 class="fw-semibold fs-1">Register Page</h1>
		<hr style="margin-left: 35%; margin-right: 35%">
		<?php  
			if (isset($_GET['message'])) {
				if ($_GET['message'] == "gagal2") {
					echo "Registrasi Gagal.";
				}
			}
		?>
		<form method="POST" action="register_proses.php" style="margin-left: 35%; margin-right: 35%">
			<br>
			<div class="mb-3">
				<input type="text" class="form-control form-control-sm bg-dark text-white pt-2 pb-2" 
				name="nim" placeholder="Masukkan nim">	
			</div>
			<div class="mb-3">
				<input type="text" class="form-control form-control-sm bg-dark text-white pt-2 pb-2" 
				name="username" placeholder="Masukkan username">	
			</div>
			<div class="mb-3">
				<input type="password" class="form-control form-control-sm bg-dark text-white pt-2 pb-2" name="password" placeholder="Masukkan password">
			</div>
			<br>
			<button type="submit" class="btn btn-dark text-white btn-outline-secondary" style="padding-right: 42%; padding-left: 42.5%">SIGN IN</button>
		</form><br>
		Sudah punya akun? <a href="login.php" class="text-white">Klik disini</a>
	</center>
</body>
</html>