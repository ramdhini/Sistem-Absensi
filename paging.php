<head>
    <style>
        .btn-hapus{
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            background-color: #e74c3c;
        }
    </style>
</head>

<?php 
include 'koneksi.php';

$batas = 5; //banyaknya data perhalaman
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1; //halaman brp yg aktif
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0; //menentukan data pertama di halaman tsb

$previous = $halaman - 1; //sebelum
$next = $halaman + 1; //sesudah

$data = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
$jumlah_data = mysqli_num_rows($data); //cek setiap baris, ada berapa data/baris
$total_halaman = ceil($jumlah_data / $batas); //membulatkan ke atas

$data_karyawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan LIMIT $halaman_awal, $batas"); //limit: batasin data yg tampil [data awal, banyakdata]
$nomor = $halaman_awal+1;

if (isset($_GET['cari'])) {
	$cari = $_GET['cari'];

	$data = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nama LIKE '%".$cari."%'");
}else{
	$data = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
}


while ($row=mysqli_fetch_array($data_karyawan)) { //ngambil semua data
	
 ?>

<tr>
                                         
    <td><?php echo $row['id_karyawan']; ?></td>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['tmp_tgl_lahir']; ?></td>
    <td><?php echo $row['jenkel']; ?></td>
    <td><?php echo $row['agama']; ?></td>
    <td><?php echo $row['alamat']; ?></td>
    <td><?php echo $row['no_tel']; ?></td>
    <td><?php echo $row['jabatan']; ?></td>
    <td><img src="images/<?php echo $row['foto'];?>" ></td>

    <td><a href="hapus.php?id_karyawan=<?php echo $row['id_karyawan']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>


                                                
</tr>
<?php } ?>

