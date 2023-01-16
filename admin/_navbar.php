<header>
   <nav class="bg-navbar navbar navbar-expand-lg navbar-dark">
      <div class="container">
         <a class="navbar-brand" href="../index.php">Navbar
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Dashboard</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Data Master
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="../matakuliah/index.php">Mata Kuliah</a></li>
                     <li><a class="dropdown-item" href="../jurusan/index.php">Jurusan</a></li>
                     <li><a class="dropdown-item" href="../kelas/index.php">Kelas</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../mahasiswa/index.php">Mahasiswa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../nilai/index.php">Nilai</a>
               </li>
            </ul>
            <div class="d-flex">
               <div class="dropdown">
                  <a class="text-white dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="../../assets/image/avatar/1.jpg" class="rounded-circle" height="25" alt="avatar">
                     <?= $_SESSION['nama'] ?>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">Profil</a></li>
                     <li><a class="dropdown-item" href="#">Setting</a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </nav>
</header>