<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $nim = $_POST['nim'];
   $nama_lengkap = $_POST['nama_lengkap'];
   $jk = $_POST['jk'];
   $agama = $_POST['agama'];
   $tempat_lahir = $_POST['tempat_lahir'];
   $tanggal_lahir = $_POST['tanggal_lahir'];
   $alamat = $_POST['alamat'];
   $telepon = $_POST['telepon'];
   $email = $_POST['email'];
   $telepon_ortu = $_POST['telepon_ortu'];
   $nama_ayah = $_POST['nama_ayah'];
   $nama_ibu = $_POST['nama_ibu'];
   $tahun_akademik = $_POST['tahun_akademik'];
   $status = $_POST['status'];
   $jurusan = $_POST['jurusan'];

   // ambil data file hasil submit dari form
   $nama_file = $_FILES['foto']['name'];
   $tmp_file = $_FILES['foto']['tmp_name'];
   $extension = array_pop(explode(".", $nama_file));
   // enkripsi nama file
   $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
   // tentukan direktori penyimpanan file
   $path = "../../assets/image/" . $nama_file_enkripsi;

   if (empty($nama_file)) {
      $sql = $conn->query("INSERT INTO mahasiswa 
      (nim, nama, jk, agama, tempat_lahir, tanggal_lahir, alamat, telp, email, nama_ayah, nama_ibu, telp_ortu, tahun_akademik, status, jurusan_id) VALUES ('$nim', '$nama_lengkap', '$jk', '$agama', '$tempat_lahir', '$tanggal_lahir', '$alamat','$telepon', '$email', '$nama_ayah', '$nama_ibu', '$telepon_ortu','$tahun_akademik', '$status', '$jurusan')") or die('Ada kesalahan pada query insert : ' . $conn->error);
   } else {
      if (move_uploaded_file($tmp_file, $path)) {
         $sql = $conn->query("INSERT INTO mahasiswa 
      (nim, nama, jk, agama, tempat_lahir, tanggal_lahir, alamat, telp, email, nama_ayah, nama_ibu, telp_ortu, tahun_akademik, status, jurusan_id, foto) VALUES ('$nim', '$nama_lengkap', '$jk', '$agama', '$tempat_lahir', '$tanggal_lahir', '$alamat','$telepon', '$email', '$nama_ayah', '$nama_ibu', '$telepon_ortu','$tahun_akademik', '$status', '$jurusan', '$nama_file_enkripsi')") or die('Ada kesalahan pada query insert : ' . $conn->error);
      }
   }
   if ($sql) {
      session_start();
      $_SESSION['success_insert'] = 'Data baru berhasil ditambahkan!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_insert'] = 'Gagal menambahkan data!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
