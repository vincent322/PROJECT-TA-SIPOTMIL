<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Berkas</font></center>
		<hr>
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
				<?php
				//query ke database SELECT tabel berkas urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM berkas ORDER BY kode_registrasi DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['kode_registrasi'].'</td>
							<td>'.$data['nama_tersangka'].'</td>
							<td>'.$data['tanggal'].'</td>
							<td>'.$data['kesatuan'].'</td>
							<td>'.$data['status_berkas'].'</td>
							<td>
								<a href="index.php?page=edit_berkas&kode_registrasi='.$data['kode_registrasi'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete_berkas.php?kode_registrasi='.$data['kode_registrasi'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
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
