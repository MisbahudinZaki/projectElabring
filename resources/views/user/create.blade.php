@extends('template')

@section('isi')
<div class="container">
    <h1>Tambah User Baru</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" value="12345678" name="password" required readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
           <!--  <input type="text" class="form-control" id="status" name="status" required> -->
           <select name="status" class="form-control"  id="status" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
           </select>
        </div>
        <div class="mb-3">
            <label for="user_status" class="form-label">User Status</label>
            <!--<input type="text" class="form-control" id="user_status" name="user_status" required>-->
            <select name="user_status" id="user_status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah User</button>
    </form>
</div>
@endsection
