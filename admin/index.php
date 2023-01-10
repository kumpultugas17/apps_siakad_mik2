<?php
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>
      alert('Silahkan login terlebih dahulu!'); window.location.href='../login.php'
   </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
</head>

<body>
   <h2>Ini Halaman Dashboard</h2>

   Menampilkan data dari variable SESSION <br>
   <?php
   echo $_SESSION['email'] . ' | ' . $_SESSION['nama'] . ' | ' . $_SESSION['level'];
   ?>
   <a href="../logout.php">Logout</a>
</body>

</html>