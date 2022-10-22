@extends('master.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card my-3">
            <div class="card-header">
                Generate Token & Register User
            </div>
            <div class="card-body">

                <form action="{{ route('generate_new') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Username</label>
                            <input type="text"
                            class="form-control @error('username')
                            is-invalid
                            @enderror"
                            name="username">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Email</label>
                            <input type="email"
                            class="form-control @error('email')
                            is-invalid
                            @enderror"
                            name="email">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="" class="control-label">NIP</label>
                            <input type="text"
                            class="form-control @error('nip')
                            is-invalid
                            @enderror"
                            name="nip">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Password</label>
                            <input type="password"
                            class="form-control @error('password')
                            is-invalid
                            @enderror"
                            name="password">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-dark float-right"><i class="fa fa-save"></i> Generate</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
