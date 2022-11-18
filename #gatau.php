<?php  
									include('koneksi.php');

									$sql	= "SELECT * FROM lab";
									$query 	= mysqli_query($koneksi, $sql);

									while($data = mysqli_fetch_array($query)){

								?>
									<option align="left" value=<?= $data['id_lab']; ?>><?= $data['lab']; ?></option>
								<?php } ?>

<?php  
									include('koneksi.php');

									$sql	= "SELECT * FROM waktu";
									$query 	= mysqli_query($koneksi, $sql);

									while($data = mysqli_fetch_array($query)){
								?>	
									<option align="left" value=<?= $data['id_waktu']; ?>><?= $data['waktu_mulai'];?> - <?= $data['waktu_selesai'];?></option>
								<?php } ?>	
<?php  
							include('koneksi.php');
							$sql	= "SELECT * FROM jadwal INNER JOIN lab on jadwal.id_lab = lab.id_lab INNER JOIN waktu on jadwal.id_waktu = waktu.id_waktu";
							$query 	= mysqli_query($koneksi, $sql);
							$i = 0;
							while ($data = mysqli_fetch_array($sql)) {
								
						?>
						<div class="row">
							<div class="col"><?= $i++; ?></div>
							<div class="col" style="margin-bottom: 3%"><?= $data['mk']; ?></div>
							<div class="col"><?= $data['jurusan']; ?></div>
							<div class="col"><?= $data['lab']; ?></div>
							<div class="col"><?= $data['waktu']; ?></div>
							<div class="col">edit</div>
							<br><hr>
						</div>
						<?php } ?>