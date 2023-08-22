<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family : arial;
        }
        .certificate {
            position: relative;
            text-align: center;
        }
        .background-image {
            width: 500px; /* Atur lebar gambar */
            height: auto;
        }
        .certificate-name {
            position: absolute;
            left: 50%; /* Posisikan teks di tengah horizontal */
            top: 40%; /* Posisikan teks di tengah vertikal */
            transform: translate(-50%, -50%); /* Geser teks ke tengah secara vertikal dan horizontal */
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }

        .certificate-desc {
            position: absolute;
            left: 50%; /* Posisikan teks di tengah horizontal */
            top: 50%; /* Posisikan teks di tengah vertikal */
            transform: translate(-50%, -50%); /* Geser teks ke tengah secara vertikal dan horizontal */
            text-align: center;
            font-size: 12px;
        }
        .certificate-qrcode {
            position: absolute;
            left: 8.5%; /* Posisikan teks di tengah horizontal */
            top: 72%; /* Posisikan teks di tengah vertikal */
            transform: translate(-50%, -50%); /* Geser teks ke tengah secara vertikal dan horizontal */
            text-align: center;
            font-size: 16px;
        }
        .certificate-nosertifikat {
            position: absolute;
            left: 9%; /* Posisikan teks di tengah horizontal */
            top: 2.5%; /* Posisikan teks di tengah vertikal */
            transform: translate(-50%, -50%); /* Geser teks ke tengah secara vertikal dan horizontal */
            text-align: center;
            font-size: 16px;
        }
        
    </style>
    <!-- Kemungkinan ada beberapa elemen head lainnya yang diperlukan -->
</head>
<body>
    <div class="certificate">
        <img src="<?= base_url() ?>assets/images/blanko-sertifikat.png" class="background-image" style="">
        <p class="certificate-name"><?php echo $peserta->nama_peserta; ?></p>
        <p class="certificate-desc">telah mengikuti pelatihan</p>
        <?php 
        $pad_top = '9';
        foreach($listTraing as $val):
            echo "<p class='certificate-desc' style='padding-top: $pad_top%; font-weight: bold; font-size: 12px;'>$val->nama</p>";
            $pad_top = $pad_top + 7;
        endforeach;
        ?>
        <p class="certificate-desc" style="padding-top: 25%; font-weight: bold; font-size: 14px;"><?= $listTraing[0]->durasi ?></p>
        <p class="certificate-desc" style="padding-top: 95%; font-weight: bold; font-size: 14px;">SERTIFIKAT DENGAN ATAS NAMA TERSEBUT DIATAS SAH DIKELUARKAN OLEH</p>
        <p class="certificate-desc" style="padding-top: 108%; font-weight: bold; font-size: 14px;">PT. SMART SERTIFIKASI INDONESIA</p> 
        
        <p class="certificate-nosertifikat" style="padding-top: 110%; font-weight: bold; font-size: 14px;"><?= $peserta->no_sertifikat ?></p> 
        
        <img src="<?= base_url("assets/qrcode/$peserta->no_sertifikat.png") ?>" style="width: 60px;" class="certificate-qrcode">
         
    </div>
</body>
</html>
