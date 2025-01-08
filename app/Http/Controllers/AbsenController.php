<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user =Auth::user();
        $absensi = absen::with('user')->where("user_id", $user->id,)->latest()->get();
        //$absensi=absen::with('absen_pulangs','users')->paginate(10);
        return view("absen.index", compact("absensi"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Absen::where('user_id', $request->user_id)
        ->where('tanggal', $request->tanggal)
        ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Absensi untuk user ini pada tanggal yang sama sudah ada.');
        }

        $entryTime = $request->input('presensi_masuk');

        $deadline = Carbon::createFromTime(8, 0, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status = 'Terlambat';

        } else {

            $status = 'Tepat Waktu';
        }

        absen::create([
            'nama'=>$request->nama,
            'tanggal'=>$request->tanggal,
            'presensi_masuk' => $entryTime,
            'status_masuk' => $status,
            'user_id'=> $request->user_id,
            'lokasi'=>$request->lokasi,
            'keterangan'=>$request->keterangan
        ]);

        Alert :: success('success','data berhasil disimpan');
        return redirect()->route('absen.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absensi = absen::find($id);
        $absensi->destroy($id);
        Alert :: success('success','Data berhasil dihapus');
        return redirect()->route('absen.index');
    }
}
