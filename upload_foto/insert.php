<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik2_db_siakad');
if (isset($_POST['simpan'])) {
   $nama = $_POST['nama'];

   $nama_file = $_FILES['foto']['name'];
   $tmp_file = $_FILES['foto']['tmp_name'];
   $extension = array_pop(explode(".", $nama_file));
   $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
   $path = "foto/$nama_file_enkripsi";

   if (empty($nama_file)) {
      $sql = $conn->query("INSERT INTO mhs (nama) VALUES ('$nama')") or die("ada kesalahan pada query insert : " . $conn->error);
   } else {
      if (move_uploaded_file($tmp_file, $path)) {
         $sql = $conn->query("INSERT INTO mhs (nama, foto) VALUES ('$nama', '$nama_file_enkripsi')") or die("ada kesalahan pada query insert : " . $conn->error);
      }
   }

   if ($sql) {
      echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php';</script>";
   } else {
      echo "<script>alert('Data gagal ditambahkan'); window.location.href='index.php';</script>";
   }
}
