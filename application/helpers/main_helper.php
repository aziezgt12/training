<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function checkNotActive($status = null)
{
    if ($status == 0) {
        return '<span class="badge badge-primary">Active</span>';
    } else {
        return '<span class="badge badge-danger">Not Active</span>';
    }
}

function getAlertBs($alertType, $message)
{
    $html = "<div class='alert alert-$alertType mb-2' role='alert'>
                <h4 class='alert-heading mt-0 font-18'>$alertType!</h4><hr>
                <p>$message</p>
            </div>";
    return $html;
}

function setDateFormat($date, $format)
{
    $dateFormat =  date($format, strtotime($date));


    return $dateFormat;
}

function badgeStatus($status, $text=null)
{
    if($status == 1)
    {
        $tex = $text == null ? 'Open Register' : $text;
        $badge = "<div class='badge badge-primary badge-pill' style='padding: 8px'>". $tex."</div>";
    }elseif ($status == 0) {
        $tex = $text == null ? 'Close Register' : $text;
        $badge = "<div class='badge badge-danger badge-pill' style='padding: 8px'>". $tex."</div>";
    }

    return $badge;
}

function getStatusPembayaran($status)
{
    if($status == 1)
    {
        $stat = "<span class='badge badge-danger'>Menunggu Pembayaran</span>";
    }else if($status == 2){
        $stat = "<span class='badge badge-warning'>Menunggu Verifikasi Admin</span>";
    }else if($status == 3){
        $stat = "<span class='badge badge-success'>Lunas</span>";
    }else if($status == 4){
        $stat = "<span class='badge badge-danger'>Pembayaran Ditolak</span>";
    }else{
        echo$stat = "<span class='badge badge-info'>Not Found</span>";
    }

    return $stat;
}

function getDocumentUploadStatus($status)
{
    if($status == 1)
    {
        $stat = "<span class='badge badge-danger'>Document Belum Upload</span>";
    }else if($status == 2){
        $stat = "<span class='badge badge-warning'>Menunggu Verifikasi Admin</span>";
    }else if($status == 3){
        $stat = "<span class='badge badge-success'>Document Diterima</span>";
    }else if($status == 4){
        $stat = "<span class='badge badge-danger'>Document Ditolak</span>";
    }else{
        echo$stat = "<span class='badge badge-info'>Not Found</span>";
    }

    return $stat;

}
function getHasilSeleksi($status)
{
    if($status == 1)
    {
        $stat = "<span class='badge badge-danger'>Belum Ujian</span>";
    }else if($status == 2){
        $stat = "<span class='badge badge-success'>Lulus</span>";
    }else if($status == 3){
        $stat = "<span class='badge badge-warning'>Tidak Lulus</span>";
    }else{
        echo$stat = "<span class='badge badge-info'>Not Found</span>";
    }

    return $stat;

}

function getStatusUjian($status)
{
    if($status == 1)
    {
        $stat = "<span class='badge badge-success'>Ujian</span>";
    }else if($status == 0){
        $stat = "<span class='badge badge-danger'>Tidak Ujian</span>";
    }else{
        echo$stat = "<span class='badge badge-info'>Not Found</span>";
    }

    return $stat;

}

