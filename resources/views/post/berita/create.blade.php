@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Post Berita
                    @include('template.utils.btn.back', ['url' => url('berita')])
                </div>
                <div class="card-body">
                    <form action="{{ url('berita') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label">Judul</label>
                            <input type="text"
                                class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                name="judul">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Poto</label>
                            <input type="file"
                                class="form-control @error('poto')
                                is-invalid
                            @enderror"
                                name="poto" accept=".png,.jpg,.jpge">
                            @error('poto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="control-label ">Isi</label>
                            <textarea
                                class="form-control summernote @error('isi')
                                is-invalid
                            @enderror"
                                name="isi" id="" cols="30" rows="10"></textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@include('template.utils.sumernote')
