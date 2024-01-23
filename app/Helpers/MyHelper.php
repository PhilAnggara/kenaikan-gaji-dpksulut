<?php

use Carbon\Carbon;

if (!function_exists('testHelper')) {
    function testHelper()
    {
        return 'Berhasil';
    }
}

function tgl($date)
{
    return Carbon::parse($date)->isoFormat('D MMMM YYYY');
}

function completeUserInformation()
{
    $user = auth()->user();
    $status = true;

    if ($user->nip === null || $user->telp === null || $user->tgl_lahir === null || $user->jenis_kelamin === null) {
        $status = false;
    }

    return $status;
}

function progresKeterangan($item)
{
    if ($item->status == 0) {
        switch ($item->tahap) {
            case 1:
                return 'Permohonan sedang diperiksa oleh Dinas Daerah.';
                break;
            
            case 2:
                return 'Permohonan telah disetujui oleh Dinas Daerah. Menunggu persetujuan Sub Bagian Kepegawaian.';
                break;
            
            case 3:
                return 'Permohonan telah disetujui oleh Sub Bagian Kepegawaian. Menunggu persetujuan Kepala Dinas.';
                break;
            
            case 4:
                return 'Permohonan telah disetujui oleh Kepala Dinas. Menunggu penerbitan SK.';
                break;
            
            case 5:
                return 'Proses kenaikan gaji selesai. SK telah diterbitkan.';
                break;
            
            default:
                return 'Status permohonan tidak valid.';
                break;
        }
    } elseif ($item->status == 1) {
        return 'Permohonan telah disetujui dan SK telah diterbitkan.';
    } else {
        switch ($item->tahap) {
            case 1:
                return 'Permohonan ditolak oleh Dinas Daerah.';
                break;
            
            case 2:
                return 'Permohonan ditolak oleh Sub Bagian Kepegawaian.';
                break;
            
            case 3:
                return 'Permohonan ditolak oleh Kepala Dinas.';
                break;
            
            default:
                return 'Status permohonan tidak valid.';
                break;
        }
    }
}

function progresPersen($tahap)
{
    switch ($tahap) {
        case 1:
            return 20;
            break;
        
        case 2:
            return 40;
            break;
        
        case 3:
            return 60;
            break;
        
        case 4:
            return 80;
            break;
        
        case 5:
            return 100;
            break;
        
        default:
            return 'Status permohonan tidak valid.';
            break;
    }
}

function progresStyle($item)
{
    if ($item->tahap == 5) {
        return 'success';
    } else {
        if ($item->status == 0) {
            return 'primary';
        } else {
            return 'danger';
        }
        
    }
    
}