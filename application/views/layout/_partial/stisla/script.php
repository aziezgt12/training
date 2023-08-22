        <!-- jQuery  -->
        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/js/metismenu.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url() ?>assets/js/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Nestable -->
        <script src="<?= base_url() ?>assets/plugins/nestable/jquery.nestable.js"></script>

        <!-- Date Picker -->
        <script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="<?= base_url() ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>


        <!-- Buttons examples -->
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <!-- sweetalert 2 -->
        <script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.all.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        
        



        <script src="<?= base_url() ?>assets/js/script.js"></script>
        <script src="<?= base_url() ?>assets/js/form-wizzard-js.js"></script>

        <script src="<?= base_url() ?>assets/js/app.js"></script>



        <!-- App js -->
        <script type="text/javascript">

            function store(url, text, param)
            {
                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                type:'post',
                                data:param,
                                url:url,
                                dataType : "json",
                                beforeSend: function() {
                        // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                                    $('.btn-save').html('Loading...');
                                },
                                success: function(response) {
                                    console.log(response);
                                    setTimeout(() => {
                                        if (response.code == 200) {
                                            sw_alert("Success", String(response.message), "success");
                                            setTimeout(() => {
                                                location.reload()
                                            }, 1000);
                                        } else {
                                            sw_alert("Error", String(response.message), "error");
                                            $('.btn-save').html('Save');
                                        }
                                    }, 1000);
                                },
                                error: function(err, errs)
                                {
                                    console.log(err)
                                    console.log(errs)
                                }
                            });
                        });
                    },
                });
            }

            function deleted(url, param)
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
                                url: url,
                                data: param,
                                dataType : "json",
                                success: function(response) {
                                    setTimeout(() => {
                                        if (response.code == 200) {
                                            sw_alert("Success", String(response.message), "success");
                                            setTimeout(() => {
                                                location.reload()
                                            }, 1000);
                                        } else {
                                            sw_alert("Error", String(response.message), "error");
                                        }
                                    }, 1000);
                                }
                            });
                        });
                    },
                });
            }
        </script>