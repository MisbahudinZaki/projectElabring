<?php

namespace App\Observers;
use App\Models\absen;

class KeteranganObserver
{
    public function saving(absen $absence)
    {
        $statuses = ['sakit', 'cuti', 'izin', 'Dinas Luar'];

        if (in_array(strtolower($absence->keterangan), $statuses)) {
            $absence->presensi_masuk = null;
            $absence->status_masuk = null;
        }
    }
}
