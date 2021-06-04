<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
?>

<?php
include('../config.php');
$keyword = $_GET['keyword'];
?>
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
				<?php
				//paginasi
				$batas = 5;
				$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

				$posisi = 0;
				$previous = $halaman - 1;
				$next = $halaman + 1;

				$data = mysqli_query($koneksi, "SELECT * FROM berkas");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);

				//query ke database SELECT tabel berkas urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM berkas WHERE nama_tersangka like '%$keyword%' LIMIT $halaman_awal, $batas");

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