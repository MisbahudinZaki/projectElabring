@extends('cetak')
@section('isi')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <h5 class="text-center">Total Hari : {{$hari}}</h5>
                    <div style="float: left; width: 100%;">

                        <h4>User List</h4>
                        @foreach($users->chunk(ceil($users->count() / 1))[0] as $user)
                            <p>ID: {{ $user->id }}</p>
                            <p>Name: {{ $user->name }}</p>

                            <table class="table table-bordered" align="center">
                                <tbody class="text-center">
                                    <tr>
                                        @foreach ($hadir as $item)
                                            @if ($item->user_id == $user->user_id)
                                                <td>Kehadiran : {{ $item->hadir_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($pulangcepat as $pc)
                                            @if ($pc->user_id == $user->user_id)
                                            <td>Pulang Cepat : {{$pc->pc_count}}</td>
                                            @endif
                                        @endforeach

                                        @foreach($telat as $lambat)
                                        @if ($lambat->user_id == $user->user_id)

                                        <td>Terlambat :  {{$lambat->late_count}}</td>
                                        @endif
                                        @endforeach

                                        @foreach ($sakit as $sak)
                                        @if ($sak->user_id == $user->user_id)
                                        <td>Sakit : {{ $sak->sick_count }}</td>
                                        @endif
                                        @endforeach

                                        @foreach ($cuti as $cut)
                                            @if ($cut->user_id == $user->user_id)
                                            <td>Cuti : {{ $cut->cuti_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($izin as $is)
                                            @if ($is->user_id == $user->user_id)
                                            <td>Izin : {{ $is->izin_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($dinas as $din)
                                            @if ($din->user_id == $user->user_id)
                                            <td>Dinas Luar : {{ $din->dinas_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($tdkabspulang as $item)
                                            @if ($item->user_id == $user->user_id)
                                                <td>Tidak Presensi Keluar : {{$item->tdkabsplng_count}}</td>
                                            @endif
                                        @endforeach


                                    </tr>
                                </tbody>
                            </table>

                        @endforeach
                        <hr>
                    </div>


                    <script type="text/javascript">
                        window.print();
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
