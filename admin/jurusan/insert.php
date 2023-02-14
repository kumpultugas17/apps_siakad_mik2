<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $kode_jurusan = $_POST['kode_jurusan'];
   $nama_jurusan = $_POST['nama_jurusan'];
   $status = $_POST['status'];

   $sql = $conn->query("INSERT INTO jurusan (kode_jurusan, nama_jurusan, status_jurusan) VALUES ('$kode_jurusan', '$nama_jurusan', '$status')");

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
