@extends('template')
@section('isi')
    <body style="background: lightgray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('status.update', $status->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">User ID</label>
                                <input type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{old('user_id', $status->user_id)}}" name="user_id">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $status->name)}}" name="name">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $status->email)}}" name="email">
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
