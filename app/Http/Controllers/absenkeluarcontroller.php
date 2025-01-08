<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absen;
use Carbon\Carbon;

class absenkeluarcontroller extends Controller
{

    public function update(Request $request, $id){
        $this->validate($request,[
            'presensi_keluar'=> 'nullable',
            'status_keluar'=> 'nullable',

        ]);

        $entryTime = $request->input('presensi_keluar');

        $deadline = Carbon::createFromTime(16, 30, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status_pulang = 'Tepat Waktu';

        } else {

            $status_pulang = 'Pulang Cepat';
        }

        $absenpulang = absen::find($id);
        $absenpulang->update([
            'presensi_keluar'=> $entryTime,
            'status_keluar'=> $status_pulang,
        ]);

        return redirect()->route('absen.index');
    }
}
