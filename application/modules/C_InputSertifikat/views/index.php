<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6><?= $title ?></h6>
                    <button type="button" class="btn btn-primary btn-add"><span class="fa fa-plus"></span> Add Data</button>
                </div>
                <hr class="horizontal dark mt-0">

                 <div class="card-body p-2 pt-0 pb-2" style="height: 100%">
                    <div class="table-responsive p-2" style="height: 70vh;">
                        <table class="table align-items-center justify-content-center" id="table-body">
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

<!-- Modal -->
<div class="modal fade" id="openModal" tabindex="-1" aria-labelledby="openModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="openModalLabel">Modal title</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-training">
        <div class="modal-body">
            <h6>Personal Info</h6>
            <hr class="horizontal dark mb-1 mt-1">
            <div class="mb-1 row">
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Nama Peserta</label>
                    <input type="" name="nama_peserta" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">No WhatsApp</label>
                    <input type="" name="nomor_whatsapp" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Pendidikan</label>
                    <select name="pendidikan_terakhir" class="form-control form-control-sm">
                        <option>...</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>SMA</option>
                        <option>D1/D2/D3</option>
                        <option>S1 </option>
                        <option>S2</option>
                        <option>S3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Company</label>
                    <input type="" name="nama_perusahaan" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                </div>
            </div>
            <div class="mb-1">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat Rumah</label>
                <textarea name="alamat_rumah" class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
            <div class="mb-1 mt-3">
                <h6>Training Info</h6>
                <hr class="horizontal dark mb-1 mt-1">
                <label for="exampleFormControlTextarea1" class="form-label">Pilih Training Yang Di Ikuti</label>
                <!-- <div class="row ms-1"> -->
                    <?php foreach($listTraining as $val): ?>
                    <div class="form-check form-switch col-md-6">
                        <input class="form-check-input" value="<?= $val->kode ?>" name="id_training[]" type="checkbox" id="flexSwitchCheck<?= $val->kode ?>">
                        <label class="form-check-label" for="flexSwitchCheck<?= $val->kode ?>"><?= $val->nama ?></label>
                    </div>
                    <?php endforeach; ?>
                <!-- </div> -->

            </div>
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm btn-save">Save changes</button>
        </div>
      </form>
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
    $('.btn-save').attr("disabled", true).html("Loading ...");

    $.ajax({
        type: "post",
        url: "<?= base_url('C_InputSertifikat/save') ?>",
        dataType: "json",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response)
            setTimeout(() => {
                if (response.code == '200') {
                    Swal.fire('Success', response.message, 'success');
                    $("#openModal").modal('hide');
                    getAll();
                }
    
                // Re-enable the button and restore its text
                $('.btn-save').removeAttr("disabled").html("Save Changes");
                
            }, 1500);
        },
        error: function (xhr) {
            console.log(xhr);
            // Re-enable the button and restore its text
            $('.btn-save').removeAttr("disabled").html("Save Changes");
        }
    });
});


function getAll()
{
    $.ajax({
        type: "get",
        url: "<?= base_url('C_InputSertifikat/getAll') ?>",
        dataType: "json",
        success: function (response) {
            console.log(response)

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
                        <button type="button" onclick="deleted(${item.id})" class="btn btn-danger btn-xs m-0"><span class="fa fa-trash"></span></button>
                        </td>
                    </tr>`;

                tableBody.append(row);
            });

            
        }
    });

}

function deleted(id)
{
   Swal.fire({
        title: 'Are you sure?',
        text: "this will be deleted!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deleted it!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('C_InputSertifikat/delete') ?>",
                    data: {
                        id: id },
                    dataType : "json",
                    success: function(response) {
                       setTimeout(() => {
                            if (response.code == '200') {
                                Swal.fire('Success', response.message, 'success');
                                $("#openModal").modal('hide');
                                getAll();
                            }
                
                            // Re-enable the button and restore its text
                            $('.btn-save').removeAttr("disabled").html("Save Changes");
                            
                        }, 1500);
                    }
                });
            });
        },
    });
}

</script>