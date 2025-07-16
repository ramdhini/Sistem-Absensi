<head>
	 <style> /*STYLE CSS BUAT BUTTON AKSI (HAPUS)*/
        .btn-hapus{
        background-color: #e74c3c;
        border: none;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer; }

        .btn-hapus:hover {
        background-color: #c0392b;
        }
     </style>
</head>
<?php 
include 'koneksi.php';

$batas = 5; //PEMBATAS BANYAK DATA YANG TAMPIL PER HALAMAN
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;  //HALAMAN AKTIF
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0; //DATA PERTAMA PERHALAMAN

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_keterangan");
$jumlah_data = mysqli_num_rows($data); //CEK SETIAP BARIS BERAPA JUMLAHNYA
$total_halaman = ceil($jumlah_data / $batas); //ITUNG BANYAK HALAMAN

$data_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_keterangan LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;


while ($row=mysqli_fetch_array($data_karyawan)) {
	



 ?>

  <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['id_karyawan']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['alasan']; ?></td>
                                                <td><?php echo $row['waktu']; ?></td>
                                               
                                                <td>
                                                    <?php 

                                                    if ($row['bukti']!='') {
                                                        echo "<img src=\" karyawan/modul/karyawan/images/$row[bukti]\" />";
                                                    }else{
                                                        echo "images";
                                                    }

                                                     ?>
                                                    

                                                </td>
                                                <td><a href="absen/hapus_keterangan.php?id=<?php echo $row['id']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

