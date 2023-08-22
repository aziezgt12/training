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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Kode</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nama Training</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Instruktur</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Biaya</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Lokasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Jenis Training</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Is Active</th>
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
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="openModalLabel">Modal title</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-training">
        <div class="modal-body">
            <div class="mb-1">
                <label for="exampleFormControlInput1" class="form-label">Nama Training</label>
                <input type="hidden" name="kode" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                <input type="" name="nama" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-1">
                <label for="exampleFormControlInput1" class="form-label">Instruktur</label>
                <input name="instruktur" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-1">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                <input name="durasi" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-1">
                <label for="exampleFormControlInput1" class="form-label">Biaya</label>
                <input type="number" name="biaya" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="row">
                <div class="col-md-6 mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Training</label>
                    <select class="form-control form-control-sm" name="jenis">
                        <option class="holder">...</option>
                        <option value="During">During</option>
                        <option value="Luring">Luring</option>
                    </select>
                </div>
                <div class="col-md-6  mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Is Active</label>
                    <select class="form-control form-control-sm" name="is_active">
                        <option class="holder">...</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>
            </div>
            <div class="mb-1">
                <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                <textarea name="lokasi" class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="2"></textarea>
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
    var row = $(this).closest('tr');
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var instruktur = $(this).data('instruktur');
    var durasi = $(this).data('durasi');
    var biaya = $(this).data('biaya');
    var lokasi = $(this).data('lokasi');
    var is_active = $(this).data('isactive');
    var jenis = $(this).data('jenis');


    $('input[name="kode"]').val(id);
    $('input[name="nama"]').val(nama);
    $('input[name="instruktur"]').val(instruktur);
    $('input[name="durasi"]').val(durasi);
    $('input[name="biaya"]').val(biaya);
    $('input[name="lokasi"]').val(lokasi);
    $('input[name="is_active"]').val(is_active);
     $('select[name="jenis"]').val(jenis);
     $('select[name="is_active"]').val(is_active);

    $("#openModal").modal('show');


    // alert("Test")
});

 $(".form-training").on("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Disable the button and show loading text
    $('.btn-save').attr("disabled", true).html("Loading ...");

    $.ajax({
        type: "post",
        url: "<?= base_url('C_MstTraining/save') ?>",
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
            url: "<?= base_url('C_MstTraining/getAll') ?>",
            dataType: "json",
            success: function (response) {

                var tableBody = $("#table-body").find("tbody");
                tableBody.empty()

                response.result.forEach(function (item) {
                    tableBody.append(`
                        <tr>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.kode}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.nama}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.instruktur}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.durasi}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.biaya}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.lokasi}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>${item.jenis}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ${item.is_active == 0 ? 'text-danger' : ''} '>${item.is_active == 1 ? "Active" : "Not Active"}</td>
                            <td class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center'>
                            <button 
                                type="button" 
                                data-id='${item.kode}'
                                data-nama='${item.nama}'
                                data-instruktur='${item.instruktur}'
                                data-durasi='${item.durasi}'
                                data-biaya='${item.biaya}'
                                data-lokasi='${item.lokasi}'
                                data-jumlah='${item.jumlah}'
                                data-jenis='${item.jenis}'
                                data-isactive='${item.is_active}'
                                class="btn btn-primary btn-xs m-0 btn-add">
                                <span class="fa fa-edit"></span>
                            </button>
                            <button type="button" onclick="deleted(${item.kode})" class="btn btn-danger btn-xs m-0"><span class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                    `);
                });
                
            }
        });

    }

    function deleted(id) { 
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
                            url: "<?= base_url('C_MstTraining/delete') ?>",
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
     }
</script>