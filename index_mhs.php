<?php
  session_start();

  if ($_SESSION['level'] == "mahasiswa"){
      include_once("../koneksi.php");
      $id_user = $_SESSION['ID'];
      // Data User Mahasiswa & Pengguna
      $ambil1 = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE ID = $id_user");
      $mahasiswa = mysqli_fetch_array($ambil1);
      $ambil2 = mysqli_query($conn, "SELECT `username` FROM `user` WHERE ID = $id_user;");
      $pengguna = mysqli_fetch_array($ambil2);
      // Akhir Data User Mahasiswa & Pengguna


      $result1 = mysqli_query($conn, "SELECT * FROM tugas");
      $jml_tgs = 0;
      while(mysqli_fetch_array($result1)){
        $jml_tgs += 1;
      }
      
      $result2 = mysqli_query($conn, "SELECT * FROM mahasiswa");
      $jml_mhs = 0;
      while(mysqli_fetch_array($result2)){
        $jml_mhs += 1;
      }

      $result3 = mysqli_query($conn, "SELECT * FROM pengumpulan WHERE ID_mahasiswa = $id_user");
      $jml_finish = 0;
      while(mysqli_fetch_array($result3)){
        $jml_finish += 1;
      }
    }
  else{
      header('location: ../login.php');
      exit;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../asset/logo-brand-color.png">
    <title>Smart Learning Online World</title>
  </head>

  <body style="background-color:#edeef4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navigation-bar fixed-top shadow-sm" style="background-color: #5E4AF7">
      <div class="container-fluid mx-3 my-auto">
        <a class="navbar-brand align-items-center" href="#">
          <img src="../asset/logo-brand-color.png" alt="logo" width="30px"><span class="ms-2">SLOW</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <div class="navbar-nav">
            <h6 class="me-2 text-white align-items-center my-auto "><?php echo $mahasiswa['nama'];?></h6>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

  <!-- Main -->
    <!-- Sidebar -->
    <div class="container-fluid" >
      <div class="row d-flex justify-content-end ">
        <div class="col-lg-2 side-bar fixed-top shadow-sm" id="navbarNavAltMarkup" style="background-color : white; ">
          <div class="d-flex align-items-center mt-4 mx-2 mb-5 admin border-bottom pb-3" style="border-color: grey">
            <img src="../asset/user.png" alt="user" width="50px" class="fluid-left">
            <h5 class="ms-2 text-dark align-items-center my-auto "><?php echo $pengguna['username']?> <br/> <span class="fw-lighter fs-6">Mahasiswa</span></h5>
          </div>
          <div class="menu justify-content-center ms-4 light-sidebar" >
            <a href="index_mhs.php" class="nav-link text-decoration-none text-dark fs-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="1 2 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg> <span class="ms-1">Home</span>
            </a>
            <a href="profile_mhs.php" class="nav-link text-decoration-none text-dark fs-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 2 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg> <span class="ms-1">My Profile</span>
            </a>
            <a href="tugas_mhs.php" class="nav-link text-decoration-none text-dark fs-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="1 2 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
              </svg> <span class="ms-1"> Tugas</span>
            </a>
            <a href="mahasiswa_mhs.php" class="nav-link text-decoration-none text-dark fs-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 2 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
              </svg> <span class="ms-1">Mahasiswa</span>
            </a>
            <a href="../logout.php" class="nav-link text-decoration-none text-dark fs-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
              </svg> <span class="ms-1">Logout</span>
            </a>
          </div>
        </div>
        <!-- Akhir sidebar -->
        
        <div class="col-lg-10" style="margin-top:63px;">
          <div class="container">
          <!-- jumbotron -->
            <div class="row d-flex justify-content-center mt-3 text-white">
              <div class="col-lg mx-2 card mb-2 border-0 py-4 shadow-sm" style="background-image: linear-gradient(to bottom right, #5E4AF7, #c560f7); border-radius:1rem">
                <div class="card-body">
                  <h2 class="card-title fw-bold mb-3">Selamat Datang <?php echo $mahasiswa['nama'] ?></h2>
                  <p class="card-text">ID Mahasiswa : <?php echo $mahasiswa['ID'] ?></p>
                  <a href="profile_mhs.php" class="card-link btn rounded text-decoration-none shadow text-white fw" style="background-color:#436FEC">Details</a>
                </div>
            </div>
          <!-- akhir jumbotron -->
          
          <!-- Highlight -->
          <h4 class="text-dark mb-0 mt-3 fw-bold">Highlight</h4>
            <div class="row d-flex justify-content-center mt-3 text-dark">
              <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                <div class="text-white mt-3 rounded" style="background-image: linear-gradient(to left, #fce40a, #fc9f0a); height:30px;">
                  <h6 class="card-title text-center mt-1">TUGAS</h6>
                </div>
                <div class="card-body">
                  <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah tugas terkini : <?php echo $jml_tgs?></p>
                </div>
                <div class="justify-content-end d-flex">
                  <a href="tugas_mhs.php" class="btn-sm btn-outline-secondary mb-2 text-decoration-none">Details</a>
                </div>
              </div>

              <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                <div class="text-white mt-3 rounded" style="background-image: linear-gradient(to left, #09acf7, #0949f7); height:30px;">
                  <h6 class="card-title text-center mt-1">PENGUMPULAN</h6>
                </div>
                <div class="card-body">
                  <p class="card-text" style="font-size:17px; font-weight:500;">Tugas dikumpulkan : <?php echo $jml_finish?></p>
                </div>
                <div class="justify-content-end d-flex">
                  <a href="tugas_mhs.php" class="btn-sm btn-outline-secondary mb-2 text-decoration-none">Details</a>
                </div>
              </div>
              
              <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                <div class="text-white mt-3 rounded" style="background-image: linear-gradient(to left, #f409b2, #f40977); height:30px;">
                  <h6 class="card-title text-center mt-1">MAHASISWA</h6>
                </div>
                <div class="card-body">
                  <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah mahasiswa : <?php echo $jml_mhs?></p>
                </div>
                <div class="justify-content-end d-flex">
                  <a href="mahasiswa_mhs.php" class="btn-sm btn-outline-secondary text-decoration-none mb-2">Details</a>
                </div>
              </div>
            </div>
          <!-- Akhir Highlight -->

          <!-- Tabel Tugas -->
            <div class="container-fluid bg-white rounded-top shadow-sm mt-3">
              <h5 class="pb-2 pt-3 mb-0 text-dark fw-bold">Daftar Tugas</h5>
            </div>
            <div class="container-fluid rounded-bottom bg-white shadow-sm">
              <div class="d-flex justify-content-center">
                <table class="table mt-2 table-striped" style="width:100%">
                    <tr class="table-dark">
                        <th>Kode Tugas</th> <th>Nama Tugas</th> <th>Diberikan</th> <th>Tenggat</th>
                    </tr>
                    <?php
                    $result1 = mysqli_query($conn, "SELECT * FROM tugas");
                    while($data = mysqli_fetch_array($result1)) {         
                        echo "<tr>";
                        echo "<td>".$data['kode_tugas']."</td>";
                        echo "<td>".$data['nama_tugas']."</td>";    
                        echo "<td>".$data['tgl_tugas']."</td>";
                        echo "<td>".$data['tenggat']."</td>";
                    }
                    ?>
                </table>
              </div>
            </div>
          <!-- Akhir Tabel Tugas -->

          <!-- Tabel Mahasiswa -->
            <div class="container-fluid bg-white rounded-top shadow-sm mt-3">
              <h5 class="pb-2 pt-3 mb-0 text-dark fw-bold">Daftar Mahasiswa</h5>
            </div>
            <div class="container-fluid rounded-bottom bg-white shadow-sm mb-3">
              <div class="d-flex justify-content-center">
                <table class="table table-striped mt-2" style="width:100%">
                    <tr class="table-dark">
                        <th>ID</th> <th>Nama</th> <th>Jenis Kelamin</th> <th>Jurusan</th>
                    </tr>
                    <?php
                    $result2 = mysqli_query($conn, "SELECT * FROM mahasiswa");
                    while($data_mhs = mysqli_fetch_array($result2)) {         
                        echo "<tr>";
                        echo "<td>".$data_mhs['ID']."</td>";
                        echo "<td>".$data_mhs['nama']."</td>";    
                        echo "<td>".$data_mhs['jenis_kelamin']."</td>";    
                        echo "<td>".$data_mhs['jurusan']."</td></tr>";
                    }
                    ?>
                </table>
              </div>
            </div>
          <!-- Akhir Tabel Mahasiswa -->
          </div>
        </div>
      </div>
    </div>
  <!-- Akhir main -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>