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
   <!-- Import Bootstrap -->
   <link rel="stylesheet" href="../../assets/css/bootstrap.css">
   <!-- My Style -->
   <style>
      body {
         background-color: #f2f7ff;
         font-family: 'Quicksand';
      }

      .bg-navbar {
         background-color: #435ebe;
      }
   </style>
</head>

<body>
   <?php require '../_navbar.php'; ?>
   <div class="container pt-4">
      <div class="row">
         <div class="col-12">
            <div class="card rounded-3 border-0">
               <div class="card-body">
                  <div class="breadcrumb mb-0">
                     <a href="../index.php" class="nav-link breadcrumb-item active fw-bold fs-6 text-secondary">
                        Dashboard
                     </a>
                     <a href="index.php" class="nav-link breadcrumb-item active fw-bold fs-6 text-secondary">
                        Nilai
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Import Bootstrap JS -->
   <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>

</html>