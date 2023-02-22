<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <form action="insert.php" method="post" enctype="multipart/form-data">
      <table>
         <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
         </tr>
         <tr>
            <td>Foto</td>
            <td>:</td>
            <td><input type="file" name="foto"></td>
         </tr>
         <tr>
            <td colspan="3"><button type="submit" name="simpan">Simpan</button></td>
         </tr>
      </table>
   </form>
   <hr>

   <table border="1" cellpadding="6" cellspacing="0">
      <tr>
         <th>Nama</th>
         <th>Foto</th>
         <th>Aksi</th>
      </tr>
      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'mik2_db_siakad');
      $query = $conn->query("SELECT * FROM mhs");
      foreach ($query as $q) :
      ?>
         <tr>
            <td><?= $q['nama'] ?></td>
            <td><img src="foto/<?= $q['foto'] ?>" width="50px"></td>
            <td>
               <a href="edit.php?id=<?= $q['id'] ?>">Edit</a>
               <a href="delete.php?id=<?= $q['id'] ?>">Hapus</a>
            </td>
         </tr>
      <?php
      endforeach
      ?>
   </table>






</body>

</html>