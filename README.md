# Sistem Absensi Pegawai

Sistem Absensi Pegawai adalah aplikasi manajemen absensi berbasis web yang dirancang untuk membantu perusahaan dalam melacak dan mengelola kehadiran pegawai secara efisien. Dengan antarmuka yang intuitif, sistem ini memungkinkan pengguna untuk menandai kehadiran, membuat laporan, dan mengelola data pegawai dengan mudah.

![image alt](https://github.com/ramdhini/Sistem-Absensi/blob/bfbb097b49b2d8c87da9d57b161fb411277f3096/Sistem-Absensi.png)

## Fitur Utama

* **Pencatatan Kehadiran:** Karyawan dapat dengan mudah untuk melakukan absensi ataupun memberikan keterangan izin melalui antarmuka web.
* **Manajemen Data Pegawai:** Admin dapat melihat seluruh data pegawai serta mengelola nya dengan menambahkan data pegawai baru dan menghapus data pegawai yang sudah ada
* **Manajemen Data Admin:** Selain pegawai, admin dapat melihat dan mengelola data admin lainnya dengan menambah atau menghapus data
* **Manajemen Data Jabatan:** Admin dapat melihat seluruh jabatan yang dimiliki pegawai serta bisa melakukan penambahan atau penghapusan data jabatan
* **Laporan Absensi:** Admin dapat melihat data karyawan yang telah melakukan absensi secara rindi, serta dapat melihat data karyawan yang melakukan perizinan tidak absen
* **Antarmuka Intuitif:** Desain yang ramah pengguna untuk navigasi dan pengoperasian yang mudah.
* **Otentikasi Pengguna:** Sistem login untuk memastikan akses yang aman.

## Teknologi yang Digunakan

* **Frontend:**
    * HTML5
    * CSS
* **Backend:**
    * PHP
* **Database:**
    * MySQL

## Persyaratan Sistem

Untuk menjalankan sistem ini, Anda memerlukan lingkungan server web yang mendukung PHP dan MySQL. Rekomendasi:

* **Web Server:** Apache atau Nginx
* **PHP:** Versi 7.x atau lebih tinggi
* **MySQL:** Versi 5.x atau lebih tinggi
* **XAMPP/WAMP/MAMP:** Direkomendasikan untuk pengembangan lokal karena sudah bundling Apache, MySQL, dan PHP.

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan Sistem Absensi Pegawai di lingkungan lokal Anda:

1.  **Clone Repository:**
    ```bash
    git clone [https://github.com/ramdhini/Sistem-Absensi.git](https://github.com/ramdhini/Sistem-Absensi.git)
    ```
    Atau unduh file ZIP dari repositori.

2.  **Pindahkan ke Direktori Web Server:**
    * Jika menggunakan XAMPP, pindahkan folder `SistemAbsensiKaryawan` ke `C:\xampp\htdocs\`.
    * Jika menggunakan WAMP, pindahkan ke `C:\wamp64\www\`.
    * Jika menggunakan MAMP, pindahkan ke direktori `htdocs` MAMP Anda.

3.  **Buat Database:**
    * Buka phpMyAdmin (biasanya melalui `http://localhost/phpmyadmin`).
    * Buat database baru dengan nama `dataabsensi`
      
4.  **Impor Database:**
    * Pilih database `dataabsensi` yang baru Anda buat.
    * Klik tab `Import`.
    * Pilih file SQL database `dataabsensi` yang terdapat pada repository
    * Klik `Go` untuk mengimpor tabel.

5.  **Konfigurasi Koneksi Database:**
    * Buka file konfigurasi database (`koneksi.php`) di dalam folder proyek Anda.
    ```
     * Pastikan isinya sudah seperti ini:
        ```php
        <?php 
        $koneksi = mysqli_connect("localhost", "root", "", "dataabsensi");

        if (!$koneksi) {
            echo "koneksi database gagal"; 
        } 
        ?>
        ```
        (Tidak ada perubahan yang diperlukan jika file Anda sudah seperti di atas, karena sudah sesuai dengan pengaturan XAMPP/WAMP default dan nama database `dataabsensi`).

6.  **Akses Aplikasi:**
    * Buka browser web Anda dan navigasi ke `http://localhost/Sistem-Absensi/` (sesuaikan jika nama folder Anda berbeda).

## Kredensial Default (Contoh)

* **Admin:**
    * Username: `admin`
    * Password: `admin` 

* **Karyawan:**
    * Username: `bagas`
    * Password: `bagas123` 

*(Pastikan untuk mengubah kredensial default setelah instalasi untuk keamanan!)*

## Kontribusi

Kontribusi disambut baik! Jika Anda ingin berkontribusi, silakan fork repositori ini dan buat pull request dengan fitur atau perbaikan Anda.


## Kontak
Jika Anda memiliki pertanyaan atau saran, silakan hubungi:

* [Ramdhini] - [ramdhininovita0811@gmail.com]
