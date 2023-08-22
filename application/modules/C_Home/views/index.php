<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0  font-weight-bold">Total Training</p>
                    <h5 class="font-weight-bolder mt-3">
                      <?= $totalTraining ?> Training
                    </h5>
                    <p class="mb-0">
                      <span class="text-dark text-xs">Total Seluruh Training</span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0  font-weight-bold">Total Sertifikat</p>
                    <h5 class="font-weight-bolder mt-3">
                      <?= $totalSertifikat ?> Sertifikat
                    </h5>
                    <p class="mb-0">
                      <span class="text-dark text-xs">Total Training Bulan Ini </span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0  font-weight-bold">training aktif</p>
                    <h5 class="font-weight-bolder mt-3">
                      <?= $totalAktif ?> Training
                    </h5>
                    <p class="mb-0">
                      <span class="text-dark text-xs">Total Training Aktif </span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0  font-weight-bold">training non aktif</p>
                   <h5 class="font-weight-bolder mt-3">
                      <?= $totalNotAktif ?> Training
                    </h5>
                    <p class="mb-0">
                      <span class="text-dark text-xxs">Total Training Not Aktif</span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       
      <div class="row mt-4">
        <div class="col-lg-9 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">List Of Training</h6>
              </div>
            </div>
            <div class="table-responsive p-2">
              <table class="table align-items-center justify-content-center">
                <thead>
                    <td >Nama Training</td>
                    <td >Tanggal Training</td>
                    <td >Instruktur</td>
                    <td >Jenis Training</td>
                </thead>
                <tbody>
                <?php foreach($listTraining as $val) : ?>
                <tr>
                    <td><?= $val->nama ?></td>
                    <td><?= $val->durasi ?></td>
                    <td><?= $val->instruktur ?></td>
                    <td>
                        <div class="badge <?= $val->jenis == 'During' ? 'bg-danger' : 'bg-primary' ?>"><?= $val->jenis ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">List Of Company</h6>
            </div>
            <div class="card-body p-3" style="display: flex; justify-content: center; align-items: center;">
                <div style="width: 100%; height: 100%;">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  <script>
        // Data yang telah Anda ambil dari database
        var data = <?php echo json_encode($listCompany); ?>;

        // Siapkan array untuk labels dan data
        var labels = [];
        var values = [];

        // Membaca data dan memasukkannya ke dalam arrays
        data.forEach(function(item) {
            labels.push(item.nama_perusahaan);
            values.push(item.jumlah_peserta);
        });

        // Siapkan array warna
        var dynamicColors = [];
        for (var i = 0; i < labels.length; i++) {
            dynamicColors.push(getRandomColor());
        }

        // Fungsi untuk mendapatkan warna acak
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Konfigurasi chart
        const config = {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: dynamicColors,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Pie Chart'
                    }
                }
            }
        };

        // Menggambar chart
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, config);
    </script>


