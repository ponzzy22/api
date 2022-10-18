@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3></h3>
                    @include('template.utils.btn.back', ['url' => url('content')])
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="control-label">Tentang</label>
                        <p class="form-control-static">{{ $content->tentang }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="" class="control-label">Visi</label>
                        <p class="form-control-static">{{ $content->visi }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="" class="control-label">Misi</label>
                        <p class="form-control-static">{{ $content->misi }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="" class="control-label">Maklumat Layanan</label>
                        <p class="form-control-static">{{ $content->maklumat }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="" class="control-label">Layanan</label>
                        <p class="form-control-static">{{ $content->layanan }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="" class="control-label">Selayang Pandang</label>
                        <img src="{{ url( $content->selayang) }}" alt="" class="img-fluid">
                        <hr>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
