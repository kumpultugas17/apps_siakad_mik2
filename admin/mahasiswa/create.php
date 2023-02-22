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
                  <form class="row g-3" action="insert.php" method="POST" enctype="multipart/form-data">
                     <div class="col-md-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Anda">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                     </div>
                     <div class="col-md-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select id="jk" class="form-select" name="jk">
                           <option selected disabled>Pilih...</option>
                           <option value="l">Laki-laki</option>
                           <option value="p">Perempuan</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label for="agama" class="form-label">Agama</label>
                        <select id="agama" class="form-select" name="agama">
                           <option selected disabled>Pilih...</option>
                           <option value="Islam">Islam</option>
                           <option value="Kristen">Kristen</option>
                           <option value="Khatolik">Khatolik</option>
                           <option value="Hindu">Hindu</option>
                           <option value="Budha">Budha</option>
                           <option value="Konghuchu">Konghuchu</option>
                        </select>
                     </div>
                     <div class="col-md-5">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                     </div>
                     <div class="col-md-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                     </div>
                     <div class="col-12">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap">
                     </div>
                     <div class="col-md-4">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon">
                     </div>
                     <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Nomor Email">
                     </div>
                     <div class="col-md-4">
                        <label for="telepon_ortu" class="form-label">No. Orang Tua</label>
                        <input type="number" class="form-control" id="telepon_ortu" name="telepon_ortu" placeholder="Masukkan Nomor Telepon Orang Tua">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu">
                     </div>
                     <div class="col-md-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select id="jurusan" class="form-select" name="jurusan">
                           <option selected disabled>Pilih...</option>
                           <?php
                           require_once '../../config.php';
                           $jur = $conn->query("SELECT * FROM jurusan");
                           foreach ($jur as $j) :
                           ?>
                              <option value="<?= $j['id_jur'] ?>"><?= $j['nama_jurusan'] ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input type="number" class="form-control" id="tahun_akademik" name="tahun_akademik" placeholder="Contoh 2020">
                     </div>
                     <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-select" name="status">
                           <option selected disabled>Pilih...</option>
                           <option value="1">Aktif</option>
                           <option value="2">Lulus</option>
                           <option value="0">Tidak Aktif</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="foto" class="form-label">Upload Avatar</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                     </div>
                     <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </main>

   <!-- Import Bootstrap JS -->
   <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>

</html>