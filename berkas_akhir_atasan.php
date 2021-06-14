<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
?>

<?php
//memasukkan file config.php
include('config.php');
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Berkas Verifikasi Akhir Kepala</font>
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
						<th>Jenis Pidana</th>
						<th>Status Berkas</th>
						<th>Catatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<div class="item form-group">
						<?php

						//query ke database SELECT tabel berkas dengan minimal data per halaman 5
						$sql = mysqli_query($koneksi, "SELECT * FROM berkas where status_berkas ='Diproses Kepala Tahap Akhir'") or die(mysqli_error($koneksi));


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
							<td>' . date('d M Y', strtotime($data['tanggal'])) . '</td>
							<td>' . $data['kesatuan'] . '</td>
							<td>' . $data['jenis_pidana'] . '</td>
							<td>' . $data['status_berkas'] . '</td>
							<td>' . $data['catatan'] . '</td>
							<td>
							<a href="?page=setujui_berkas&kode_registrasi=' . $data['kode_registrasi'] . '" class="btn btn-success btn-sm">Setujui Berkas</a>
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
				<tbody>
			</table>
		</div>
	</div>
</div>