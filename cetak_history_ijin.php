<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>
<?php
//memasukkan file config.php
include('config.php');
?>

<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Index Data Perijinan Oditurat Militer II/09 Semarang</font>
    </center>
    <hr>
    <div id="search">
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jenis Ijin</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="item form-group">
                        <?php
                        //query ke database SELECT tabel berkas dengan minimal data per halaman 5
                        $sql = mysqli_query($koneksi, "SELECT ijin.*, akses.nama_lengkap FROM ijin JOIN akses 
                            ON ijin.username = akses.username WHERE status != 'Pending'") or die(mysqli_error($koneksi));


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
							<td>' . $data['nama_lengkap'] . '</td>
							<td>' . date('d M Y', strtotime($data['tanggal_masuk'])) . '</td>
							<td>' . date('d M Y', strtotime($data['tanggal_selesai'])) . '</td>
							<td>' . $data['jenis_ijin'] . '</td>
							<td>' . $data['keterangan'] . '</td>
							<td>' . $data['status'] . '</td>
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
                        <script>
                            window.print();
                        </script>
                <tbody>
            </table>
        </div>
    </div>
</div>