@extends('template')
@section('isi')
    <body style="background: lightgray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">User ID</label>
                                <input type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{old('user_id', $user->user_id)}}" name="user_id">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" value="{{old('status', $user->status)}}" name="status">
                                <option value="user">User</option>
                                <option value="admin">Administrator</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status User</label>
                                <select class="form-control @error('user_status') is-invalid @enderror" value="{{old('user_status', $user->user_status)}}" name="user_status">
                                <option value="aktif">aktif</option>
                                <option value="tidak aktif">tidak aktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i> SAVE</button>
                            <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> RESET</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
