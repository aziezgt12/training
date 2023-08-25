<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-0 header-title"><?=  $title ?></h4>
                </div>
                <div class="col-md-6">
                    </div>
                </div>
                <hr>
                <form id="form-data" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 border-right">
                            <div id="uploadResult">
                                <iframe src="<?= base_url('assets/berkas_ppid/'.$profile->SO) ?>" height="600" width="100%"></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Upload File</label><br>
                            <input type="file" name="userfile" id="userfile">
                        </div>
                            <button type="button" class='btn btn-primary float-left mt-2 ' id="uploadButton">Perbarui</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Riwayat Kunjungan</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>



            </div>
        </div>
    </div> -->
</div>


<script>
    $(document).ready(function() {
        $('#uploadButton').click(function() {
            var formData = new FormData($('#form-data')[0]);

            $.ajax({
                url: '<?php echo site_url("C_Profile/saveSO"); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // setTimeout(() => {
                    //     if (response.code == 200) {
                    //         sw_alert("Success", String(response.message), "success");
                    //     } else {
                    //         sw_alert("Error", String(response.message), "error");
                    //         $('.btn-save').html('Save');
                    //     }
                        
                    // }, 3000);
                    $('#uploadResult').html(response);
                },
                error: function(error) {
                    $('#uploadResult').html('<p>Error occurred: ' + error.statusText + '</p>');
                }
            });
        });
    });
    // function save()
    // {
    //     var content = tinymce.get('myTextarea').getContent();
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "It will be saved!",
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, save it!',
    //         showLoaderOnConfirm: true,
    //         preConfirm: function() {
    //             return new Promise(function(resolve) {
    //                 $.ajax({
    //                     type: "post",
    //                     url: "<?= base_url("C_Profile/saveProfileSingkatPPID") ?>",
    //                     data: {profile : content},
    //                     dataType: "json",
    //                     beforeSend: function() {
    //                         // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
    //                         $('.btn-action').html('Loading...');
    //                         $('.btn-action').attr('disabled', true);
    //                     },
    //                     success: function(response) {
    //                         console.log(response);
    //                         // setTimeout(() => {
    //                         //     if (response.code == 200) {
    //                         //         sw_alert("Success", String(response.message), "success");
    //                         //         setTimeout(() => {
    //                         //             location.reload()
    //                         //         }, 3000);
    //                         //     } else {
    //                         //         sw_alert("Error", String(response.message), "error");
    //                         //         $('.btn-save').html('Save');
    //                         //     }
                                
    //                         // $('.btn-action').html('save');
    //                         // $('.btn-action').attr('disabled', false);
    //                         // }, 3000);


    //                     },
    //                     error:  function (jqXHR, textError) { 
    //                         console.log(jqXHR);
    //                         console.log(textError);
    //                      }
    //                 });
    //             });
    //         },
    //     });
    // }
</script>
