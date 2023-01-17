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
                        Jurusan
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <main class="container">
      <div class="row my-4">
         <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <form action="act_create.php" method="post">
                     <div class="mb-3">
                        <label for="kode" class="form-label">Kode Jurusan</label>
                        <input type="text" class="form-control" name="kode_jurusan" id="kode" placeholder="Masukkan kode jurusan">
                     </div>
                     <div class="mb-3">
                        <label for="nama" class="form-label">Nama Jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" id="nama" placeholder="Masukkan nama jurusan">
                     </div>
                     <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                           <option disabled selected>Pilih Jurusan</option>
                           <option value="0">Tidak Aktif</option>
                           <option value="1">Aktif</option>
                        </select>
                     </div>
                     <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                     <button type="reset" class="btn btn-sm btn-secondary">Batal</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <table class="table table-striped">
                     <thead class="align-middle table-dark">
                        <tr>
                           <th class="text-center">No</th>
                           <th>Kode Jurusan</th>
                           <th>Nama Jurusan</th>
                           <th class="text-center">Status</th>
                           <th class="text-center">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        require_once '../../config.php';
                        $no = 1;
                        $query = $conn->query("SELECT * FROM jurusan");
                        foreach ($query as $row) :
                        ?>
                           <tr>
                              <td class="text-center"><?= $no++; ?></td>
                              <td><?= $row['kode_jurusan'] ?></td>
                              <td><?= $row['nama_jurusan'] ?></td>
                              <td class="text-center"><?= $row['status'] ?></td>
                              <td class="text-center">
                                 <button class="btn btn-sm btn-warning" data-bs-toggle="modal">
                                    <i class="bi bi-pencil-square"></i>
                                 </button>
                                 <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3-fill"></i>
                                 </button>
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
</body>

</html>