@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    key Generate
                </div>
                <div class="card-body">
                    <form action="{{ url('generate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label ">intansi</label>
                            <input type="text"
                                class="form-control @error('intansi')
                            is-invalid
                        @enderror"
                                name="intansi">
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
