<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik2_db_siakad');
if (isset($_GET['id'])) {
   $id = $_GET['id'];

   $cari = $conn->query("SELECT * FROM mhs WHERE id = '$id'");
   $data = mysqli_fetch_assoc($cari);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <form action="update.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <table>
         <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?= $data['nama'] ?>"></td>
         </tr>
         <tr>
            <td>Foto</td>
            <td>:</td>
            <td>
               <img src="foto/<?= $data['foto'] ?>" width="50px">
               <input type="hidden" name="nama_foto" value="<?= $data['foto'] ?>">
               <br>
               <input type="file" name="foto">
            </td>
         </tr>
         <tr>
            <td colspan="3"><button type="submit" name="simpan">Simpan</button></td>
         </tr>
      </table>
   </form>

</body>

</html>