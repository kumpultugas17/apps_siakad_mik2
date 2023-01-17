<?php
require_once '../../config.php';
if (isset($_POST['simpan'])) {
   $kode_jurusan = $_POST['kode_jurusan']; //harus sama dengan input text form
   $nama_jurusan = $_POST['nama_jurusan']; //harus sama dengan input text form
   $status = $_POST['status']; //harus sama dengan input text form

   $sql = $conn->query("INSERT INTO jurusan (kode_jurusan, nama_jurusan, status) VALUES ('$kode_jurusan', '$nama_jurusan', '$status')");

   if ($sql) {
      header('location:index.php');
   }
}
