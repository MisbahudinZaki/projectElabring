@extends('template')

@section('isi')

    <body style="background: lightgray">
        <div class=" alert alert-primary">
            <b>Selamat Datang</b> | {{session('error')}}
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                           <!--  <a href="" class="btn btn-primary"><i -->

                            <!-- <a href="" class="btn btn-success"><i class="fas fa-solid fa-plus-square"></i> Datang</a><br>-->

                            <td>
                                <!-- <a href="" class="btn btn-success">Absen Pulang</a>-->

                                <a href="{{ route('cetak-pegawai-form') }}" class="btn btn-primary"><i class="fas fa-regular fa-print"></i> Cetak</a>

                                <button type="button" class="btn btn-success    " data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="far fa-dot-circle"></i> Presensi Masuk
                                </button>
                                <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal fade" id="myModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title fs-5" id="exampleModalLabel">ABSENSI DATANG</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">id</label>
                                                        <input type="number"
                                                            class="form-control @error('user_id') is-invalid  @enderror"
                                                            value="{{ Auth::user()->id }}" name="user_id" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">nama</label>
                                                        <input type="text"
                                                            class="form-control @error('nama') is-invalid  @enderror"
                                                            value="{{ Auth::user()->name }}" name="nama"
                                                            placeholder="masukkan nama">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">tanggal</label>
                                                        <input type="date" name="tanggal"
                                                            class="form-control @error('tanggal') is-invalid @enderror"
                                                            value="{{ old('tanggal') }}" id="tanggal"
                                                            placeholder="masukan tanggal" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">keterangan</label>
                                                        <select class="form-control select2" style="width: 100%" name="keterangan" id="keterangan">
                                                                <option disabled value="Pilih">Pilih</option>
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Sakit">Sakit</option>
                                                                <option value="Izin">Izin</option>
                                                                <option value="Cuti">Cuti</option>
                                                                <option value="dinas_luar">Dinas Luar</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Lokasi</label>
                                                            <input type="text" class="form-control" id="address" name="lokasi" readonly required>
                                                            <button type="button" class="btn btn-secondary" onclick="getAddress()">Gunakan Lokasi Saya</button>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="font-weight-bold">waktu kehadiran</label>
                                                        <input type="time"
                                                            class="form-control @error('presensi_masuk') is-invalid  @enderror"
                                                            value="{{ old('presensi_masuk') }}" id="presensi_masuk"
                                                            name="presensi_masuk" required readonly>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary col-md-12">KLIK UNTUK
                                                            PRESENSI MASUK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>



                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <h3>DAFTAR ABSENSI</h3>
                            <table class="table table-striped text-center">

                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">NAMA</th>

                                        <th scope="col">TANGGAL</th>
                                        <th scope="col">KETERANGAN</th>
                                        <th scope="col">WAKTU KEHADIRAN</th>

                                        <th scope="col">WAKTU PULANG</th>

                                        <th scope="col">AKSI</th>
                                        <th scope="col">ABSEN PULANG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensi as $absen)
                                        <tr>
                                            <td>{{ $absen->user->id }}</td>
                                            <td>{{ $absen->nama }}</td>

                                            <td>{{ $absen->tanggal }}</td>
                                            <td>{{ $absen->keterangan }}</td>
                                            <td>{{ $absen->presensi_masuk }}</td>
                                            <td>{{ $absen->presensi_keluar }}</td>
                                            <td>
                                                <form action="{{ route('absen.destroy', $absen->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"> Delete</i></button>
                                                </form>
                                            </td>

                                            <td>
                                                <!-- <a href="" class="btn btn-success">Absen Pulang</a>-->

                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $absen->id }}">
                                                    <i class="far fa-dot-circle"></i> Presensi Keluar
                                                </button>
                                                <form action="{{ route('absenpulang.update', $absen->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    <div class="modal fade" id="editModal{{ $absen->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <p class="modal-title fs-5" id="exampleModalLabel">
                                                                        ABSENSI PULANG</p>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group">
                                                                        <label class="font-weight-bold">Waktu
                                                                            Pulang</label>

                                                                        <input type="time"
                                                                            class="form-control @error('presensi_keluar') is-invalid @enderror"
                                                                            name="presensi_keluar"
                                                                            value="{{ old('presensi_keluar', $absen->presensi_keluar) }}"
                                                                            id="presensi_keluar" readonly>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary" onclick="setExitTime()">Tambah Absensi</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </body>
@endsection
