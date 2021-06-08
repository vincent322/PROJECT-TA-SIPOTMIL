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
        <font size="6">Index Data Berkas Perkara Oditurat Militer II/09 Semarang</font>
    </center>
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
                </tr>
            </thead>
            <tbody>
                <div class="item form-group">
                    <?php

                    //query ke database SELECT tabel berkas dengan minimal data per halaman 5
                    $sql = mysqli_query($koneksi, "SELECT * FROM berkas") or die(mysqli_error($koneksi));


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
        <a href="index.php?page=tampil_berkas" class="btn btn-info">Kembali</a>
    </div>
</div>