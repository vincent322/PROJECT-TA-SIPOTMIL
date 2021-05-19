<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Perkara</font>
	</center>
	<hr>
	<div id="search">
		<div class="table-responsive">
			<table class="table table-striped jambo_table bulk_action">
				<thead>
					<tr>
						<th>No.</th>
						<th>Kode Registrasi</th>
						<th>Nama Tersangka</th>
						<th>Tanggal Masuk</th>
						<th>Kesatuan</th>
						<th>Status Berkas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<form action="" method="post">
						<div class="item form-group">
							<div class="col-md-6 col-sm-6 ">
								<input type="text" name="keyword" class="form-control" size="4" autofocus placeholder="Cari Data" autocomplete="off" id="keyword">
							</div>

							<?php

							//PAGINATION
							/*
							$jumlahDataPerHalaman = 5;
							$result = mysqli_query($koneksi, "SELECT * FROM berkas");
							mysqli_num_rows($result);
							*/

							//query ke database SELECT tabel berkas urut berdasarkan id yang paling besar
							$sql = mysqli_query($koneksi, "SELECT * FROM berkas") or die(mysqli_error($koneksi));

							if (isset($_POST['cari'])) {
								$keyword = $_POST['keyword'];
								$query = "SELECT * FROM berkas WHERE nama_tersangka like '%$keyword%'";
								$result = mysqli_query($koneksi, $query);
							}

							//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
							if (mysqli_num_rows($sql) > 0) {
								//membuat variabel $no untuk menyimpan nomor urut
								$no = 1;
								//melakukan perulangan while dengan dari dari query $sql
								while ($data = mysqli_fetch_assoc($sql)) {
									//menampilkan data perulangan
									echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['kode_registrasi'] . '</td>
							<td>' . $data['nama_tersangka'] . '</td>
							<td>' . $data['tanggal'] . '</td>
							<td>' . $data['kesatuan'] . '</td>
							<td>' . $data['status_berkas'] . '</td>
							<td>
								<a href="index.php?page=edit_berkas&kode_registrasi=' . $data['kode_registrasi'] .
										'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete_berkas.php?kode_registrasi=' . $data['kode_registrasi'] .
										'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
								<a href="download_berkas.php?kode_registrasi=' . $data['kode_registrasi'] .
										'" class="btn btn-primary btn-sm">Download File</a>
							</td>
						</tr>
						';
									$no++;
								}
								//jika query menghasilkan nilai 0
							} else {
								echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
							}
							?>
							<script src="assets/js/script.js"></script>
				<tbody>
			</table>
		</div>
	</div>
</div>