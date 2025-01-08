<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\Absen_Pulang;
use App\Models\absenpulang;
use App\Models\Keterangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Queue\WorkerOptions;
use Illuminate\Validation\Rules\Unique;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class cetakcontroller extends Controller
{
    public function cetak()
    {
        $absensi=absen::get();
        return view("cetak.cetak",compact("absensi"));
    }

    public function cetakform(){
        $absensi=absen::latest()->get();
        return view('cetak.cetak-pegawai-form', compact('absensi'));
    }

    public function show($id)
    {
        $user = user::find($id);
        return view('cetak.cetak-pegawai-form', compact('user'));
    }

    public function destroy($id)
    {
        $absen = absen::find($id);
        $absen->delete($id);
        Alert :: success('success','data berhasil dihapus');
        return redirect()->route('cetak-pegawai-form');
    }

    public function cetakpegawaipertanggal($tglawal, $tglakhir ){
       // dd(["Tanggal Awal".$tglawal, "Tanggal Akhir :".$tglakhir])

       $users = User::all();

       $hari = absen::whereBetween('tanggal',[$tglawal, $tglakhir])->get()

       ->filter(function ($item){
        return Carbon::parse($item->tanggal)->dayOfWeek < 6;
       })

       ->Unique()->count();

       $hadir = absen::where('keterangan','hadir')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan), 0) as hadir_count'))->get();
       $telat = absen::where('status_masuk','terlambat')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(status_masuk), 0) as late_count'))->get();
       $cuti = absen::where('keterangan','cuti')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan), 0) as cuti_count'))->get();
       $sakit = absen::where('keterangan','sakit')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan), 0) as sick_count'))->get();
       $izin = absen::where('keterangan','izin')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan), 0) as izin_count'))->get();
       $dinas = absen::where('keterangan','dinas_luar')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan), 0) as dinas_count'))->get();
       $pulangcepat = absen::where('status_keluar','pulang_cepat')->whereBetween('tanggal',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(status_keluar), 0) as pc_count'))->get();
       $tdkabspulang = Absen::whereNull('presensi_keluar')
    ->whereBetween('tanggal', [$tglawal, $tglakhir])
    ->whereNotIn('keterangan', ['sakit', 'izin', 'cuti', 'dinas_luar'])
    ->groupBy('user_id')
    ->select('user_id', \DB::raw('COUNT(*) as tdkabsplng_count'))
    ->get();



       $absensi=absen::whereBetween('tanggal',[$tglawal, $tglakhir])->latest()->get();
       return view('cetak.cetakpegawaipertanggal', compact('absensi','hari','telat','users','sakit','cuti','hadir','izin','dinas','pulangcepat','tdkabspulang'));
    }

    public function showCountAbsenPulangKosong()
    {
        $countAPK = absen::countAbsenPulangKosong();

        return view('cetak.cetakpegawaipertanggal', compact('countAPK'));
    }
}
