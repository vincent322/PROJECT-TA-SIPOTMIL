<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}

?>

<?php
//memasukkan file config.php
include('config.php');
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Perijinan</font>
	</center>
	<hr>
	<div id="search">
		<div class="table-responsive">
			<table class="table table-striped jambo_table bulk_action">
				<thead>
					<tr>
						<th>NO.</th>
						<th>Username</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Jenis Ijin</th>
						<th>Keterangan</th>
                        <th>Nama Lengkap</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
						<div class="item form-group">
							<?php
							//paginasi
							$batas = 5;
							$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

							$posisi = 0;
							$previous = $halaman - 1;
							$next = $halaman + 1;

							$data = mysqli_query($koneksi, "SELECT * FROM ijin");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);

							//query ke database SELECT tabel berkas dengan minimal data per halaman 5
							$sql = mysqli_query($koneksi, "SELECT ijin.*, akses.nama_lengkap FROM ijin JOIN akses 
                            ON ijin.username = akses.username") or die(mysqli_error($koneksi));


							//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
							if (mysqli_num_rows($sql) > 0) {
								//membuat variabel $no untuk menyimpan nomor urut
								$no = 1 + $halaman_awal;
								//melakukan perulangan while dengan dari dari query $sql
								while ($data = mysqli_fetch_assoc($sql)) {
									//menampilkan data perulangan
									echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['username'] . '</td>
							<td>' . $data['tanggal_mulai'] . '</td>
							<td>' . $data['tanggal_selesai'] . '</td>
							<td>' . $data['jenis_ijin'] . '</td>
							<td>' . $data['keterangan'] . '</td>
                            <td>' . $data['nama_lengkap'] . '</td>
							<td>
								<a href="?page=edit_berkas&kode_registrasi=' . $data['kode_registrasi'] .
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
			<nav>
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link" <?php if ($halaman > 1) {
													echo "href='?page=tampil_berkas&halaman=$previous'";
												} ?>>Previous</a>
					</li>
					<?php
					for ($x = 1; $x <= $total_halaman; $x++) {
					?>
						<li class="page-item"><a class="page-link" href="?page=tampil_berkas&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
					}
					?>
					<li class="page-item">
						<a class="page-link" <?php if ($halaman < $total_halaman) {
													echo "href='?page=tampil_berkas&halaman=$next'";
												} ?>>Next</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>