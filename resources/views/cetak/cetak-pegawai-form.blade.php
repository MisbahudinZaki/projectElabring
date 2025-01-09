@extends('cetak')
@section('isi')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-header">Print Data Pegawai</div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                    </div>

                    <div class="form-group mb-3">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                    </div>

                    <a href="#" onclick="this.href='/cetakdatapertanggal/'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglakhir').value "
                    target="_blank" class="btn btn-primary"><i class="fas fa-print"></i>cetak</a>

                    <a href="{{ route('absen.index') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"> Cancel</i></a>
                </div>



            </div>
            <br>
            <div class="card">
                <div class="card-header">rekap</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">WAKTU KEHADIRAN</th>
                                <th scope="col">Status</th>
                                <th scope="col">Presensi Keluar</th>
                                <th scope="col">status pulang</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($absensi as $abs)
                                <tr>
                                <td>{{$abs->nama}}</td>

                                <td>{{$abs->tanggal}}</td>
                                <td>{{$abs->keterangan}}</td>
                                <td>{{$abs->presensi_masuk}}</td>
                                <td>{{$abs->status_masuk}}</td>
                                <td>{{$abs->presensi_keluar}}</td>
                                <td>{{$abs->status_keluar}}</td>
                                <td>
                                    <!-- <a href="" class="btn btn-success">Absen Pulang</a>-->

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{$abs->id}}">
                                     VIEW
                                   </button>
                                   <form action="{{ route('absen.show' , $abs->id) }}" method="POST" enctype="multipart/form-data">
                                   <div class="modal fade" id="editModal{{$abs->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                       <div class="modal-content">
                                         <div class="modal-header">
                                           <p class="modal-title fs-5" id="exampleModalLabel">ABSENSI</p>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">

                                         @csrf
                                   @method('PUT')

                                   <div class="form-group">
                                    <label class="font-weight-bold">id</label>
                                    <input type="number" class="form-control @error('user_id') is-invalid  @enderror" value="{{Auth::user()->id}}" name="user_id" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid  @enderror" value="{{Auth::user()->name}}" name="nama" placeholder="masukkan nama" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">tanggal</label>
                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal', $abs->tanggal)}}" placeholder="masukan tanggal" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">keterangan</label>
                                    <input type="date" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{old('keterangan', $abs->keterangan)}}" placeholder="masukan keterangan" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Keterangan Tambahan</label>
                                    <textarea class="form-control @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan" id="keterangan_tambahan" rows="5" placeholder="diisi ketika berhalangan hadir atau sakit">{{old('keterangan_tambahan', $abs->keterangan_tambahan)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">waktu kehadiran</label>
                                    <input type="time" class="form-control @error('presensi_masuk') is-invalid  @enderror" value="{{old('presensi_masuk', $abs->presensi_masuk)}}" name="presensi_masuk"  required readonly>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Waktu Pulang</label>

                                    <input type="time" class="form-control @error('presensi_keluar') is-invalid @enderror" name="presensi_keluar" value="{{old('presensi_keluar', $abs->presensi_keluar)}}" readonly>
                                </div>

                                         <div class="modal-footer">

                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                   </div>
                                   </form>

                                  </td>

                                  <td>
                                    <form onsubmit="return confirm('apakah anda yakin?')" action="{{route('cetak.destroy', $abs->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Hapus</button>

                                    </form>
                                  </td>
                            </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
