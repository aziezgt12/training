<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SPMB IAIN Batang Hari :: Register</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">


</head>

<body>

   <!-- Begin page -->
   <div class="accountbg"></div>
   <div class="home-btn d-none d-sm-block">
    <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
</div>
<div class="wrapper-page" style="width: 40%;">
    <div class="card card-pages shadow-none">

        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
            </div>
            <center><img src="<?= base_url('assets/images/logo.png') ?>" width='100'></center>
            <h5 class="font-18 text-center">Register</h5>

            <form class="form-horizontal form-register m-t-30" action="index.html">

                <!-- <div class="form-group">
                    <div class="col-12">
                        <label>NIK KTP</label>
                        <input class="form-control" type="text" required="" name="nik" placeholder="No Induk Kependudukan">
                    </div>
                </div> -->

                <div class="form-group row">
                    <div class="col-6">
                        <label>Nama Lengkap</label>
                        <input class="form-control" type="text" required="" name="fullname" placeholder="nama lengkap" autocomplete="off" style="text-transform: capitalize;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" required="" name="email" placeholder="email" autocomplete="off" style="text-transform: lowercase;">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>No Telp / Wa</label>
                            <input class="form-control" type="email" required="" name="notelp" placeholder="telp / wa" autocomplete="off" style="text-transform: lowercase;">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6">
                        <label>Username</label>
                        <input class="form-control" type="text" required="" name="userid" placeholder="Username"  autocomplete="off">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control password" type="password" required="" name="password" placeholder="Password"  autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>confirmation password</label>
                            <input class="form-control confirm_password" type="password" required="" placeholder="Password Confirmation"  autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control mb-2" type="" required="" name="tempat_lahir" placeholder="tempat lahir"  autocomplete="off" style="text-transform: capitalize;">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" required="" name="tanggal_lahir" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6 required">
                        <label>Jalur Pendaftaran</label>
                        <select class="form-control" name="jalur_id">
                            <option selected disabled class="hosted">...</option>
                            <?php foreach($listOfJalur as $val): ?>
                                <option value="<?= $val->jalur_id ?>"><?= $val->jalur_name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input chk_confirm" id="customCheck1">
                            <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-20 row">
                    <div class="col-3">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light btn-register" type="button">Register</button>
                    </div>
                    <div class="col-3 text-center">
                        <a href="<?= base_url() ?>" class="btn btn-warning btn-block btn-lg waves-effect waves-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/metismenu.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>assets/js/waves.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>



<!-- App js -->
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script>
    $(document).on("click", ".btn-register", function() {
        validate()
        $.ajax({
            url: "<?= base_url('C_Auth/saveRegister') ?>",
            method: "POST",
            dataType: "JSON",
            data: $(".form-register").serialize(),
            beforeSend: function() {
                $('.btn-register').html("<span>Loading...</span>")
            },
            success: function(response) {
                // console.log(response)
                setTimeout(function() {
                    if (response.code == 200) {
                        sw_alert("Success", "Register Success Please Login", "success");
                        // location.reload()
                        setTimeout(function(){
                            window.location.href="<?= base_url("C_Auth") ?>";
                        }, 3000)
                    } else {
                        sw_alert("Failed", String(response.message), "error");
                        $('.btn-register').html("<span>Register</span>")
                    }
                }, 3000);

            }
        })

    });

    function validate()
    {
        var pass = $(".password").val();
        var confirm_password = $(".confirm_password").val();
        if($('.chk_confirm').is(':checked'))
        {
            return true;
        }else{
            return sw_alert("Failed", "please check the consent form", "error");
        }
        if(pass != confirm_password){
            return sw_alert("Failed", "passwords are not the same", "error");
        }

        return true;
    }
</script>

</body>

</html>