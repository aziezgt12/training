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
                        <h4 class="mt-0 header-title"><?= $title ?></h4>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <hr>
                <form id="form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Visi</label>
                            <textarea name="visi" class="mt-2" id="visi"><?= $profile->visi ?></textarea>
                        </div>
                        <div class="col-md-12 mt-4 pt-4">
                            <label>Misi</label>
                            <textarea name="misi" class="mt-2" id="misi"><?= $profile->misi ?></textarea>
                        </div>
                        <button type="button" class='btn btn-primary float-left mt-2 ' onclick="save()">Perbarui</button>
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
    function save() {
        var visi = tinymce.get('visi').getContent();
        var misi = tinymce.get('misi').getContent();
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be saved!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url("C_Profile/saveVisiMisi") ?>",
                        data: {
                            visi: visi,
                            misi: misi
                        },
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            setTimeout(() => {
                                if (response.code == 200) {
                                    sw_alert("Success", String(response.message), "success");
                                    setTimeout(() => {
                                        location.reload()
                                    }, 3000);
                                } else {
                                    sw_alert("Error", String(response.message), "error");
                                    $('.btn-save').html('Save');
                                }

                                $('.btn-action').html('save');
                                $('.btn-action').attr('disabled', false);
                            }, 3000);


                        },
                        error: function(jqXHR, textError) {
                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }
</script>

<script>
    tinymce.init({
        selector: '#visi',
        height: 200,
        plugins: 'link image code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',

    });

    tinymce.init({
        selector: '#misi',
        height: 200,
        plugins: 'link image code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',

    });
</script>