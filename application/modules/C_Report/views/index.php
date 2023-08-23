<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6><?= $title ?></h6>
                    <button type="button" class="btn btn-primary btn-add"><span class="fa fa-plus"></span> Add Data</button>
                </div>
                <hr class="horizontal dark mt-0">
                <form class="form-training">
                <div class="row ps-3 pe-3">
                    <!-- <div class="mb-3 col-md-3">
                        <label for="trainingSelect" class="form-label">Training</label>
                        <select name="training" class="form-control form-control-sm">
                            <option value="">Please Select</option>
                            <?php foreach($listTraining as $item): ?>
                            <option><?= strtoupper($item->nama) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div> -->
                    <div class="mb-3 col-md-3">
                        <label for="jenisTrainingSelect" class="form-label">No Sertifikat</label>
                        <input type="text" name="no_sertifikat" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="companySelect" class="form-label">Company Name</label>
                        <select name="company" class="form-control form-control-sm">
                            <option value="">Please Select</option>
                            <?php foreach($listCompany as $item): ?>
                            <option><?= strtoupper($item->nama_perusahaan) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label">&nbsp;</label><br>
                        <button type="submit" class="btn btn-primary btn-sm btn-refresh"><span class="fa fa-search"></span> Search</button>
                    </div>
                </div>
                </form>

                <hr class="horizontal dark mt-0">


                 <div class="card-body p-2 pt-0 pb-2" style="height: 100%">
                    <div class="table-responsive p-2" style="height: 70vh;">
                        <table class="table align-items-center justify-content-center table-bordered" id="table-body">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No Sertifikat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nama Peserta</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Company</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">WhatsApp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Pendidikan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Pelatihan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

 <script>
$(document).ready(function () {

    getAll();
    
});

$(document).on("click", ".btn-add", function () {
    $("#openModal").modal('show');
    // alert("Test")
});

 $(".form-training").on("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Disable the button and show loading text
    $('.btn-refresh').attr("disabled", true).html("Loading ...");

    $.ajax({
        type: "get",
        url: "<?= base_url('C_Report/getAll') ?>",
        dataType: "json",
        data : $(this).serialize(),
        success: function (response) {
            console.log(response)

            $('.btn-refresh').attr("disabled", false).html("Search");

            var tableBody = $("#table-body").find("tbody");
            tableBody.empty()

            response.result.listPeserta.forEach(function (item) {
                var row = `<tr>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.no_sertifikat}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.nama_peserta}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.nama_perusahaan}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.nomor_whatsapp}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.pendidikan_terakhir}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>`;
                
                if (response.result.detPelatihan[item.id] !== null && Array.isArray(response.result.detPelatihan[item.id])) {
                    response.result.detPelatihan[item.id].forEach(function (detail) {
                        console.log(detail.nama); // Tambahkan ini untuk memeriksa data
                        row += `<span class='badge bg-primary me-1 p-2'>${detail.nama}</span>`;
                    });
                }




                
                row += `</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>${item.alamat_rumah}</td>`;
                row += `<td class='text-uppercase text-secondary text-xxs font-weight-bolder text-center'>
                        <a href="<?= base_url() ?>C_InputSertifikat/print/${item.id}" target="_blank" class="btn btn-primary btn-xs m-0"><span class="fa fa-print"></span></a>
                        </td>
                    </tr>`;

                tableBody.append(row);
            });

            
        }
    });
});


function getAll()
{
   

}

</script>