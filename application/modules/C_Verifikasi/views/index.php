
<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>/assets/argon/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/argon/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url() ?>/assets/argon/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>/assets/argon/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
 
  <!-- End Navbar -->
  <main class="main-content  mt-2">
    <div class="page-header align-items-start min-vh-50  pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://www.pabu.com.ua/images/Controling.jpg'); background-position: strech;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Cek Sertifikat !</h1>
            <p class="text-lead text-white">Cek Validitas dan Keaslian Sertifikat Yang Dikeluarkan Oleh<br>PT. SMART SERTIFIKASI INDONESIA</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center ">
        <div class="col-xl-8 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            
            <div class="row px-xl-5 px-sm-4 px-6">
              
            </div>
            <div class="card-body mt-4 ">
              <form role="form" action="<?= base_url() ?>C_Verifikasi">
                <div class="row">
                    <div class=" col-md-10">
                        <input type="text" value="<?= $no_sertifikat ?? null ?>" class="form-control " name="no_sertifikat" placeholder="Masukkan No Sertifikat" aria-label="Name">
                    </div>
                    <div class=" col-md-2">
                        <button type="submit" class="btn bg-gradient-dark">Pencarian</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if(isset($no_sertifikat) && $peserta->no_sertifikat != null): ?>
    <div class="container mt-11 ">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center ">
        <div class="col-xl-8 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0 border">
            <div class="card-header text-center pt-4">
              <h5>Detail Informasi</h5>
            </div><hr class="border m-0">
            
            <div class="row px-xl-5 px-sm-4 px-6">
              
            </div>
            <div class="card-body mt-1 ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No Sertifikat</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"  readonly value="<?= $peserta->no_sertifikat ?? null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $peserta->nama_peserta ?? null ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Perusahaan</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $peserta->nama_perusahaan ?? null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">WhatsApp</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $peserta->nomor_whatsapp ?? null ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pendidikan</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $peserta->pendidikan_terakhir ?? null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $peserta->alamat_rumah ?? null ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Training Yang Diikuti</label>
                    <ul class="list-group list-group-flush">
                        <?php foreach($listTraing as $val): ?>
                        <li class="list-group-item"><?= $val->nama ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <a href="<?= base_url('C_InputSertifikat/print/'.$peserta->id) ?>"  target="_blank" class="btn btn-primary">Download Sertifikat</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>
        <div class="alert alert-danger mt-10 m-4 p-4"><h5 class="text-white">Sertifikat tidak ditemukan</h5></div>
    <?php endif ?>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>