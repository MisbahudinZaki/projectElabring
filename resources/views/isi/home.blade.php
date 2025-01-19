@extends('template')

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-primary">
                <b>Selamat Datang | </b> {{session('error')}}
            </div>
            <div class="card">
                <div class="card-header">Selamat datang <b>{{Auth::user()->name}}</b>, Anda login sebagai: <b>{{Auth::user()->status}}</b></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                           <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row" width="200">Nama</td>
                                <td width="20">:</td>
                                <td>{{$user->name}}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>

                            <tr>
                                <td>User Status</td>
                                <td>:</td>
                                <td>{{$user->user_status}}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>:</td>
                                <td><a href="{{route('status.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> EDIT</a> |
                                <a href="{{ route('changepassword') }}" class="btn btn-primary"><i class="fas fa-edit">Ganti Password</i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


@endsection
