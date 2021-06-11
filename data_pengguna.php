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
		<font size="6">Data Pengguna Sistem</font>
	</center>
	<hr>
	<div id="search">
		<div class="table-responsive">
			<table class="table table-striped jambo_table bulk_action">
				<thead>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Tanggal Lahir</th>
						<th>Pangkat</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
						<div class="item form-group">
							<?php
                            $data = mysqli_query($koneksi, "SELECT * FROM berkas");
							//query ke database SELECT tabel berkas dengan minimal data per halaman 5
							$sql = mysqli_query($koneksi, "SELECT * FROM akses") or die(mysqli_error($koneksi));


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
							<td>' . $data['username'] . '</td>
							<td>' . $data['nama_lengkap'] . '</td>
							<td>' . date('d M Y', strtotime($data['tanggal_lahir'])) . '</td>
							<td>' . $data['Pangkat'] . '</td>
							<td>' . $data['level'] . '</td>
                            <td>
                            <a href="?page=edit_user&username=' . $data['username'] .
										'" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete_user.php?username=' . $data['username'] .
										'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a> 
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