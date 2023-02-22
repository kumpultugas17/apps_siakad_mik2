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
   <!-- Import Icon -->
   <link rel="stylesheet" href="../../assets/icon/bootstrap-icons.css">
   <!-- SweetAlert -->
   <link rel="stylesheet" href="../../plugins/extensions/sweetalert2/sweetalert2.min.css">
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
                        Mahasiswa
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <main class="container">
      <div class="row my-4">
         <div class="col-12">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <a href="create.php" class="btn btn-sm btn-primary">Tambah</a>
                  <table class="table table-striped mt-2">
                     <thead class="table-primary">
                        <tr>
                           <th>No</th>
                           <th>Foto</th>
                           <th>NIM</th>
                           <th>Nama</th>
                           <th>JK</th>
                           <th>Jurusan</th>
                           <th>Agama</th>
                           <th>Telepon</th>
                           <th>E-Mail</th>
                           <th>Tahun Akademik</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        require_once '../../config.php';
                        $no = 1;
                        $query = $conn->query("SELECT * FROM mahasiswa ORDER BY created_at DESC");
                        foreach ($query as $data) :
                        ?>
                           <tr>
                              <td><?= $no++; ?></td>
                              <td>Foto</td>
                              <td><?= $data['nim'] ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['jk'] ?></td>
                              <td><?= $data['jurusan_id'] ?></td>
                              <td><?= $data['agama'] ?></td>
                              <td><?= $data['telp'] ?></td>
                              <td><?= $data['email'] ?></td>
                              <td><?= $data['tahun_akademik'] ?></td>
                              <td>
                                 <a class="btn btn-sm btn-warning" href="">
                                    <i class="bi bi-pencil-square"></i>
                                 </a>
                                 <a class="btn btn-sm btn-danger" href="">
                                    <i class="bi bi-trash3-fill"></i>
                                 </a>
                              </td>
                           </tr>
                        <?php
                        endforeach
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </main>

   <!-- Import Bootstrap JS -->
   <script src="../../assets/js/bootstrap.bundle.js"></script>
   <!-- SweetAlert -->
   <script src="../../plugins/extensions/sweetalert2/sweetalert2.all.min.js"></script>
   <!-- Alert -->
   <?php if (isset($_SESSION['success_insert'])) { ?>
      <script>
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
         })

         Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['success_insert']; ?>'
         })
      </script>
   <?php }
   unset($_SESSION['success_insert']); ?>
</body>

</html>