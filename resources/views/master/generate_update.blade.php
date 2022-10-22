@extends('master.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card my-3">
            <div class="card-header">
                Update Token User
            </div>
            <div class="card-body">

                <form action="{{ route('generate_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="control-label">Email</label>
                            <select class="form-control" name="email">
                                <option value="" holder>Pilih Email</option>
                                @foreach ($user as $result)
                                <option value="{{ $result->email }}">{{ $result->email }}</option>
                                select
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
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
